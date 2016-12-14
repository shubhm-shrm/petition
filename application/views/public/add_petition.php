<?php
include('public_header.php');
?>
</header>
</div>
<style>
.demo-card-wide.mdl-card {
  width: 90%;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('../../assests/images/road.jpg') center / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
.mdl-textfield{
margin-left:1em ;	
width:75%;
}
.tooltip{
	margin-left:80%;     

}
.mdl-button--file > input{ 
    cursor: pointer;
    height: 100%;
    right: 0;
    opacity: 0;
    position: absolute;
    top: 0;
    width: 300px;
    z-index: 4;
}
</style>
<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded" style="">
<main class="" style="margin:3em 3em 1em 5em;">
<?= form_open_multipart('petitions/store_petition')?>
<div class="demo-card-wide mdl-card mdl-shadow--8dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">1. Category (Select any one of following categories)</h2>
  </div>
  <div class="mdl-card__supporting-text">
 	<label  class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded" for="Animal Welfare">
	  <input id="Animal Welfare" class="mdl-icon-toggle__input" type="checkbox" name="category[]" value="animal-welfare">
  	  <i class="mdl-icon-toggle__label material-icons">done</i>	
  	  <span class="mdl-checkbox__label">|  Animal Welfare  |</span>
  	</label>
  	  
 	<label class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded" for="Human Rights">
	  <input id="Human Rights" class="mdl-icon-toggle__input" type="checkbox" name="category[]" value="human-rights">
  	  <i class="mdl-icon-toggle__label material-icons">done</i>
  	  <span class="mdl-checkbox__label">|  Human Rights  |</span>
 	</label>

 	<label class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded" for="Environment">
	  <input id="Environment" class="mdl-icon-toggle__input" type="checkbox" name="category[]" value="environment">
  	  <i class="mdl-icon-toggle__label material-icons">done</i>
  	  <span class="mdl-checkbox__label">| Environment  |</span>
 	</label>

 	<label class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded" for="Health">
	  <input id="Health" class="mdl-icon-toggle__input" type="checkbox" name="category[]" value="health">
  	  <i class="mdl-icon-toggle__label material-icons">done</i>
  	  <span class="mdl-checkbox__label">| Health  |</span>
 	</label>


 	<label class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events is-upgraded" for="Politics">
	  <input id="Politics" class="mdl-icon-toggle__input" type="checkbox" name="category[]" value="politics">
  	  <i class="mdl-icon-toggle__label material-icons">done</i>
  	  <span class="mdl-checkbox__label">| Politics  |</span>
 	</label>

 	<label  class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect" for="Education">
	  <input id="Education" class="mdl-icon-toggle__input" type="checkbox" name="category[]" value="education">
  	  <i class="mdl-icon-toggle__label material-icons">done</i>
  	  <span class="mdl-checkbox__label">| Education  |</span>
 	</label> 	
 	
 	<label class="mdl-icon-toggle mdl-js-icon-toggle mdl-js-ripple-effect" for="Local Issues">
	  <input id="Local Issues" class="mdl-icon-toggle__input" type="checkbox" name="category[]" value="local-issues">
  	  <i class="mdl-icon-toggle__label material-icons">done</i>
  	  <span class="mdl-checkbox__label">|  Local Issues </span>
 	</label>

  </div>
</div>

<div class="demo-card-wide mdl-card mdl-shadow--8dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">2. Heading</h2>
  </div>
  <div class="mdl-card__supporting-text">
    <p>
    Keep your title under ten words, but be descriptive and strong with your language. Here are some great petition examples - notice the strong call-to-action for each!

    Put a Stop to Senator Burns' Racist Comments!
    Stop Pottersville from Filling Potholes with Toxic Tar!
    Urge Congresswoman DeVille to Stand Against Pet Euthanization!
  	</p>
  </div>
  <div>
  
  <div id="mytooltip1" class="tooltip">
    <a class=" mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Need Some Advice..?
    </a>
  </div>
  <div class="mdl-tooltip mdl-tooltip--large" for="mytooltip1">
  More advice is given this way...
  </div>
  
   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="heading">
    <label class="mdl-textfield__label" for="sample3">Start Typing...</label>
  </div>
  </div>
</div>

<div class="demo-card-wide mdl-card mdl-shadow--8dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">3. Description</h2>
  </div>
  <div class="mdl-card__supporting-text">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Mauris sagittis pellentesque lacus eleifend lacinia...
  </div>

  <div>
  
  <div id="mytooltip3" class="tooltip">
    <a class=" mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Need Some Advice..?
    </a>
  </div>
  <div class="mdl-tooltip mdl-tooltip--large" for="mytooltip3">
  More advice is given this way...
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    
    <textarea class="mdl-textfield__input" type="textarea" id="sample3" name="description"></textarea>
    <label class="mdl-textfield__label" for="sample3">Start Typing...</label>
  </div>
  </div>
</div>
<div class="demo-card-wide mdl-card mdl-shadow--8dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">4. Whom do you want to petition?</h2>
  </div>
  <div class="mdl-card__supporting-text">
    <p>
    	Whom are you petitioning? A President? A Mayor? The head of a corporation?
  	</p>
  </div>
  <div>
  
  <div id="mytooltip2" class="tooltip">
    <a class=" mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Need Some Advice..?
    </a>
  </div>
  <div class="mdl-tooltip mdl-tooltip--large" for="mytooltip2">
  More advice is given this way...
  </div>
    
   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input class="mdl-textfield__input" type="text" id="sample3" name="member">
    <label class="mdl-textfield__label" for="sample3">Start Typing...</label>
  </div>
	</div>
</div> 

<div class="demo-card-wide mdl-card mdl-shadow--8dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">5. Why should people sign?</h2>
  </div>
  <div class="mdl-card__supporting-text">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Mauris sagittis pellentesque lacus eleifend lacinia...
  </div>

  <div>
  
  <div id="mytooltip3" class="tooltip">
    <a class=" mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Need Some Advice..?
    </a>
  </div>
  <div class="mdl-tooltip mdl-tooltip--large" for="mytooltip3">
  More advice is given this way...
  </div>
  
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    
    <input class="mdl-textfield__input" type="text" id="sample3" name="reason">
    <label class="mdl-textfield__label" for="sample3">Start Typing...</label>
  </div>
	</div>
</div>

<div class="demo-card-wide mdl-card mdl-shadow--8dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">6. Add Image</h2>
  </div>
  <div class="mdl-card__supporting-text">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
    Mauris sagittis pellentesque lacus eleifend lacinia...
  </div>

  <div>
  
  <div id="mytooltip4" class="tooltip">
    <a class=" mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Need Some Advice..?
    </a>
  </div>
  <div class="mdl-tooltip mdl-tooltip--large" for="mytooltip4">
  More advice is given this way...
  </div>
   
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--file" style="width:25%;display: inline-flex;
    vertical-align: middle;">
      <input class="mdl-textfield__input" type="text" id="uploadFile"/ >
    </div>	
    <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file" style="display: inline-flex;
    vertical-align: middle;">
      <i class="material-icons" >attach_file</i>
      <input type="file" id="uploadBtn" name="image" required>
  	</div>      
   </div>
   <?php if($error=$this->session->flashdata('uploadError')):?>
        <div class="mdl-cell mdl-cell--5-col cell_con">
          <span class="mdl-chip">
              <span class="mdl-chip__text"><?= $error['upload_error'] ?></span>
          </span>
        </div>
    <?php endif; ?>
  	<nav class="mdl-navigation">
    	<div class="mdl-card__actions" style="margin-left:1em;">
	     	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" >
		   Submit
		    </button>
		  </div>
		* if you aren't logged in, you will be redirected to log in
    </nav>
</div>
</form>
</main>
<?php
include('public_footer.php');
?>
