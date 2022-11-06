<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('assets/bootstrap/bootstrap.min.css') ?>" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Impend-O! - About</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">
</head>
<body>
    <!-- navigation -->
    <?php echo $NavBar; ?>

    <section class="bg-light py-4">
        <div class="container-lg text-center my-2">
            <h1 class="display-6 my-3">About</h1>
            <p class="lead px-5">
                Impend-O! is a web application intended to be used by a school to provide its students
                with a platform to make announcements of events coming up on their school calendar. It can 
                be any event! The sports meet, drama competition or even what almost all students dread - exams!
            </p>
            <p class="lead px-5">
                I worked on this project as part of my final assignment of a 
                <a href="https://www.marhaonline.com/PHP_development_training">web development course</a> that I followed. 
                By working on this project, I was able to test my PHP, SQL and other skills. I learnt how to use BootStrap
                and got that hang of CodeIgniter. More importantly, I won the challenge against myself by developing my very first 
                complete and functional full-stack web application!
            </p>
            <p>Started: 11 October 2022 | Finished: 25 October 2022</p>
        </div>
        <div class="container-lg text-center my-5">
            <img width="400px" src="<?php echo base_url('assets/images/logo.png') ?>" alt="">
        </div>        
    </section>

    <!-- page footer -->
    <?php echo $Footer; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>