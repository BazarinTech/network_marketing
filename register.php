<?php 
     include 'includes/database.php';

     $error = isset($error) ? $error : '';

     if (isset($_GET['mentor'])) {
        $upline = $_GET['mentor'];
     }else {
        $upline = 1;
     }

     if (isset($_POST['register'])) {
        $uname = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $country = $_POST['country'];
        $upline = $_POST['upline'];
        
        //check if there is existence of same username in the database
        $num = count($query->select('users', '*', ['username' => $uname]));
        if ($num == 0) {

            //check if password matches with confirmation
            if ($password === $confirm_password) {

                //check if password length is greater than or equal to 8
                if (strlen($password) >= 8) {

                    //insert into database
                    $query->insert('users', ['name' => $name, 'username' => $uname, 'email' => $email, 'phone' => $phone, 'country' => $country, 'passwrd' => $password, 'uplineID' => $upline]);
                    $query->insert('wallets', ['username' => $uname]);

                    //after succesfull insertion redirect to login
                    header('Location: login');
                }else{
                    $error = "Password must be at least 8 characters long";
                }
            }else{
                $error = "Password does not match with confirmation";
            }
        }else {
            $error = "Username already exists. Kindly try another one!";
        }
        
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>QashQue - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color: purple;">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 style="font-weight: bold; color: purple;" class="h4 mb-4">Welcome To QashCheque</h1>
                            </div>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action='register'>
                                <div class="form-group">
                                    <input type="text" name='name' class="form-control form-control-user" id="exampleInputName"
                                        placeholder="Full Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name='email' class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name='username' class="form-control form-control-user" id="exampleInputUsername"
                                        placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                        <select name="country" class="form-control form-control-user text-dark" id="" required>
                                            <option selected disabled>Select Country</option>
                                            <option value="254">Kenya</option>
                                            <option value="255">Tanzania</option>
                                            <option value="256">Uganda</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <input type="tel" name='phone' class="form-control form-control-user" id="exampleInputTel"
                                        placeholder="Phone Number eg 07..." required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name='password' class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                            <input type="hidden" id="errorMessage" value="<?= $error ?>">

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name='confirm_password' class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" required>
                                        <input type="text" name='upline' value="<?=$upline?>" style='display: none' required>
                                    </div>
                                </div>
                                <button style="background-color: purple;" type='submit' name='register' class="btn btn-user text-light btn-block">
                                    Register Account
                                </button>
                                <hr>
                                <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Error Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration Failed!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body"><?=$error?></div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Registration Page script-->
    <script>
    $(document).ready(function() {
        let errorMessage = $("#errorMessage").val();
        if (errorMessage.trim() !== "") {
            $("#errorModal").modal('show'); // Show the error modal if there's an error
            }
        });
    </script>

</body>

</html>