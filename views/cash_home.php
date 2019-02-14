<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>CASHIER</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>2
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">Franz Bakeshoppe & Refreshment</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
   <!--  <section> -->
        <!-- Left Sidebar -->
       <!--  <aside id="leftsidebar" class="sidebar"> -->
            <!-- Menu -->
           <!--  <div class="menu">
                <ul class="list">
                    <li class="header">MENU</li>
                    <li>
                        <a href="cash_home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../pages/typography.html">
                            <i class="material-icons">text_fields</i>
                            <span>Typography</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../pages/typography.html">
                            <i class="material-icons">text_fields</i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div> -->
            <!-- #Menu -->
            <!-- Footer -->
            <!-- <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">Bakery</a>.
                </div>
                <div class="version">
                    <b>Lemon Company </b>
                </div>
            </div> -->
            <!-- #Footer -->
        <!-- </aside> -->
        <!-- #END# Left Sidebar -->
<!--     </section> -->

    <section class="content">
<!-- Basic Examples -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COMPUTING TABLE
                            </h2>
                        </div>
                        <!-- Computation -->
                            <div class="body">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-2 form-control-label">
                                        <label for="prod_name"> Product Name: </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="prod_name" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="prod_qnty"> Quantity: </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="prod_qnty" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="total"> TOTAL: </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" id="total" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="checkbox" id="remember_me_3" class="filled-in">
                                        <label for="remember_me_3">Remember Me</label>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- #END Computation -->
                    </div>
                </div>
                <!-- #END# Basic Examples -->
                <!-- Badges -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PRODUCTS
                            </h2>
                        </div>
                             <div class="panel-group" id="accordion_4" role="tablist" aria-multiselectable="true">
                                <!-- Tab -->
                                <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#bread" data-toggle="tab">BREAD</a></li>
                                <li role="presentation"><a href="#others" data-toggle="tab">OTHERS</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="bread">
                                <!-- BREAD -->
                                                <div class="body table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                <p id="">BREAD # 1</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">BREAD # 2</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">BREAD # 3</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>   
                                                                <td>
                                                                <p id="">BREAD # 4</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <p id="">BREAD # 5</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">BREAD # 6</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">BREAD # 7</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>   
                                                                <td>
                                                                <p id="">BREAD # 8</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <p id="">BREAD # 9</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">BREAD # 10</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">BREAD # 11</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>   
                                                                <td>
                                                                <p id="">BREAD # 12</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        <!-- #END BREAD -->
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="others">
                                        <!-- OTHERS -->
                                                <div class="body table-responsive">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                <p id="">DRINK # 1</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">DRINK # 2</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">DRINK # 3</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>   
                                                                <td>
                                                                <p id="">DRINK # 4</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <p id="">SHAKE # 1</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">SHAKE # 2</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">SHAKE # 3</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>   
                                                                <td>
                                                                <p id="">SHAKE # 4</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                <p id="">FRAPPE # 1</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">FRAPPE # 2</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                                <td>
                                                                <p id="">TEA # 1</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>   
                                                                <td>
                                                                <p id="">TEA # 2</p>
                                                                <button class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        <!-- #END OTHERS -->
                                </div>
                            </div>
                                <!-- #END Tab -->
                                    </div>
                                </div>
                    </div>
                </div>
                <!-- #END# Badges -->
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
