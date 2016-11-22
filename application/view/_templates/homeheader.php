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
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,500,600,700" rel="stylesheet">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo URL; ?>post" class="header-post-listing-btn">Post a Listing</a></li>
                        <li><a href="<?php echo URL; ?>home/showListings">Browse Listings</a></li>
                        <li class="dropdown header-user-container">
                            <a href="#" class="dropdown-toggle ionicons-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="header-user"><?php if (isset($_SESSION["username"])) echo ($_SESSION["username"]); ?></span><i class="ionicons ion-ios-contact-outline"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo URL; ?>manage">Manage Listings</a></li>
                                <?php if ($_SESSION['isStudent'] == 1) { ?> <li><a href="<?php echo URL; ?>favorites">Favorites</a></li> <?php } ?>
                                <li><a href="<?php echo URL; ?>account">Edit Account</a></li>
                                <li><a href="<?php echo URL; ?>logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        <?php } ?>

