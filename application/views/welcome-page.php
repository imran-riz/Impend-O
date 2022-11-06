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

    <title>Impend-O!</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">

    <style>
        .nav-item:hover {
            color: yellow;
            transform: scale(1.02);
        }

        #btnCTA:hover {
            transform: scale(1.10);
        }
    </style>
</head>

<body>
    <!-- navigation -->
    <?php echo $NavBar; ?>
    
    <section class="bg-light">
        <div class="container-lg py-5">
            <div class="row justify-content-center align-items-center py-2">
                <div class="col-md-5 text-center text-md-start pb-4">
                    <div>
                        <h1 class="display-2 text-dark pb-2">Explore events!</h1>
                        <h2 class="display-6 text-muted">
                            Your one stop site to find out all about the events coming up 
                            at The School In The Middle of Nowhere!                            
                        </h2>
                        <div>
                            <a id="btnCTA" href="<?php echo base_url(); ?>index.php/Explore" class="btn btn-dark text-warning mt-3">EXPLORE NOW</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 text-center d-md-block">
                    <img src="<?php echo base_url() ?>assets/images/welcome-page-img.gif" alt="" class="img-fluid">
                </div>
            </div> 
        </div>
    </section>


    <?php echo $Footer; ?>
    

    <!-- JavaScript Bundle with Popper -->
    <script src="<?php echo base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>