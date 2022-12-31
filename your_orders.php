<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
} else {
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Status Pesanan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css" rel="stylesheet">
    .indent-small {
        margin-left: 5px;
    }

    .form-group.internal {
        margin-bottom: 0;
    }

    .dialog-panel {
        margin: 10px;
    }

    .datepicker-dropdown {
        z-index: 200 !important;
    }

    .panel-body {
        background: #e5e5e5;
        /* Old browsers */
        background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* FF3.6+ */
        background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
        /* Chrome,Safari4+ */
        background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Chrome10+,Safari5.1+ */
        background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* Opera 12+ */
        background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
        /* IE10+ */
        background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
        /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
        font: 600 15px "Open Sans", Arial, sans-serif;
    }

    label.control-label {
        font-weight: 600;
        color: #777;
    }




    @media only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px) {}
    </style>

    <script type="text/javascript">
    window.$crisp = [];
    window.CRISP_WEBSITE_ID = "8d5e7306-aa3a-4a23-aeb5-6ada68beee90";
    (function() {
        d = document;
        s = d.createElement("script");
        s.src = "https://client.crisp.chat/l.js";
        s.async = 1;
        d.getElementsByTagName("head")[0].appendChild(s);
    })();
    </script>

</head>

<body>


    <header id="header" class="header-scroll top-header headrom">

        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/nav.png" alt=""> </a>
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



        <div class="inner-page-hero bg-image" data-image-src="images/img/restrrr.png">
            <div class="container"> </div>

        </div>
        <div class="result-show">
            <div class="container">
                <div class="row">


                </div>
            </div>
        </div>

        <section class="restaurants-page">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                    </div>
                    <div class="col-xs-12">
                        <div class="bg-gray">
                            <div class="row">

                                <table class="table table-bordered table-hover">
                                    <thead style="background: #404040; color:white;">
                                        <tr>

                                            <th>Item</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php

    $query_res = mysqli_query($db, "select * from users_orders where u_id='" . $_SESSION['user_id'] . "'");
    if (!mysqli_num_rows($query_res) > 0) {
        echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
    } else {

        while ($row = mysqli_fetch_array($query_res)) {

                                        ?>
                                        <tr>
                                            <td data-column="Item">
                                                <?php echo $row['title']; ?>
                                            </td>
                                            <td data-column="Quantity">
                                                <?php echo $row['quantity']; ?>
                                            </td>
                                            <td data-column="price">Rp
                                                <?php echo $row['price']; ?>
                                            </td>

                                            <td data-column="status">
                                                <?php
            $status = $row['status'];
            if ($status == "" or $status == "NULL") {
                                                ?>
                                                <button type="button" class="btn btn-info"><span class="fa fa-bars"
                                                        aria-hidden="true"></span>
                                                    Dimasak</button>
                                                <?php
            }
            if ($status == "in process") { ?>
                                                <button type="button" class="btn btn-warning"><span
                                                        class="fa fa-motorcycle" aria-hidden="true"></span> Dalam
                                                    Perjalanan
                                                </button>
                                                <?php
            }
            if ($status == "closed") {
                                                ?>
                                                <button type="button" class="btn btn-success"><span
                                                        class="fa fa-check-circle" aria-hidden="true"></span>
                                                    Diterima</button>
                                                <?php
            }
                                                ?>
                                                <?php
            if ($status == "rejected") {
                                                ?>
                                                <button type="button" class="btn btn-danger"> <i
                                                        class="fa fa-close"></i> Cancel</button>
                                                <?php
            }
                                                ?>






                                            </td>

                                            <td data-column="Keterangan">
                                                <?php echo $row['remark']; ?>
                                            </td>

                                            <td data-column="Date">
                                                <?php echo $row['date']; ?>
                                            </td>
                                            <td data-column="Action"> <a
                                                    href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>"
                                                    onclick="return confirm('Batalkan Pesanan?');"
                                                    class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i
                                                        class="fa fa-trash-o" style="font-size:16px"></i></a>
                                            </td>

                                        </tr>


                                        <?php }
    } ?>




                                    </tbody>
                                </table>



                            </div>

                        </div>



                    </div>



                </div>
            </div>
    </div>
    </section>


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
