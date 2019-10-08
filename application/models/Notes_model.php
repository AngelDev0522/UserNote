<?php

class Notes_model extends CI_Model {       
	function __construct(){            
	  	parent::__construct();
        $this->load->database();          
	}
    function saveNote($title,$notis,$file)
    {

        $data = array(
            'user_id'=>$this->session->userdata('UID'),
            'kks'=>"",
            'title'=>$title,
            'notis'=>$notis,
            'public'=>0,
            'error'=>0,
            'archived'=>0,
            'new'=>1,
            'referenceN'=>"",
            'email'=>"",
            'purl'=>"",
            'imgurl'=>$file,
            'created_at'=>date('Y-m-d H:i:s')
        );
        $this->db->insert('notes',$data);
        return;
    }
    function saveNotek($kks,$title,$notis,$file)
    {        
        $data = array(
            'user_id'=>$this->session->userdata('UID'),
            'kks'=>$kks,
            'title'=>$title,
            'notis'=>$notis,
            'public'=>0,
            'error'=>0,
            'archived'=>0,
            'new'=>1,
            'referenceN'=>"",
            'email'=>"",
            'purl'=>"",
            'imgurl'=>$file,
            'created_at'=>date('Y-m-d H:i:s')
        );        
        $this->db->insert('notes',$data);
        return;
    }
    function getNoneArchieved()
    {
        $uid = $this->session->userdata('UID');
        $this->db->where("archived ='0'");
        $this->db->where("user_id ='$uid'");        
        $result = $this->db->get('notes')->result();
        return $result;
    }
    function getArchieved()
    { 
        $uid = $this->session->userdata('UID');
        $this->db->where("archived ='1'");
        $this->db->where("user_id ='$uid'");     
        $result = $this->db->get('notes')->result();
        return $result;
    }
    function getItem($id)
    {
        $this->db->where("id='".$id."'");
        $result = $this->db->get('notes')->result();
        return $result[0];
    }
    function updateItem($wheres,$datas)
    {
        $result = $this->db->update("notes", $datas,$wheres);
        return;
    }
    function removeItem($id)
    {
        $this->db->delete('notes', array('id' => $id)); 
        return;
    }
}