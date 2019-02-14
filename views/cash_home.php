<?php session_start();  
    include "../controllers/transactionFucntions.php"; 

$_SESSION['page'] =  basename($_SERVER['PHP_SELF']);
print_r($_SESSION['page']);
?>
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
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar-cashier">
            <!-- Compute -->
            <div class="body table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Product Name: </th>
                                        <th>Quantity: </th>
                                        <th>Price: </th>
                                        <th>Action: </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($getorder as $index => $order): ?>
                                    <tr>
                                        <td> <?php echo $order['pname'] ?> </td>
                                        <td> <?php echo $order['orderqty'] ?>  </td>
                                        <td> <?php echo $order['subtotal'] ?>  </td>
                                        <td> DELETE </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <table class="table table-responsive">
                                <thead>
                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($gettotal as $index => $total): ?>
                                    <tr>
                                        <td>Total: </td>
                                        <th> <?php echo "₱".$total['grandtotal']; ?> </th>
                                    </tr>
                                     <?php endforeach; ?>
                                </thead>
                            </table>
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th> 
                                            <button type="submit" name="submit" value="pay" class="btn bg-green btn-block btn-lg waves-effect">PAY</button>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                </div>
            <!-- #END Compute -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">Bakery</a>.
                </div>
                <div class="version">
                    <b>Lemon Company </b>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content-cashier">
                <!-- Badges -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                <li role="presentation"><a href="#drinks" data-toggle="tab">DRINKS</a></li>
                                <li role="presentation"><a href="#others" data-toggle="tab">OTHERS</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="bread">
                                <!-- BREAD -->
                                <div class="body">
                                    <div class="row clearfix">
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($getbread as $index => $bread): ?>
                                        <form action="<?php $_PHP_SELF ?>" method="POST">
                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                             <p id=""><?php echo $bread['pname']; ?></p>
                                            <input type="hidden" name="pid" value="<?php echo $bread['pid']; ?>">
                                            <input min="0" required type="number" name="qty" style="width: 50px">
                                            <button type="submit" name="submit" value="addorder" class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                        </div>
                                        </form>
                                         <?php endforeach; ?>

                                    </div>
                                </div>
                                <!-- #END BREAD -->
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="drinks">
                                <!-- DRINKS -->
                                <div class="body">
                                    <div class="row clearfix">
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($getdrinks as $index => $drinks): ?>
                                        <form action="<?php $_PHP_SELF ?>" method="POST">
                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                             <p id=""><?php echo $drinks['pname']; ?></p>
                                            <input type="hidden" name="pid" value="<?php echo $bread['pid']; ?>">
                                            <input min="0" required type="number" name="qty" style="width: 50px">
                                            <button type="submit" name="submit" value="addorder" class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                        </div>
                                        </form>
                                         <?php endforeach; ?>

                                    </div>
                                </div>
                                <!-- #END DRINK -->
                                <!-- OTHERS -->
                                <div class="body">
                                    <div class="row clearfix">
                                        <?php error_reporting(E_ERROR | E_PARSE); foreach ($getothers as $index => $others): ?>
                                        <form action="<?php $_PHP_SELF ?>" method="POST">
                                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                             <p id=""><?php echo $others['pname']; ?></p>
                                            <input type="hidden" name="pid" value="<?php echo $others['pid']; ?>">
                                            <input min="0" required type="number" name="qty" style="width: 50px">
                                            <button type="submit" name="submit" value="addorder" class="btn btn-primary waves-effect" data-type="autoclose-timer">ADD</button>
                                        </div>
                                        </form>
                                         <?php endforeach; ?>

                                    </div>
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

    <!-- Jquery Validation Plugin Css -->
    <script src="../../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../../plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="../../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../../js/pages/forms/form-validation.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
