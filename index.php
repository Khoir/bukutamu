<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Login | Sistem Infomari Buku Tamu Ngodingpintar</title>
        <link rel="icon" href="assets/img/lucu.jpg"/>
        <link href="assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6 d-lg-block bg-success shadow-lg my-5 text-center">
                                        <img src="assets/img/pok.png" alt="" width="200px">
                                        <h3 class="text-white mt-4">Sitem Informasi Buku Tamu
                                        <br> Channel Ngoding<u>Pintar</u><br>Surabaya <br> Jawa timur</h3>
                                    </div>
                                    <div class="col-lg-6  bg-light my-5">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-6">Welcome</h1>
                                            </div>
                                             
                                                <form class="user" action="cek_login.php" method="POST">
                                                    <div class="form-group mb-4"> 
                                                        <input class="form-control" id="exampleInputEmail" type="text" name="username" placeholder="Enter Address..." />
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password" />
                                                    </div>
                                                    <div>
                                                        <input type="checkbox" class="form-checkbox"> Show password</div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                        <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                                    </div>

                                                    <button class="btn btn-primary center-block justify-content-center">Login</button>
                                                    
                                                </form>
                                            
                                            
                                            <div class="card-footer text-center mt-5 mb-1">
                                                <div class="small">By Chanel Khoirudin | 2021- <?= date('Y')?></a></div>
                                            <!-- <div class="card-footer text-center py-3">
                                                <div class="small"><a href="register.html">Need an account? Sign up!</a></div> -->
                                            
                                        </div>
                                    </div>
                            </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>
