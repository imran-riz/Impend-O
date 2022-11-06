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

    <title>Impend-O! - Post An Event</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">
</head>
<body>
    <script>
        $(document).ready(function() {
            if (document.getElementById("divAlertSuccess") != null) {                
                setTimeout(function() {
                    location.replace("<?php echo base_url() . 'index.php/UserAccount#sectionEvents' ?>");
                }, 1500);                
            }
        });
    </script>


    <!-- Navigation bar -->
    <?php echo $NavBar; ?>

    <section class="">
        <div class="container-lg py-3">
            <div class="text-center my-4">
                <h1 class="lead fs-1">Post an Event!</h1>                
            </div>

            <div class="row justify-content-center align-items-center mb-5">
                <div class="col-md-6">
                    <?php
                    if ($Error == "SUCCESS"): ?>
                        <div class="alert alert-success text-center mb-3" id="divAlertSuccess">
                            <p class="lead my-1">
                                Event successfully added!
                            </p>
                        </div>
                    <?php
                    else: ?>
                        <?php echo form_open_multipart("PostEvent/postEvent"); ?>
                            <label for="email" class="form-label"><span class="text-danger">* </span>Title</label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="inputTitle" value="<?php echo $Title; ?>" required>
                            </div>

                            <label for="email" class="form-label"><span class="text-danger">* </span>Commencement date</label>
                            <div class="input-group mb-4">
                                <input type="date" class="form-control" name="inputDate" value="<?php echo $Date; ?>" required>
                            </div>

                            <label for="email" class="form-label">Venue <span class="text-danger">(leave blank only if the event is held online)</span></label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="inputVenue" value="<?php echo $Venue; ?>">
                            </div>

                            <label for="email" class="form-label"><span class="text-danger">* </span>Description</label>
                            <div class="input-group mb-4">
                                <textarea name="txtDescription" class="form-control" style="height: 180px;" required><?php echo $Description; ?></textarea>
                            </div>

                            <label for="email" class="form-label">Upload your event's poster</label>
                            <br>
                            <label for="conditions" class="form-label">
                                <ul>
                                    <li>Allowed file types: png, jpg, jpeg, gif</li>
                                    <li>Max size: 1.5 MB</li>
                                    <li>Max width: 1080 px</li>
                                    <li>Max height: 1080 px</li>
                                </ul>
                            </label>
                            <div class="input-group mb-4">
                                <input type="file" class="form-control" name="inputImg">
                            </div>
                                
                            <?php
                            if ($Error != ""): ?>
                                <div class="alert alert-danger text-center mb-3" id="divAlertError">
                                    <p class="my-1">
                                        <?php echo $Error; ?>
                                    </p>
                                </div>
                            <?php
                            endif; ?>                                

                            <div class="text-center">
                                <input type="submit" class="btn btn-secondary mt-2" name="submitBtn" value="Add Event">
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