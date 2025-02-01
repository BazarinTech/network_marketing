<?php
include 'includes/details.php';

if (isset($_POST['add'])) {
    $code = $_POST['code'];
    $currency = $_POST['currency'];
    $name = $_POST['name'];
    $rate = $_POST['rate'];
    
        //insert into database
        $query->insert('country', ['name' => $name, 'code' => $code,  'rate' => $rate, 'currency' => $currency]);

        $msg = 'Country added succesfully!';
    
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php include 'includes/sidebar.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Country</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <form class="card-body" action='country' method="post">
                                <p>Add Country</p>
                                <div class="card mb-4 bg-danger text-white <?= $error ? '' : 'd-none'?>">
                                    <div class="card-body">
                                        <?=$error?>
                                    </div>
                                </div>
                                <div class="card mb-4 bg-success text-white <?= $msg ? '' : 'd-none'?>">
                                    <div class="card-body">
                                        <?=$msg?>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputName" type="text" name='name' placeholder="Country Name" required/>
                                    <label for="inputName">Country Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputUname" type="number" name='code' placeholder="Country Code" required/>
                                    <label for="inputUname">Country Code</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputName" type="text" name='currency' placeholder="Enter Currency Symbol" required/>
                                    <label for="inputName">Currency</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputName" type="text" name='rate' placeholder="Enter Rate against usd" required/>
                                    <label for="inputName">Rate</label>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary" type="submit" name="add">Add Method</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
