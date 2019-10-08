<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->model('User_model');
        if (!$this->is_logged_in()) {
            redirect('user');
        }
    }
    function index()
    {
        $this->load->view('dashboard');
    }
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
    
    public function error()
    {
        $this->load->view('login', array('error' => TRUE));
    }

    public function createnote()
    {
        redirect('Notes/createnote');
    }
    public function librarynote()
    {
        redirect('Notes/librarynote');
    }
    public function profile()
    {
        redirect('Notes/profile');
    }
}