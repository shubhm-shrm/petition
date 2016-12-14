<?php

class Loginmodel extends CI_Model
{


	public function do_login($email,$password)
	{
		$query = $this->db->get_where('login', array('email_id' => $email,'password' => md5($password)));
		return $query->result();
	}

	public function do_register($data)
	{

		$query = $this->db->get_where('login', $data);
        $count = $query->num_rows(); //counting result from query
        if ($count === 0) {
            $this->db->insert('login', $data);
            $query2 = $this->db->get_where('login', array('email_id' => $data['email_id'],'password' => $data['password']));
		return $query2->result();
        }
		
	}

	function isEmailExist($email) {
 	   $this->db->select('user_id');
 	   $this->db->where('email_id', $email);
 	   $query = $this->db->get('login');

 	   if ($query->num_rows() > 0) {
 	       return true;
 	   } else {
    	    return false;
    	}
	}
}
?>