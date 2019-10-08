<?php
class User_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
	  	$this->load->database();
	}
    function getLoginData($userid,$password)
    {
        $this->db->where("user_id='$userid'");       
        $this->db->where("password='".md5($password)."'");
        $result = $this->db->get('users')->result();
        return $result;
    }
    function getUserData()
    {
        $this->db->where("permission='2'");
        $result = $this->db->get('users')->result();
        return $result;
    }
    function getCompaniesData()
    {
        $result = $this->db->get('companies')->result();
        return $result;
    }
    function updateProfile($id,$uid,$pwd)
    {
        $this->db->where("id='$id'");    
        $datas = array('user_id' => $uid, 'password' => md5($pwd));
        $result = $this->db->update("users", $datas);
        return;
    }
    function updateCName($id,$cname)
    {
        $this->db->where("id='$id'");    
        $datas = array('companyName' => $cname);
        $result = $this->db->update("companies", $datas);
        return;
    }
    function removeCName($id)
    {
        $this->db->where("id='$id'");
        $result = $this->db->delete("companies");
        return;
    }
    function addCName($cname)
    {
        $data = array(
            'companyName'=>$cname
        );
        $this->db->insert('companies',$data);
        return;
    }
    function addUser($uid,$password,$email,$companyName)
    {
        $data = array(
            'user_id'=>$uid,
            'password'=>md5($password),
            'email'=>$email,
            'CName'=>$companyName,
            'permission'=>2
        );        
        $this->db->insert('users',$data);
        return;
    }
    function updateUser($id,$uid,$email,$companyName)
    {
        $this->db->where("id='$id'");    
        $data = array(
            'user_id'=>$uid,
            'email'=>$email,
            'CName'=>$companyName
        ); 
        $result = $this->db->update("users", $data);
        return;
    }
    function removeUser($id)
    {
        $this->db->where("id='$id'");
        $result = $this->db->delete("users");
        return;
    }
}