
<?php include('public_header.php'); ?>
    <!-- Tab Bar Container , and Tab links -->
    <div class=" mdl-layout__tab-bar mdl-js-ripple-effect">
      <a class="mdl-button mdl-js-ripple-effect mdl-layout__tab mdl-color-text--white category" id="animal-welfare">Animal Welfare</a>
      <a class="mdl-button mdl-js-ripple-effect mdl-layout__tab mdl-color-text--white category" id="human-rights">Human Rights</a>
      <a class="mdl-button mdl-js-ripple-effect mdl-layout__tab mdl-color-text--white category" id="environment">Environment</a>
      <a class="mdl-button mdl-js-ripple-effect mdl-layout__tab mdl-color-text--white category" id="health">Health</a>
      <a class="mdl-button mdl-js-ripple-effect mdl-layout__tab mdl-color-text--white category" id="politics">Politics</a>
      <a class="mdl-button mdl-js-ripple-effect mdl-layout__tab mdl-color-text--white category" id="education">Education</a>
      <a class="mdl-button mdl-js-ripple-effect mdl-layout__tab mdl-color-text--white category" id="local-issues">Local Issues</a>

    </div>
  </header>
  </div>

    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <div class="demo-blog__posts mdl-grid">

          <?php
          
           foreach ($data as $data) {
        ?>
        <div class="mdl-card  mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50" style="background-image: url('<?= $data->img_url ?>');">
              <h3><a href="<?php echo site_url('user/view_petition/'.$data->petition_id."/".$data->heading) ?>"></a><?= $data->heading ?></h3>
            </div>
            <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
              <?= word_limiter($data->description, 20) ?>
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
                <strong><?= $data->first_name.' '.$data->last_name ?></strong>
                <span>
                <?php
                  $DateTime = date_create($data->date_time);  
                  $interval = $DateTime->diff(new DateTime());
                    echo $interval->format('%R%a days');
                ?></span>
              </div>
              <div class="mdl-layout-spacer"></div>
              <nav class="comment__actions">

              <?php 
              $liked_by = explode("|", $data->liked_by);

              if (in_array($this->session->userdata('user_id'), $liked_by)) {
              ?>  
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon liked" id="<?= $data->petition_id ?>">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>
              <?php
              } 
              else {
              ?>  
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon like" id="<?= $data->petition_id ?>">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>              
              <?php } ?> 
            </nav>
            </div>
          </div>

          <?php } 
           
          ?>

          





          <div class="mdl-card mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3><a href="<?php echo site_url('user/view_petition') ?>">Coffee Pic</a></h3>
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
                <strong>The Newist</strong>
                <span>2 days ago</span>
              </div>
              <div class="mdl-layout-spacer"></div>
              <nav class="comment__actions">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon like">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>
            </nav>
            </div>
          </div>
          

          <div class="mdl-card  mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50" style="background-image: url('<?php echo "https://zersey.com/static/img/home/Photographer.jpg"?>');">
              <h3><a href="<?php echo site_url('user/view_petition') ?>">On the road again</a></h3>
            </div>
            <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
              Enim labore aliqua consequat ut quis ad occaecat aliquip incididunt. Sunt nulla eu enim irure enim nostrud aliqua consectetur ad consectetur sunt ullamco officia. Ex officia laborum et consequat duis.
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
                <strong>The Newist</strong>
                <span>2 days ago</span>
              </div>
              <div class="mdl-layout-spacer"></div>
              <nav class="comment__actions">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon like">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>
            </nav>
            </div>
          </div>
          <div class="mdl-card amazing mdl-cell mdl-cell--12-col" >
            <div class="mdl-card__title mdl-color-text--grey-50" style="background-image: url('<?php echo "https://zersey.com/static/img/home/Photographer.jpg"?>');">
              <h3 class="quote"><a href="<?php echo site_url('user/view_petition') ?>">I couldn’t take any pictures but this was an amazing thing…</a></h3>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
              Enim labore aliqua consequat ut quis ad occaecat aliquip incididunt. Sunt nulla eu enim irure enim nostrud aliqua consectetur ad consectetur sunt ullamco officia. Ex officia laborum et consequat duis.
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
                <strong>The Newist</strong>
                <span>2 days ago</span>
              </div>
              <div class="mdl-layout-spacer"></div>
              <nav class="comment__actions">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon like">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>
            </nav>
            </div>
          </div>
          <div class="mdl-card  mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50">
              <h3><a href="<?php echo site_url('user/view_petition') ?>">Shopping</a></h3>
            </div>
            <div class="mdl-card__supporting-text mdl-color-text--grey-600">
              Enim labore aliqua consequat ut quis ad occaecat aliquip incididunt. Sunt nulla eu enim irure enim nostrud aliqua consectetur ad consectetur sunt ullamco officia. Ex officia laborum et consequat duis.
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
                <strong>The Newist</strong>
                <span>2 days ago</span>
              </div>
              <div class="mdl-layout-spacer"></div>
              <nav class="comment__actions">
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon like">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>
            </nav>
            </div>
          </div>
















          <nav class="demo-nav mdl-cell mdl-cell--12-col">
            <div class="section-spacer"></div>
            <a href="entry.html" class="demo-nav__button" title="show more">
              More
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_forward</i>
              </button>
            </a>
          </nav>
        </div>
      </main>
      <?php include('public_footer.php');?>  

      <script type="text/javascript">
        $(document).on('click','.category',function(){
          var id = this.id;
          $(".category").each(function(){
            $(this).removeClass("mdl-button--raised");
          });

          $(this).addClass("mdl-button--raised");
          
          $.ajax({
              type: "POST",
              data: {category : id},
              url: '<?php echo base_url('index.php/user/category'); ?>',
              success: function(data) {
                $(".mdl-grid").html(data);
              }
            });
        });
      </script>

      <script type="text/javascript">
        $(document).on('click','.like',function(){
          var petitionID = this.id;
          var isSet = '<?php echo isset($_SESSION['user_id']) ?>';
          var stat;
          if (isSet) {
          $.ajax({
            type:"POST",
            data:{petitionID:petitionID},
            url:'<?php echo base_url('index.php/petitions/like_petition'); ?>',
            success:function(status)
            {
                stat = status;
            },
            error:function(xhr, status, error)
            {
              stat = status;
            }

          });
            $(this).removeClass("like").addClass("liked");
            $(this).css("color","inherit");
          }
          else{
            window.location = '<?php echo base_url('index.php/login/user_login'); ?>';
          }
        });

        $(document).on('click','.liked',function(){
        var petitionID = this.id;
          var isSet = '<?php echo isset($_SESSION['user_id']) ?>';
          var stat;
          if (isSet) {
          $.ajax({
            type:"POST",
            data:{petitionID:petitionID},
            url:'<?php echo base_url('index.php/petitions/unlike_petition'); ?>',
            success:function(status)
            {
                stat = status;
            },
            error:function(xhr, status, error)
            {
              stat = status;
            }

          });
                $(this).css("color","");
                $(this).removeClass("liked").addClass("like");
          }
          else{
            window.location = '<?php echo base_url('index.php/login/user_login'); ?>';
          }      
        });  
      </script> 