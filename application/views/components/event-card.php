<div class="card shadow">  
    <div class="card-header text-center">Commencing on: <?php echo date_format(date_create($event["eDate"]),"d F Y"); ?></div>                          
    <div class="card-body text-center">
        <h1 class="card-title display-6">
            <?php echo $event['eTitle']; ?>
        </h1>
        <h5>
            <?php
            if (str_contains(strtolower($event['eVenue']), "online")): 
                echo $event['eVenue'];
            else:
                echo "Venue: " . $event['eVenue'];
            endif;
            ?>
        </h5>
        <p class="card-text">
            <?php echo $event['eDescription']; ?>
        </p>
        <?php 
        if ($event['eFilename'] != NULL): ?>
            <div class="mb-4">
                <img width="450px" src="<?php echo base_url() . 'uploads/' . $event['eFilename'];  ?>" alt="event poster" class="img-fluid">
            </div>
        <?php
        endif; ?>        
        <?php
        if ($editable): ?>
            <div class="my-2 align-items-center">   
                <a href="<?php echo base_url() . 'index.php/EditEvent?id=' . $event['eID'];?>" class="btn btn-warning rounded-circle">
                    <i class="bi bi-pencil"></i>
                </a>
                <button class="DelBtn btn btn-danger rounded-circle" onclick="deleteEvent('<?php echo $event['eID']; ?>')">
                    <i class="bi bi-trash3"></i>
                </button>
            </div>
        <?php
        endif; ?>        
    </div>
    <div class="card-footer text-center fst-italic text-muted">Posted on: <?php echo date_format(date_create($event["ePostedOn"]),"d M Y"); ?></div>
</div>