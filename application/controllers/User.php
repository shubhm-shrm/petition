<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	
	public function index()
	{
		$this->load->model('petitionmodel');
		$data = $this->petitionmodel->all_category();
		$this->load->view('public/index',['data'=>$data]);
	}

	public function view_petition()
	{
		$petition_id = $this->uri->segment(3);
		$this->load->model('petitionmodel');
		$data = $this->petitionmodel->get_petition($petition_id);
		$this->load->view('public/entry',['data'=>$data]);
	}

	public function category()
	{
		//$data['category'] = $this->input->post('category');
		$category = $this->input->post('category');
		$this->load->model('petitionmodel');
		$data = $this->petitionmodel->sort_category($category);
		return $this->load->view('public/category',['data'=>$data]);
        //$this->load->view('public/category',$data); 
	}
	
	
}
?>
