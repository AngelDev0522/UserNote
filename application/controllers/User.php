<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('User_model');             
    }
    function index()
    {
        if (!$this->is_logged_in()) {
            $this->load->view('login');
        } else {
            redirect('dashboard');
        }
    }
    function updateProfile()
    {
        $uid = $this->input->post('UserID');
        $pwd = $this->input->post('Password');
        $data = $this->User_model->updateProfile($this->session->userdata('UID'),$uid,$pwd);
        echo "true";
    }
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
    function login(){
        $postdata = $this->input->post();
        // var_dump($postdata['pwd']);
        // exit(0);
        $result = $this->User_model->getLoginData($postdata['UserID'],$postdata['pwd']);
        // var_dump($result[0]);
        //     exit(0);
        if(count($result) != 0)
        {
            // var_dump($result[0]->permission);
            // exit(0);
            if($result[0]->permission == 1)
            {
                $data = array(
                    'UID' => $result[0]->id,
                    'UserID' => $postdata['UserID'],
                    'is_logged_in' => TRUE,
                    'is_admin' => TRUE
                );
                $this->session->set_userdata($data);
                redirect('admin');
            }
            else if($result[0]->permission == 2)
            {
                $data = array(
                    'UID' => $result[0]->id,
                    'UserID' => $postdata['UserID'],
                    'is_logged_in' => TRUE,
                    'is_admin' => FALSE
                );
                $this->session->set_userdata($data);                
                redirect('dashboard');
                
            }
            // $this->session->set_userdata($data);
        }
        else{
            redirect('user/error');
        }        
    }
    public function logout()
    {
        if (!$this->is_logged_in()) {
            redirect('/');
        } else {
            $this->session->set_userdata(array('is_logged_in' => FALSE));
            $this->session->sess_destroy();
            $this->load->view('login');
        }
    }
    public function error()
    {
        $this->load->view('login', array('error' => TRUE));
    }
}