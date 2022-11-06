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

    <title>Impend-O! - Edit Event</title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/favicon.png') ?>">
</head>
<body>
    <script>
        $(document).ready(function() {
            if (document.getElementById("divAlert") != null) {                
                setTimeout(function() {
                    location.replace("<?php echo base_url() . 'index.php/UserAccount#sectionEvents' ?>");
                }, 1500);                
            }
            
            btn = document.getElementById("btnRemove");
            if (btn == null) {
                $("#divImg").hide();
            }
            else {
                $("#divUploadImg").hide();
                
                btn.onclick = function() {
                    $("#divImg").slideUp();
                    $("#divUploadImg").slideDown();
                    
                    document.getElementById("inputImgStatus").value = "REMOVE";
                }                
            }           
            
            document.getElementById("btnCancel").onclick = function() {
                document.getElementById("eventForm").reset();
                location.replace("<?php echo base_url() . 'index.php/UserAccount#sectionEvents' ?>");
            }
        });
    </script>


    <!-- Navigation bar -->
    <?php echo $NavBar; ?>

    <section>
        <div class="container-lg">
            <div class="text-center my-4">
                <h1 class="lead fs-1">Edit Event</h1>                
            </div>

            <div class="row justify-content-center align-items-center mb-5">
                <div class="col-md-6">
                    <?php 
                    if ($Error == "SUCCESS"): ?>
                        <div class="alert alert-success text-center" id="divAlert">
                            All changes saved!!
                            <i class="bi bi-check-lg"></i>
                        </div>
                    <?php 
                    else: ?>
                        <?php echo form_open_multipart("EditEvent/saveEdits?id=".$Id, array("id" => "eventForm")); ?>
                            <label for="event title" class="form-label"><span class="text-danger">* </span>Title</label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="inputTitle" min="10" maxlength="150" required value="<?php echo $Title; ?>">
                            </div>

                            <div class="mb-4">
                                <input type="text" id="inputImgStatus" name="inputImgStatus" hidden value="">

                                <?php
                                if ($Filename != NULL): ?>
                                    <div class="text-center" id="divImg">
                                    <img width="350px" src="<?php echo base_url() . 'uploads/' . $Filename;  ?>" alt="event poster" class="img-fluid">
                                    <br>
                                    <input type="button" class="btn btn-outline-danger my-2" id="btnRemove" value="Remove poster">
                                    </div>
                                <?php
                                endif; ?>

                                <div id="divUploadImg">
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
                                        <input type="file" class="form-control" name="inputImg" id="inputImg">                                    
                                    </div>
                                </div>
                            </div>

                            <label for="event date" class="form-label"><span class="text-danger">* </span>Commencement date</label>
                            <div class="input-group mb-4">
                                <input type="date" class="form-control" name="inputDate" required value="<?php echo $Date; ?>">
                            </div>

                            <label for="event venue" class="form-label">Venue <span class="text-danger">(leave blank only if the event is held online)</span></label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="inputVenue" maxlength="200" value="<?php echo $Venue; ?>">
                            </div>

                            <label for="event description" class="form-label"><span class="text-danger">* </span>Description</label>
                            <div class="input-group mb-4">
                                <textarea name="txtDescription" class="form-control" style="height: 180px;" maxlength="500" required><?php echo $Description; ?></textarea>
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
                                <input type="button" class="btn btn-warning my-2 mx-2" value="Cancel" id="btnCancel">
                                <input type="submit" class="btn btn-success my-2 mx-2" value="Save">
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