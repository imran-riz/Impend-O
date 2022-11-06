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

    <title>Impend-O! - Sign In</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">
</head>
<body>
    <!-- navigation -->
    <?php echo $NavBar; ?>

    <section>
        <div class="container-lg">
            <div class="row justify-content-center align-items-center py-3 my-5">
                <div class="col-md-5 text-center d-none d-lg-block px-5">
                    <img src="<?php echo base_url() ?>assets/images/sign-in-page-img.gif" alt="sign in image" class="img-fluid">
                </div>

                <div class="col-9 col-md-6 col-lg-5">
                    <div class="card px-4 border-light">
                        <div class="text-center text-black py-5">
                            <h2>Sign In To Your Account</h2>
                        </div>

                        <?php echo form_open("SignIn/signInToAcct");?>
                            <label for="email" class="form-label text-black">Email address</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="inputEmail" maxlength="100" required value="<?php echo $Email ?>" placeholder="e.g. peter@example.com">
                            </div>
                            
                            <label for="password" class="form-label text-black">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="inputPassword" maxlength="100"  required value="<?php echo $Password ?>">
                            </div>

                            <?php
                            if ($Error != ""): ?>
                                <div class="alert alert-danger text-center mb-3" id="divAlert">                                    
                                    <p class="my-1"><?php echo $Error; ?></p>
                                </div>
                            <?php
                            endif; ?>

                            <div class="text-center mb-5">
                                <input type="submit" class="btn btn-secondary" name="submitBtn" value="Sign In">
                            </div>
                        </form>
                    </div>
                </div>     
                
                <div class="text-center text-muted mx-3 my-5">
                    Are you a student at The School In The Middle of Nowhere? Got no account? <a href="<?php echo base_url() ?>index.php/SignUp">Sign up</a>
                </div>
            </div>

            
        </div>
    </section>

    <!-- page footer -->
    <?php echo $Footer; ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>