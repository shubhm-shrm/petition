<?php

$config=[
		
		'user_register'=>	[
										[
											'field'=>'first',
											'label'=>'First Name',
											'rules'=>'required|trim',
										],

										[
											'field'=>'last',
											'label'=>'Last Name',
											'rules'=>'required|trim',
										],

										[
											'field'=>'email',
											'label'=>'Email',
											'rules'=>'trim|required|valid_email|callback_isEmailExist',
										],

										[

											'field'=>'password',
											'label'=>'PASSWORD',
											'rules'=>'required|max_length[10]',

										]
								],
		'user_login'=>	[
										[
											'field'=>'email',
											'label'=>'Email',
											'rules'=>'required|trim',
										],

										[

											'field'=>'password',
											'label'=>'PASSWORD',
											'rules'=>'required|max_length[10]',

										]
								]
									
							

		];

?>