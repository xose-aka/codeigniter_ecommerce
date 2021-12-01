<?php
/**
 * @var int $product_count
 * @var int $sum_of_price_euro
 * @var int $sum_of_price_dollar
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <!-- Bootstrap styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="/assets/css/web_style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!--[if IE 7]>
    <link href="/assets/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="/assets/icons/favicon.ico">

    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<!--
	Upper Header Section
-->
<header>
    <nav>
        <ul class="menu">
            <li>
                <a class="toggle" href="#"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item">
                <a class="active" href="<?= base_url() ?>"> <span class="icon-home"></span> Home</a>
            </li>
            <li class="nav-item">
                <a href=""><span class="icon-user"></span> <?= $this->session->userdata('user_id') !== FALSE ? $this->session->userdata('username') : 'My Account' ?></a>
            </li class="nav-item">
            <li class="nav-item">
                <a href="<?= base_url('register') ?>"><span class="icon-edit"></span> Free Register </a>
            </li>
            <li class="nav-item">
                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
            </li>
        </ul>
        <a href="<?= base_url('cart') ?>"><span class="icon-shopping-cart"></span> <?= $product_count ?> Item(s) - <span class="badge badge-warning"> <?= $this->session->userdata('unit') !== '' ? ( $this->session->userdata('unit') == 'euro' ? '&euro; ' . $sum_of_price_euro : '$ ' . $sum_of_price_dollar ) : '$ ' . $sum_of_price_dollar ?></span></a>
    </nav>
    <div id="gototop"> </div>
    <nav>
        <h1>
            <a class="logo" href="<?= base_url('') ?>l"><span>Twitter Bootstrap ecommerce template</span>
                <img src="/assets/images/logo-bootstrap-shoping-cart.png" alt="bootstrap shop">
            </a>
        </h1>
        <div>
            <p><br> <strong> Support (24/7) :  0800 1234 678 </strong><br><br></p>
            <span class="btn btn-mini">[ <?= $product_count ?> ] <span class="icon-shopping-cart"></span></span>
            <span id="dollar" class="btn <?= $this->session->userdata('unit') !== '' ? ( $this->session->userdata('unit') == 'euro' ? '' : 'btn-warning' ) : 'btn-warning' ?> btn-mini change">$</span>
            <!--                <span class="btn btn-mini">&pound;</span>-->
            <span id="euro" class="btn <?= $this->session->userdata('unit') !== '' ? ( $this->session->userdata('unit') == 'euro' ? 'btn-warning' : '' ) : '' ?> btn-mini change">&euro;</span>
        </div>
    </nav>
    <nav>
        <ul>
            <li class="active"><a href="<?= base_url('') ?>">Home</a></li>
            <li class=""><a href="<?= base_url('products') ?>">Products</a></li>
            <li class=""><a href="<?= base_url('products') ?>">Products</a></li>
            <li class=""><a href="<?= base_url('products') ?>">Products</a></li>
        </ul>
        <form action="<?= base_url('products/find') ?>" method="post" class="navbar-search pull-left">
            <input type="text" placeholder="Search" name="text" class="search-query span2">
        </form>
        <ul>
            <?php if ($this->session->userdata('user_id')): ?>
                <li class="dropdown">
                    <a href="<?= base_url('logout') ?>"> Logout</a>
                </li>
            <?php else: ?>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
                    <div class="dropdown-menu">
                        <form class="form-horizontal loginFrm" method="post" action="<?= base_url('login/sign_in') ?>">
                            <div class="control-group">
                                <input type="text" class="span2" id="inputEmail" name="username" placeholder="Username">
                            </div>
                            <div class="control-group">
                                <input type="password" class="span2" id="inputPassword" name="password" placeholder="Password">
                            </div>
                            <div class="control-group">
                                <label class="checkbox">
                                    <input type="checkbox"> Remember me
                                </label>
                                <button type="submit" class="shopBtn btn-block">Sign in</button>
                            </div>
                        </form>
                    </div>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
