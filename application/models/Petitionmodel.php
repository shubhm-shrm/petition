<?php

class Petitionmodel extends CI_Model
{
	public function do_upload($data)
	{
		$this->db->insert('petition', $data);
		//$sql = $this->db->set($data)->get_compiled_insert('mytable');
		//echo $sql;
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	public function do_comment($data,$petitionID,$user_ID)
	{
		$values = array('comment' =>$data , 'petition_id' =>$petitionID , 'user_id' =>$user_ID);
		$this->db->insert('comment', $values);
		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;		
	}

	public function do_like($petitionID,$user_ID)
	{
		$values = array('petition_id' =>$petitionID , 'user_id' =>$user_ID);
		$this->db->insert('likes', $values);
		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}

	public function do_unlike($petitionID,$user_ID)
	{
		$values = array('petition_id' =>$petitionID , 'user_id' =>$user_ID);
		$this->db->delete('likes', $values);
		return ($this->db->affected_rows() != 1) ? FALSE : TRUE;
	}

	public function sort_category($category)
	{
		$result = "SELECT p.petition_id,p.user_id,p.category,p.heading,p.description,p.img_url,p.date_time,l.first_name,l.last_name,GROUP_CONCAT(lk.user_id SEPARATOR '|') as liked_by FROM `petition` as p INNER JOIN `login` as l ON p.user_id = l.user_id LEFT JOIN  `likes` as lk ON p.petition_id = lk.petition_id WHERE p.category = ".$this->db->escape($category)."";
        $res = $this->db->query($result);
        return $res->result(); 
	}

	public function all_category()
	{
		$result = $this->db->query("SELECT p.petition_id,p.user_id,p.category,p.heading,p.description,p.img_url,p.date_time,l.first_name,l.last_name,GROUP_CONCAT(lk.user_id SEPARATOR '|') as liked_by FROM petition as p INNER JOIN login as l ON p.user_id = l.user_id LEFT JOIN  likes as lk ON p.petition_id = lk.petition_id");
        return $result->result();  
	}

	public function get_petition($petition_id)
	{
		$result = $this->db->query("SELECT m.petition_id,m.firstname,m.comments,m.tym,a.first_name as pfirstname,a.last_name as plastname,b.date_time as pdatetime,b.heading,b.description,b.img_url from petition as b inner join login as a on a.user_id=b.user_id left join (select c.petition_id as petition_id,GROUP_CONCAT(l.first_name order by c.date_time asc SEPARATOR '|') as firstname,GROUP_CONCAT(c.comment order by c.date_time asc SEPARATOR '|') as comments, GROUP_CONCAT(c.date_time order by c.date_time asc SEPARATOR '|') as tym FROM comment as c LEFT JOIN login as l ON c.user_id=l.user_id WHERE c.petition_id = $petition_id) as m on m.petition_id=b.petition_id WHERE b.petition_id=$petition_id");

		return $result->result();
	}
}
?>