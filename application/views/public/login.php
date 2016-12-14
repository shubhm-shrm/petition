<?php include('public_header.php'); ?>
    <style>
body{
    background: #fff;
}
.main_content h3{
	text-align: center;
}
.login-form-div{
	width: 500px;
	background: #fff;
}
.form-column{
  padding: 20px 35px !important;  
}
.cell_con{
	background: #fff;
	padding-left: 20px;
}
.cell_con div{
	width: 87%;
}
.links{
	margin: auto;
	text-align: center;
}
.btn{
  margin:auto; 
  width:100%;
}
    </style>
  </header>
		<main class="mdl-layout__content main_content" style="margin-top:5em;">
		  <?= form_open('login/do_login',['class'=>'form-horizontal'])?>
			<div class="login-form-div mdl-grid mdl-shadow--2dp mdl-color--white-100">	
				<div class="mdl-cell mdl-cell--12-col cell_con">
					<i class="material-icons">person</i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="sample2" name="email">
						<label class="mdl-textfield__label" for="sample2">Enter valid Email</label>
						<span class="mdl-textfield__error">Invalid Email...!</span>
			        </div>
			        <div class="col-lg-6">
							<?= form_error('email')?>
					</div>
				</div>				
				<div class="mdl-cell mdl-cell--12-col cell_con">
					<i class="material-icons">lock</i>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="password" id="sample2" name="password">
						<label class="mdl-textfield__label" for="sample2">Enter Password</label>
			        </div>
			        <div class="col-lg-6">
    						<?= form_error('password')?>
    				</div>
				</div>				
				<!-- <div class="mdl-cell cell_con">
					<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
						<input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
						<span class="mdl-checkbox__label">Remember Me</span>
				    </label>
				</div> -->
				<?php if($error=$this->session->flashdata('login_failed')):?>
				<div class="mdl-cell mdl-cell--5-col cell_con">
					<span class="mdl-chip">
					    <span class="mdl-chip__text"><?= $error ?></span>
					</span>
				</div>
				<?php endif; ?>
				<div class="mdl-cell mdl-cell--12-col  login-btn-con">
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary btn">Login</button>
				</div>
				<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet links">
					<a href="<?php echo site_url('login/user_register'); ?>" class="mdl-button--primary">Register now !</a>
				</div>
				<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet links">
					<a class="mdl-button--primary">Forgot password ?</a>
				</div>
			</div>
		  </form>					
	    </main>
<?php include('public_footer.php');?>	        