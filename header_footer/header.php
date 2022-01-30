<?php
session_start();
error_reporting();
require('./db/connect.php'); ?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Moms Cake</title>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">
                <img src="./images/logo.png" width="80px" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                            <?php 
                                if(isset($_SESSION['is_admin'==1])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../admin/dashboard.php">Home </a>
                            </li>
                            <?php 
                                }
                            ?>
                    <li class="nav-item">
                        <?php 
                            $isadmin = $_SESSION['is_admin'];
                                if($isadmin == 1) {
                            ?>
                            <a class="nav-link" href="./admin/dashboard.php">Dashboard</a>
                            <?php 
                                } else {
                            ?>
                            <a class="nav-link" href="my-profile.php">My Profile</a>
                            <?php 
                                }
                            ?>
                            
                        </a>
                    </li>
                    <?php 
                            $isadmin = $_SESSION['is_admin'];
                                if($isadmin == 1) {
                            ?>
                            <?php 
                                } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="change-password.php">Change Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="my-orders.php">My Orders</a>
                            </li>
                            <?php 
                                }
                            ?>
                   
                    <?php
                    } else {
                    ?>
                    
                    <?php } ?>
                    
                </ul>
                <ul class="navbar-nav">
                
                    <?php
                    if (isset($_SESSION['id'])) {
                    ?>

                   
                        <li class="nav-item">
                            <a class="nav-link" href="user-dashboard.php"><b>Hi,</b><?= $_SESSION['name'] ?></a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="btn btn-outline-danger" href="logout.php"><span class="fa fa-sign-out"></span>Logout</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                        <a class="nav-link" href="login.php"><span class="fa fa-sign-in"></span> Login</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="register.php"><span class="fa fa-sign-in"></span> Sign up</a>
                        </li>
                    <?php } ?>
                    
                </ul>
            </div>
        </nav>
    </header>
