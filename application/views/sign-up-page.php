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

    <title>Impend-O! - Sign Up!</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">
</head>
<body>
    <!-- navigation -->
    <?php echo $NavBar; ?>

    <section>
        <div class="container-lg px-5 my-5">
            <div class="text-center mb-3">
                <h2>Sign Up</h2>
            </div>

            <div class="row justify-content-center align-items-center mb-5">
                <div class="col-md-6">
                    <?php
                    if ($Error == "SUCCESS"): ?>
                        <div class="alert alert-success text-center my-2 " id="divAlert">
                            <p class="my-1">You've successfully signed up! You'll receive an email from the school's administrator once approved.</p>
                        </div>
                    <?php
                    else: ?>
                        <?php echo form_open("SignUp/signUp"); ?>
                            <label for="first_name" class="form-label"><span class="text-danger">* </span>First name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputFirstName" maxlength="100" required value="<?php echo $FirstName ?>" placeholder="e.g. Peter">
                            </div>
                            
                            <label for="last_name" class="form-label"><span class="text-danger">* </span>Last name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputLastName" maxlength="100" required value="<?php echo $LastName ?>" placeholder="e.g. Jones">
                            </div>
                            
                            <label for="class_teacher" class="form-label"><span class="text-danger">* </span>Name of class teacher</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="inputTeacher" maxlength="100" required value="<?php echo $ClassTeacher ?>" placeholder="e.g. M.I.Z Khalid">
                            </div>

                            <label for="email" class="form-label"><span class="text-danger">* </span>Email address</label>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="inputEmail" maxlength="100" required value="<?php echo $Email ?>" placeholder="e.g. peterjones@example.com">
                            </div>

                            <label for="password" class="form-label"><span class="text-danger">* </span>New password</label>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control" name="inputPassword" maxlength="100" required value="<?php echo $Password ?>">
                            </div>

                            <label for="conditions" class="form-label">
                                The password <b>must</b> contain
                                <ul>
                                    <li>at least 2 letters</li>
                                    <li>at least 2 digits</li>
                                    <li>at least 2 special symbols from ! @ # $ % ^ & *</li>
                                </ul>
                            </label>

                            <?php
                            if ($Error != ""): ?>
                                <div class="alert alert-danger text-center my-2 " id="divAlert">
                                    <p class="my-1"><?php echo $Error; ?></p>
                                </div>
                            <?php
                            endif; ?>
                            

                            <div class="text-center mt-3">
                                <input type="submit" class="btn btn-secondary" name="submitBtn" value="Sign Up">
                            </div>
                        </form>
                    <?php
                    endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- page footer -->
    <?php 
    if ($Error != "SUCCESS") {
        echo $Footer; 
    }?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>