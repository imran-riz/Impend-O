<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-expand-md navbar-dark py-1 bg-dark">
    <div class="container-xxl">
        <a href="<?php echo base_url() ?>" class="navbar-brand">
            <div class="display-5 text-white">
                <img width="155px" src="<?php echo base_url('assets/images/logo-nav.png') ?>" alt="logo">
            </div>                
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#divNav" 
        aria-controls="divNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
        </button>

        <!-- navbar link/s -->
        <div class="collapse navbar-collapse justify-content-end align-center" id="divNav">
            <ul class="navbar-nav">
                <li class="nav-item mx-1">
                    <a href="<?php echo base_url() ?>index.php/About" class="nav-link text-white">
                        <i class="bi bi-info-circle"></i>
                        About
                    </a>
                </li>
                <li class="nav-item mx-1">
                    <a href="<?php echo base_url() ?>index.php/Explore" class="nav-link text-white">
                        <i class="bi bi-calendar2-event"></i>
                        Explore Events
                    </a>
                </li>
                <?php 
                if ($Email == null): ?>
                    <li class="nav-item mx-1">
                        <a href="<?php echo base_url() ?>index.php/SignIn" class="nav-link text-warning">
                            <i class="bi bi-box-arrow-right"></i>
                            Sign In
                        </a>
                    </li>
                <?php
                else: ?>
                    <li class="nav-item mx-1">
                        <a href="<?php echo base_url() ?>index.php/PostEvent" class="nav-link text-white">
                            <nav>
                                <i class="bi bi-plus-square"></i>
                                Post Event
                            </nav>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="<?php echo base_url() ?>index.php/UserAccount" class="nav-link text-white">
                            <nav>
                                <i class="bi bi-person"></i>
                                My Account
                            </nav>
                        </a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="<?php echo base_url() ?>index.php/UserAccount/signOut" class="nav-link text-warning">
                            <nav>
                                <i class="bi bi-box-arrow-left"></i>
                                Sign out
                            </nav>
                        </a>
                    </li>
                <?php 
                endif; ?>
            </ul>
        </div>
    </div>
</nav>