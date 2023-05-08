<?php $session = \Config\Services::session(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo($str_site_title); ?></title>

    <!-- Favicon -->
    <?php echo link_tag("assets/brand/favicon.png", 'shortcut icon', 'image/x-icon'); ?>
    <!-- Bootstrap Files Css -->
    <?php echo link_tag('assets/dist/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/dist/css/navbar-top-fixed.css'); ?> 

  </head>
