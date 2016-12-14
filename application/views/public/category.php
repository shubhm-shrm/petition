
        <?php foreach ($data as $value) {
        ?>
        <div class="mdl-card  mdl-cell mdl-cell--12-col">
            <div class="mdl-card__media mdl-color-text--grey-50" style="background-image: url('<?= $value->img_url ?>');">
              <h3><a href="<?php echo site_url('user/view_petition/'.$value->petition_id."/".$value->heading) ?>"><?= $value->heading ?></h3></a>
            </div>
            <div class="mdl-color-text--grey-600 mdl-card__supporting-text">
              <?= word_limiter($value->description, 20) ?>
            </div>
            <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
              <div class="minilogo"></div>
              <div>
                <strong><?= $value->first_name.' '.$value->last_name ?></strong>
                <span>
                <?php
                  $DateTime = $value->date_time;  
                  $interval = date_create($DateTime)->diff(new DateTime());
                    echo $interval->format('%R%a days');
                ?></span>
              </div>
              <div class="mdl-layout-spacer"></div>
              <nav class="comment__actions">

              <?php 
              $liked_by = explode("|", $value->liked_by);

              if (in_array($this->session->userdata('user_id'), $liked_by)) {
              ?>   
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon liked" id="<?= $value->petition_id ?>">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>
              <?php
              } 
              else {
              ?>  
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon like">
                <i class="material-icons" role="presentation">thumb_up</i><span class="visuallyhidden">like comment</span>
              </button>              
              <?php } ?> 
            </nav>
            </div>
          </div>

          <?php } ?>
          <nav class="demo-nav mdl-cell mdl-cell--12-col">
            <div class="section-spacer"></div>
            <a href="" class="demo-nav__button" title="show more">
              More
              <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                <i class="material-icons" role="presentation">arrow_forward</i>
              </button>
            </a>
          </nav>
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