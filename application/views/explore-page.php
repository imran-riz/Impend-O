<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Impend-O! - Explore Events</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">

    <style>
        .card {
            transform: scale(0.95);
        }
        .card:hover {
            transform: scale(0.97);
        }
    </style>
</head>

<body>
    <!-- navigation bar -->
    <?php echo $NavBar; ?>

    <section>
        <div class="container-lg">
            <h1 class="display-5 text-center my-4 text-md-start">
                Find out all about the upcoming events below
            </h1>
        </div>
    </section>

    <section class="mb-5">
        <div class="container-lg mh-100 my-3">
            <?php
            if (empty($EventCards)): ?>
                <div class="row row-cols-1 row-cols-md-1">
                    <div class="col my-3 px-4">
                        <div class="card shadow">
                            <div class="card-header text-center lead">
                                looks like there aren't anything for now...
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            else: ?>
                <div class="row row-cols-1 row-cols-md-2">
                    <?php 
                    foreach ($EventCards as $card): ?>
                        <div class="col my-3 px-4">
                            <?php echo $card; ?>
                        </div>
                    <?php
                    endforeach; ?>
                </div>
            <?php
            endif; ?>
        </div>
            
    </section>


    <?php echo $Footer; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
