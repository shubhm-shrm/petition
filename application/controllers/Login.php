<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function user_login()
	{
		$this->load->view('public/login');
	}

	public function do_login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		if($this->form_validation->run('user_login'))
		{
			$email=$this->input->post('email');
			$password=$this->input->post('password');

			$this->load->model('loginmodel');
			$user=$this->loginmodel->do_login($email,$password);
		//	print_r($user);
			if( $user[0]->user_id )
			{
			//	$this->load->library('session');
				$this->session->set_userdata('user_id',$user[0]->user_id);
				$this->session->set_userdata('user_name',$user[0]->first_name.' '.$user[0]->last_name);
				if( $this->session->userdata('redirect_back') ) {
 				   $redirect_url = $this->session->userdata('redirect_back');
				    $this->session->unset_userdata('redirect_back');
    				redirect( $redirect_url );
				}
				else{
					return redirect('user');
				}
			}
			else{
				$this->session->set_flashdata('login_failed','Invalid Email Or Password');
				 return redirect('login/user_login');	
			}
		}
		else
		{
			$this->load->view('public/login');
		}
	}

	public function do_logout()
	{
		$this->session->unset_userdata('user_id');
		return redirect('user');
	}

	public function user_register()
	{
		$this->load->view('public/register');
	}

	public function do_register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

		if($this->form_validation->run('user_register'))
		{
			$data = array(
				'first_name' => $this->input->post('first'), 
				'last_name' => $this->input->post('last'),
				'email_id' => $this->input->post('email'),
				'password' => md5($this->input->post('password')) );

			$this->load->model('loginmodel');
			$user=$this->loginmodel->do_register($data);
			if( $user[0]->user_id )
			{
			//	$this->load->library('session');
				$this->session->set_userdata('user_id',$user[0]->user_id);
				$this->session->set_userdata('user_name',$user[0]->first_name.' '.$user[0]->last_name);
				return $this->load->view('public/index');
				
			}
			else{
				$this->session->set_flashdata('register_failed','User with Email ID already Exists.!');
				 return redirect('login/user_register');	
			}
		}
		else
		{
			$this->load->view('public/register');
		}
	}

	public function isEmailExist($email) {
 	   $this->load->library('form_validation');
 	   $this->load->model('loginmodel');
 	   $is_exist = $this->loginmodel->isEmailExist($email);

    	if ($is_exist) {
    	    $this->form_validation->set_message(
    	        'isEmailExist', 'User with Email ID already Exists.!'
    	    );    
    	    return false;
   		 } else {
        	return true;
    	}
	}

}
?>