<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>TITLE</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php echo link_tag('assests/css/material.grey-orange.min.css'); ?>
    <?php echo link_tag('assests/css/styles.css'); ?>
  
    <link rel="stylesheet" href="styles.css">
  </head>
<body>
<style>
  .liked{
    color:inherit
  } 
</style>
 <!-- MDL Fixed Layout Container -->
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <!-- Header Container -->
  <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <a class=" mdl-button mdl-button--fab mdl-button--mini-fab mdl-button--raised mdl-js-button mdl-js-ripple-effect" href="<?php echo site_url('user') ?>">
        <img class="material-icons" src="https://zersey.com/static\img\logo\final_logo.jpg">
      </a>
      <!-- Title  of Header -->
      <span class="mdl-layout-title mdl-color-text--white"> <i>&nbsp;Sign The Petition.!</i></span>
      <div class="mdl-layout-spacer"></div>
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="<?php echo site_url('petitions/add_petition') ?>">
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="" >Create Petition</button>
        </a>
        <?php if(! $this->session->userdata('user_id')) {?>
        <a class="mdl-navigation__link" href="<?php echo site_url('login/user_login') ?>">
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="loginDialogbtn" >Log In</button>
        </a>
        <?php
        } 
        else {
        ?>
        <a class="mdl-navigation__link" href="<?php echo site_url('login/do_logout') ?>">
        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" id="loginDialogbtn" >Log Out</button>
        </a>
        <?php } ?>
      </nav>
    </div>