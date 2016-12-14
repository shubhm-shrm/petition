<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>TITLE</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.0/material.grey-orange.min.css">
    <?php echo link_tag('assests/css/styles.css'); ?>
  
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">
      <header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
      <a class=" mdl-button mdl-button--fab mdl-button--mini-fab mdl-button--raised mdl-js-button mdl-js-ripple-effect" href="<?= site_url('user') ?>">
        <img class="material-icons" src="https://zersey.com/static\img\logo\final_logo.jpg">
      </a>
      <!-- Title  of Header -->
      <span class="mdl-layout-title mdl-color-text--white"> <i>&nbsp;Sign The Petition.!</i></span>
      <div class="mdl-layout-spacer"></div>
      <nav class="mdl-navigation">
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
  </header>

      <main class="mdl-layout__content">
        <div class="demo-back">
          <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href="index.html" title="go back" role="button">
            <i class="material-icons" role="presentation">arrow_back</i>
          </a>
        <?php foreach ($data as $data) {?>
        


        <div class="mdl-grid" style="">
          <div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3><?= $data->heading ?></h3>
            
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation">
              <a class="mdl-navigation__link" href="login.php">
              <button class="mdl-button  mdl-button--raised  mdl-color-text--grey-50" id=" loginDialogbtn" >Sign In For Petition</button>
              </a>
            </nav>
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
              <div class="minilogo"></div>
              <div>
                <strong><?= $data->pfirstname." ".$data->plastname?></strong>
                <span><?php
                  $DateTime = $data->pdatetime;  
                  $interval = date_create($DateTime)->diff(new DateTime());
                    echo $interval->format('%R%a days');
                ?></span>
              </div>
              <!-- <div class="section-spacer"></div>
              <div class="meta__favorites">
                425 <i class="material-icons" role="presentation">favorite</i>
                <span class="visuallyhidden">favorites</span>
              </div> -->
            </div>
            <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
              <img src="">
              <p><?= $data->description ?>
              </p>
            </div>
            <div class="mdl-color-text--primary-contrast mdl-card__supporting-text comments">
              <form method="post" onsubmit="submitForm(<?= $data->petition_id ?>);return false;">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <textarea rows=1 class="mdl-textfield__input" id="comment"></textarea>
                  <label for="comment" class="mdl-textfield__label">Join the discussion</label>
                </div>
                <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                  <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
                </button>
              </form>

              <!--  -->
              <?php 
              $count= 0;
              $name =explode("|", $data->firstname);
              $comment = explode("|",$data->comments);
              $time = explode("|",$data->tym);
              foreach ($name as $name) {
              ?>
              <div class="comment mdl-color-text--grey-700">
                <header class="comment__header">
                  <img src="images/co1.jpg" class="comment__avatar">
                  <div class="comment__author">
                    <strong><?= $name ?></strong>
                    <span><?php
                    $DateTime = $time[$count];  
                    $interval = date_create($DateTime)->diff(new DateTime());
                    echo $interval->format('%R%a days');
                    ?></span>
                  </div>
                </header>
                <div class="comment__text">
                <?= $comment[$count] ?>
                </div>
              <br><hr><br>              
              </div>              
              <?php $count++; }
              ?>
              <!--  -->
            </div>
          </div>
        </div>
        <?php } ?>

      <?php include('public_footer.php');?>
      </main>
      <script type="text/javascript">
        function submitForm(petitionID) {
          var petitionID = petitionID;
          var data = $('textarea').val();
          $('textarea').html(' ');
          var dt = new Date();
          var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
          var isSet = '<?php echo isset($_SESSION['user_id']) ?>';
          if (isSet) {
          $.ajax({
            type:"POST",
            data:{data:data,petitionID:petitionID},
            url:'<?php echo base_url('index.php/petitions/comment_petition'); ?>',
            success:function(user_name)
            {
              $( '.comment' ).last().after('<div class="comment mdl-color-text--grey-700"><header class="comment__header"><img src="" class="comment__avatar"><div class="comment__author"><strong>'+user_name+'</strong><span>'+time+'</span></div></header><div class="comment__text">'+data+'</div></div><br><hr><br>');
            }
          });
          }
          else
            window.location = '<?php echo base_url('index.php/login/user_login'); ?>';
        }
      </script>          