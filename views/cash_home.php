<?php session_start(); 

if( !isset($_SESSION['username']) && !isset($_SESSION['password']) && $_SESSION['role'] != 'cashier'){
  header("location: index.php");
}if($_SESSION['role'] != 'cashier'){
  header("location: index.php");  
}
unset($_SESSION['page']);
$_SESSION['page'] =  basename($_SERVER['PHP_SELF']);
include "../controllers/transactionFucntions.php"; 
$db = new userModel();
$data =$db->getuser($_SESSION['username']);
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

    <!-- Bootstrap Select Css -->
    <link href="../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Multi Select Css -->
    <link href="../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-blue">
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
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <img src="../favicon.png" width="7%" height="">
                <a class="navbar-brand" href="../ad_home.php"><p style="font-size:20px; font-weight:bolder; margin-top:-7px;">Franz Bakeshoppe & <br> Refreshment</p></a>
            </div>
            <a href="index.php"><button class="btn btn-danger waves-effect"> Logout </button></a>
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
                                        <td> <?php echo $order['pname']; ?> </td>
                                        <td> <?php echo $order['orderqty']; ?>  </td>
                                        <td> <?php echo "₱".$order['subtotal']; ?>  </td>
                                        <td> 
                                            <form action="<?php $_PHP_SELF ?>" method="POST">
                                                <input hidden="" name="pid" value="<?php echo $order['prodid']; ?>">
                                                <button  type="submit" name="submit" value="removeorder" class="btn btn-warning waves-effect">
                                                <i class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </td>
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
                                            <button data-toggle="modal" data-target="#defaultModal" type="submit" name="submit" value="pay" class="btn bg-green btn-block btn-lg waves-effect">PAY</button>
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
                            <h2 style="font-weight:bold;">
                                PRODUCTS
                            </h2>
                        </div>
                             <div class="panel-group" id="accordion_4" role="tablist" aria-multiselectable="true">
                                <!-- Tab -->
                                <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#bread" data-toggle="tab">BREAD</a></li>
                                <li role="presentation"><a href="#burger" data-toggle="tab">BURGERS</a></li>
                                <li role="presentation"><a href="#cakes" data-toggle="tab">CAKES</a></li>
                                <li role="presentation"><a href="#icecream" data-toggle="tab">ICE CREAM</a></li>
                                <li role="presentation"><a href="#shortorders" data-toggle="tab">SHORT ORDERS</a></li>
                                <li role="presentation"><a href="#combo" data-toggle="tab">COMBO MEALS</a></li>
                                <li role="presentation"><a href="#drinks" data-toggle="tab">DRINKS</a></li>
                                <li role="presentation"><a href="#refreshments" data-toggle="tab">REFRESHMENTS</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="bread">
                                    <!-- BREAD -->
                                    <div class="body">
                                        <div class="row clearfix">
                                            <?php error_reporting(E_ERROR | E_PARSE); foreach ($getbread as $index => $bread): ?>
                                            <form action="<?php $_PHP_SELF ?>" method="POST">
                                                <button name="submit" type="submit" value="addorder"  style="border-right: 50px; border-radius: 10px;" type="button"  class="col-xs-6 col-sm-4 col-md-3 col-lg-3 demo-color-box bg-amber">
                                                <div class="color-name"><?php echo $bread['pname']." ₱".$bread['price']."/pcs"; ?></div>
                                                 <?php endforeach; ?>
                                                <input min="0" type="number" name="qty" class="form-control" placeholder="Quantity" required="">
                                                                <br>
                                                <select name="promo" class="form-control show-tick">
                                                    <option value="">-- Select Promo --</option>
                                                    <option value="PAN20">5 for 20</option>
                                                    <option >Soon</option>s
                                                </select>
                                                           
                                                                <input type="hidden" name="pid" value="<?php echo $bread['pid']; ?>">
                                                                <input type="hidden" name="uid" value="<?php echo $data->uid; ?>">
                                                </button>
                                            </form>
                                            
                                             
                                        </div>
                                    </div>
                                    <!-- #END BREAD -->
                                </div>
                            </div>
                                <!-- #END Tab -->
                                    </div>
                                </div>
                    </div>
                </div>
                <!-- #END# Badges -->
    </section>
    <?php if($gettotal[0]['grandtotal'] != NULL): ?>
    <!-- Start Modal -->
    <form action="<?php $_PHP_SELF ?>" method="POST">
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Payment Window</h4>
                        </div>
                        <div class="modal-body">
                        
                        <div class="body table-responsive">
                            <table class="table table-responsive">
                                <thead>
                                    <?php error_reporting(E_ERROR | E_PARSE); foreach ($gettotal as $index => $total): ?>
                                    <tr>
                                        <td>Amount Due: </td>
                                        <td><?php echo "₱".$total['grandtotal']; ?> </td>
                                        <input type="hidden" name="grandtotal" value="<?php echo $total['grandtotal']; ?>">
                                    </tr>
                                    
                                    <tr>
                                        <td>Customer Name: </td>
                                        <td><input type="text" name="customername"></td>
                                        <input hidden name="uid" value="<?php echo $data->uid; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Amount: </td>
                                        <td><input min="<?php echo $total['grandtotal'] ?>" autocomplete="off" id="myInput" required type="number" name="payment"></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </thead>
                            </table>
                        </div>
                        
                        <div class="modal-footer">

                            <button id="myBtn" type="submit" name="submit" value="pay" class="btn btn-link waves-effect">PAY</button>
                            <!-- <button type="button"  class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button> -->
                        </div>
                    </div>
                </div>
    </div>
     </form>
 <?php endif; ?>

    <script>
    var input = document.getElementById("myInput");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
       event.preventDefault();
       document.getElementById("myBtn").click();
      }
    });
    </script>
    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="../plugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="../plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Bootstrap Notify Plugin Js -->
    <script src="../plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/forms/form-validation.js"></script>
    <script src="../js/pages/ui/modals.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
