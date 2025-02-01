<?php
session_start();

if (isset($_SESSION['uname'])) {
    $uname = $_SESSION['uname'];
}else{
    header('Location: login');
}

include 'includes/database.php';

//get admin details
$users = $query->select('admins', '*', ['username' => $uname]);
$user = $users[0];
$userID = $user['ID'];
$name = $user['name'];
$status = $user['status'];
$code = $user['country'];
$countries = $query->select('country', '*', ['code' => $code]);
$country = $countries[0];
$country_name = $country['name'];
$currency = $country['currency'];
$rate = $country['rate'];

//get transactions
$transactions = $query->select('transactions', '*', ['status' => 'Success']);

//get general adashboard details
$revenue = 0;
$withdrawals = 0;

foreach ($transactions as $row) {
    if ($row['type'] == 'deposit') {
        $revenue += $row['amount'];
    }elseif ($row['type'] == 'withdrawal') {
        $withdrawals += $row['amount'];
    }
}

$revenue *= $rate;
$withdrawals *= $rate;

$profit = $revenue - $withdrawals;

$total_users = count($query->select('users'));

$active = count($query->select('users', '*', ['status' => 'Active']));

$timeNow = time();
$timeLimit = $timeNow - (24 * 60 * 60); // 24 hours in seconds
$users_today = count($query->select('users', '*', ['date_joined >' => $timeLimit]));

$recent = $query->select('users', '*', [], ['column' => 'ID', 'direction' => 'DESC'], ['value' => 10]);

//get admins
$admins = $query->select('admins');

//payments methods
$methods = $query->select('payments');

//countries
$countries = $query->select('country');

//users 
$users = $query->select('users');

//wallets 
$wallets = $query->select('wallets');

//networking
$networking = $query->select('networking');

//commission
$commission = $query->select('comission');
//get all transactions
$all_transactions = $query->select('transactions');
