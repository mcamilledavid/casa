<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Casa</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
        <link href="<?php echo URL; ?>css/switch.css" rel="stylesheet">
        <link href="<?php echo URL; ?>css/ionicons.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    </head>
    <body>
        <?php if (!isset($_SESSION['username'])) { ?>
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL; ?>">casa</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form action="<?php echo URL; ?>home/search" class="navbar-form navbar-left" method="POST">
                        <div class="form-group">
                            <i class="ionicons ion-ios-search ionicons-search"></i>
                            <input type="text" class="form-control header-search-form" name="search_value" value="" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default header-search-btn" name="submit_search">Search</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL; ?>post" class="header-post-listing-btn">Post a Listing</a></li>
                        <li><a href="<?php echo URL; ?>home/showListings">Browse Listings</a></li>
                        <li><a href="#signup" onclick="document.getElementById('popup-signup').style.display = 'block'">Sign Up</a></li>
                        <li><a href="#login" onclick="document.getElementById('popup-login').style.display = 'block'">Log In</a></li>
                    </ul>
                </div>
            </nav>
        <?php } else { ?>
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL; ?>">casa</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <form action="<?php echo URL; ?>home/search" class="navbar-form navbar-left" method="POST">
                        <div class="form-group">
                            <i class="ionicons ion-ios-search ionicons-search"></i>
                            <input type="text" class="form-control header-search-form" name="search_value" value="" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default header-search-btn" name="submit_search">Search</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL; ?>post" class="header-post-listing-btn">Post a Listing</a></li>
                        <li><a href="<?php echo URL; ?>home/showListings">Browse Listings</a></li>
                        <li class="dropdown header-user-container">
                            <a href="#" class="dropdown-toggle ionicons-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="header-user"><?php if (isset($_SESSION["username"])) echo ($_SESSION["username"]); ?></span><i class="ionicons ion-ios-contact-outline"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Manage Listings</a></li>
                                <li><a href="<?php echo URL; ?>account">Edit Account</a></li>
                                <li><a href="<?php echo URL; ?>logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php } ?>

