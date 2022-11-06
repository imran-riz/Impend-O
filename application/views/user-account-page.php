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

    <script type='text/javascript' src="<?php echo base_url('assets/jquery-3.6.1.min.js') ?>"></script>

    <title>Impend-O! - User Account</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">
</head>
<body>
    <script type="text/javascript">
        $(document).ready(function() {});

        function deleteEvent(id) {
            if (confirm("WARNING: All information of this event will be deleted! Proceed??")) {
                $.ajax({
                    url: "<?php echo site_url('UserAccount/deleteEvent') ?>",
                    type: "post",
                    data: {'eID': id},
                    success: function(response) {
                        if (response != "") {
                            alert(response);
                        }
                        location.reload();
                    },
                    error: function(response) {
                        alert('FAILED TO DELETE EVENT - ' + response);
                    }
                });
            }
        }
    </script>

    <!-- Navigation bar -->
    <?php echo $NavBar; ?>

    <section>
        <div class="container-lg my-5">
            <div class="text-center">
                <h1 class="lead fs-1">My Account</h1>                
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <form action="">
                        <label for="email" class="form-label">Email address</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" name="inputEmail" readonly value="<?php echo $UserDetails['sEmail'] ?>">
                        </div>

                        <label for="email" class="form-label">Name</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" name="inputName" readonly value="<?php echo $UserDetails['sName'] ?>">
                        </div>

                        <label for="email" class="form-label">Class teacher</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control" name="inputClassTeacher" readonly value="<?php echo $UserDetails['sClassTeacher'] ?>">
                        </div>
                        
                        <label for="email" class="form-label">Account created on</label>
                        <div class="input-group mb-4">
                            <input type="date" class="form-control" readonly value="<?php echo $UserDetails['sCreatedOn'] ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="sectionEvents">
        <div class="container-lg my-3">
            <h1 class="lead fs-2 text-center">Events Posted</h1>
        </div>
        
        <div class="container-lg mb-5">
            <?php
            if (empty($EventCards)): ?>
                <div class="row row-cols-1">
                    <p class="text-center lead">
                        You haven't posted anything. <a href="<?php echo base_url('index.php/PostEvent') ?>">Post an event now!</a>
                    </p>
                </div>
            <?php
            else: ?>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                    <?php 
                    for ($i = 0; $i < sizeof($EventCards); $i++): ?>
                        <div class="col my-3 px-2">
                            <?php echo $EventCards[$i]; ?>
                        </div>
                    <?php     
                    endfor;?>
                </div>                
            <?php
            endif; ?>
        </div>
    </section>


    <!-- page footer -->
    <?php echo $Footer; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>