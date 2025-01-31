<?php
session_start();

if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
}else{
    header('Location: login');
}

include 'includes/database.php';

//get general user details
$users = $query->select('users', '*', ['username' => $uname]);
$user = $users[0];
$userID = $user['ID'];
$name = $user['name'];
$email = $user['email'];
$phone = $user['phone'];
$status = $user['status'];
$date_joined = $user['date_joined'];
$upline = $user['uplineID'];
$code = $user['country'];
$countries = $query->select('country', '*', ['code' => $code]);
$country = $countries[0];
$country_name = $country['name'];
$currency = $country['currency'];
$rate = $country['rate'];

//get user wallet
$wallets = $query->select('wallets', '*', ['username' => $uname]);
$wallet = $wallets[0];
$balance = $wallet['balance'] * $rate;
$total_income = $wallet['earnings'] * $rate;
$deposits = $wallet['deposits'] * $rate;
$withdrawals = $wallet['withdrawals'] * $rate;
$survey = $wallet['survey'] * $rate;
$blogging = $wallet['blogging'] * $rate;

//get total downlines
$downlines = $query->select('users', '*', ['uplineID' => $userID]);
$total_downlines = count($downlines);

//get only active downlines
$active = [];
foreach ($downlines as $downline) {
    if ($downline['status'] == 'Active') {
        $active[] = $downline;
    }
}
$total_active = count($active);

//get transaction records
$transactions = $query->select('transactions', '*', ['userID' => $userID], ['column' => 'ID', 'direction' => 'desc']);

// Function to get downlines with levels
function downline($query, $userID) {
    // Get first level downlines
    $first = $query->select('users', '*', ['uplineID' => $userID]);
    $first_level_count = count($first);

    // Initialize second and third-level arrays
    $second = [];
    $third = [];

    // Get second level downlines
    foreach ($first as $row) {
        $second[] = $query->select('users', '*', ['uplineID' => $row['ID']]);
    }
    $second_level_count = count($second);

    // Get third level downlines
    foreach ($second as $secondRow) {
        foreach ($secondRow as $row2) {
            $third[] = $query->select('users', '*', ['uplineID' => $row2['ID']]);
        }
    }
    $third_level_count = count($third);

    return [
        'firstLevel' => $first,
        'firstLevelCount' => $first_level_count,
        'secondLevel' => $second,
        'secondLevelCount' => $second_level_count,
        'thirdLevel' => $third,
        'thirdLevelCount' => $third_level_count
    ];
}

$all_downlines = downline($query, $userID);






