<?php

class admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');             
    }
    function index()
    {
        if (!$this->is_logged_in()) {
            $this->load->view('login');
        } else {            
            $this->load->view('admin/admin');
        }
    }
    function users()
    {
        if (!$this->is_logged_in()) {
            $this->load->view('login');
        } else {
            $users = $this->User_model->getUserData();
            $companies = $this->User_model->getCompaniesData();
            $this->load->view('admin/users', array('users' => $users,'companies' => $companies));
        }
    }
    function companies()
    {
        if (!$this->is_logged_in()) {
            $this->load->view('login');
        } else {
            $companies = $this->User_model->getCompaniesData();
            $this->load->view('admin/companies', array('companies' => $companies));
        }
    }
    function updateProfile()
    {
        $uid = $this->input->post('UserID');
        $pwd = $this->input->post('Password');
        $data = $this->User_model->updateProfile($this->session->userdata('UID'),$uid,$pwd);
        echo "true";
    }
    function updateCName()
    {
        $id = $this->input->post('id');
        $cname = $this->input->post('cname');
        $data = $this->User_model->updateCName($id,$cname);
        echo "true";
    }
    function removeCName()
    {
        $id = $this->input->post('id');
        $data = $this->User_model->removeCName($id);
        echo "true";
    }
    function addCName()
    {
        $cname = $this->input->post('cname');
        $data = $this->User_model->addCName($cname);
        echo "true";
    }
    function addUser()
    {
        $uid = $this->input->post('uid');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $companyName = $this->input->post('companyName');        
        $data = $this->User_model->addUser($uid,$password,$email,$companyName);
        echo "true";
    }
    function updateUser()
    {
        $id = $this->input->post('id');
        $uid = $this->input->post('uid');        
        $email = $this->input->post('email');
        $companyName = $this->input->post('companyName'); 
        $data = $this->User_model->updateUser($id,$uid,$email,$companyName);
        echo "true";
    }
    function removeUser()
    {
        $id = $this->input->post('id');
        $data = $this->User_model->removeUser($id);
        echo "true";
    }
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
    
    public function error()
    {
        $this->load->view('login', array('error' => TRUE));
    }
}