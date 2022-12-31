<!DOCTYPE html>
<html lang="en">
<?php
ob_start();
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert()
{


    echo "<script>alert('Terimakasih. Pesananmu akan segera dibuat');</script>";
    echo "<script>window.location.replace('your_orders.php');</script>";
}

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {


    foreach ($_SESSION["cart_item"] as $item) {
   
        $item_total += ($item["price"] * $item["quantity"]);

        if (isset($_POST['submit'])) {

         
        $SQL = "INSERT INTO users_orders(u_id,title,quantity,price) VALUES('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";
        
        
        mysqli_query($db, $SQL);
           


            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "Terimakasih. Pesananmu segera diantar!";

            function_alert();



        }
    }
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Checkout</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <div class="site-wrapper">
        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                        data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/nav.png" alt="">
                    </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span
                                        class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Kategori <span
                                        class="sr-only"></span></a> </li>

                            <?php
    if (empty($_SESSION["user_id"])) {
        echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
    } else {


        echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Pesananku</a> </li>';
        echo '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
    }

                            ?>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">

                        <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Pilih
                                Kategori</a></li>
                        <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pilih menu favoritmu</a>
                        </li>
                        <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Pesan dan
                                Pembayaran</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">

                <span style="color:green;">
                    <?php echo $success = ""; ?>
                </span>

            </div>




            <div class="container m-t-30">
                <form action="" method="post">
                    <div class="widget clearfix">

                        <div class="widget-body">
                            <form method="post" action="#">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="cart-totals margin-b-20">
                                            <div class="cart-totals-title">
                                                <h4>Rincian Pesanan:</h4>
                                            </div>
                                            <div class="cart-totals-fields">

                                                <table class="table">
                                                    <tbody>



                                                        <tr>
                                                            <td>Subtotal</td>
                                                            <td>
                                                                <?php echo "Rp" . $item_total; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Biaya Pengiriman</td>
                                                            <td>Gratis</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-color"><strong>Total</strong></td>
                                                            <td class="text-color"><strong>
                                                                    <?php echo "Rp" . $item_total; ?>
                                                                </strong></td>
                                                        </tr>
                                                    </tbody>




                                                </table>
                                            </div>
                                        </div>
                                        <div class="payment-option">
                                            <ul class=" list-unstyled">
                                                <li>
                                                    <label class="custom-control custom-radio  m-b-20">
                                                        <input name="mod" id="radioStacked1" checked value="COD"
                                                            type="radio" class="custom-control-input"> <span
                                                            class="custom-control-indicator"></span> <span
                                                            class="custom-control-description">Cash on Delivery</span>
                                                    </label>
                                                </li>

                                                <li>
                                                    <label class="custom-control custom-radio  m-b-20">
                                                        <input name="mod" id="radioStacked1" checked value="COD"
                                                            type="radio" class="custom-control-input"> <span
                                                            class="custom-control-indicator"></span> <span
                                                            class="custom-control-description">Transfer Bank (konfirmasi
                                                            admin)</span>
                                                    </label>
                                                </li>

                                            </ul>
                                            <p class="text-xs-center"> <input type="submit"
                                                    onclick="return confirm('Konfirmasi Pesanan?');" name="submit"
                                                    class="btn btn-success btn-block" value="Pesan Sekarang!">
                                            </p>
                                        </div>
                            </form>
                        </div>
                    </div>

            </div>
        </div>
        </form>
    </div>

    <footer class="footer">
        <div class="container">


            <div class="bottom-footer">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 payment-options color-gray">
                        <h5>Metode Pembayaran</h5>
                        <ul>
                            <li>
                                <a href="#"> <img src="images/bayar.png" alt="Bayar"> </a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-4 address color-gray">
                        <h5>Alamat</h5>
                        <p>GadingFajar 1 Blok B7 No.11
                            Siwalanpanji, Buduran Sidoarjo
                        </p>
                        <h5>Phone: +6282148717878</a></h5>
                    </div>
                    <div class="col-xs-12 col-sm-5 additional-info color-gray">
                        <h5>Sosial Media</h5>
                        <ul>
                            <li>
                                <a href="https://www.instagram.com/andraakr/?hl=id">
                                    <img src="images/ig.png" alt="Instagram">
                                </a>

                                <a href="https://wa.me/+6281934342238">
                                    <img src="images/WA.png" alt="WhatsApp">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>

<?php
}
?>
