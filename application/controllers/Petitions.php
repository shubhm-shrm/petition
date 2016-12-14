<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
defined('BASEPATH') OR exit('No direct script access allowed');

class Petitions extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Petitionmodel');
		if(! $this->session->userdata('user_id')){
			$this->session->set_userdata('redirect_back', current_url() );
			return redirect('login/user_login');
		}
	}

	public function add_petition()
	{
		$this->load->view('public/add_petition');
	}

	public function store_petition()
	{
		$data['user_id'] = $this->session->userdata('user_id');
		$data['category'] = $this->input->post('category')[0];
        $data['heading'] = $this->input->post('heading');
        $data['description'] = $this->input->post('description');
        $data['link'] = $this->input->post('member');
        $data['reason'] = $this->input->post('reason');
        $image = 'image';

		$config['upload_path'] = './assests/images/'; //The path where the image will be save
	    $config['allowed_types'] = 'gif|jpg|png|jpeg'; //Images extensions accepted
	    $config['max_size']    = '204800'; 
	    $config['max_width']  = '1024000'; 
	    $config['max_height']  = '768000'; 
	    $config['overwrite'] = FALSE; //If exists an image with the same name it will overwrite. Set to  false if don't want to overwrite
	    $this->load->library('upload', $config); 
	    
	    if (!$this->upload->do_upload($image)){
	        $uploadError = array('upload_error' => $this->upload->display_errors()); 
	        $this->session->set_flashdata('uploadError', $uploadError);
	       	redirect('petitions/add_petition');
	    }
//	    print_r($this->upload->data($image));

		    $file_info = $this->upload->data(); 
		    $data['img_url'] = $file_info['full_path'];

		    $this->load->model('petitionmodel');
		   if( $this->petitionmodel->do_upload($data) )
				return redirect('user');
		   	else{
		   		$this->session->set_flashdata('uploadError', 'Unable to insert data in database.Try again later.!');
			       	redirect('petitions/add_petition');
		   	}

	}
	
	public function edit_petition($petition_id)
	{
	
	}

	public function delete_petition($article_id)
	{

	}

	public function sign_petition()
	{

	}

	public function like_petition()
	{
		$petitionID = $this->input->post('petitionID');
		$user_ID = $this->session->userdata('user_id');
		$this->load->model('petitionmodel');
		$status = $this->petitionmodel->do_like($petitionID,$user_ID);
		if($status==TRUE)	
			echo 'success';
		else
			echo 'failed';		
	}

	public function unlike_petition()
	{
		$petitionID = $this->input->post('petitionID');
		$user_ID = $this->session->userdata('user_id');
		$this->load->model('petitionmodel');
		$status = $this->petitionmodel->do_unlike($petitionID,$user_ID);
		if($status==TRUE)	
			echo 'success';
		else
			echo 'failed';		
	}

	public function comment_petition()
	{
		$data = $this->input->post('data');
		$petitionID = $this->input->post('petitionID');
		$user_ID = $this->session->userdata('user_id');
		$this->load->model('petitionmodel');
		$status = $this->petitionmodel->do_comment($data,$petitionID,$user_ID);
		if($status==TRUE){
			$user_name = $this->session->userdata('user_name');
			echo $user_name;
		}
		else
			echo 'UnKnown..';
	}
}
?>