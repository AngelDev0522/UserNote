<?php

class Notes extends CI_Controller {

    function __construct() {
        parent::__construct(); 
        $this->load->library('upload');
        $this->load->model('Notes_model');   
        if (!$this->is_logged_in()) {
            redirect('user');
        }        
    }
    private function is_logged_in()
    {
        return $this->session->userdata('is_logged_in');
    }
    public function savenote(Request $request = null)
    {
        $filename = "default.png";
        if(count($_FILES) != 0)
        {
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
            $filename = $_FILES['file']['name'];
        }
        $title = $_POST["title"];
        $notis = $_POST["notis"];        
        $result = $this->Notes_model->saveNote($title,$notis,$filename);
        echo "true";
    }
    public function savenotek(Request $request = null)
    {
        $filename = "default.png";
        if(count($_FILES) != 0)
        {
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
            $filename = $_FILES['file']['name'];
        }
        $kks = $_POST["kks"];
        $title = $_POST["title"];
        $notis = $_POST["notis"];        
        $result = $this->Notes_model->saveNotek($kks,$title,$notis,$filename);
        echo "true";
    }
    public function createnote()
    {
        $this->load->view('createnote');
    }
    public function librarynote()
    {
        $noneArchieved = $this->Notes_model->getNoneArchieved();
        $archieved = $this->Notes_model->getArchieved();
        $this->load->view('librarynote',array(
            'noneArchieved' => $noneArchieved,
            'archieved' => $archieved,
        ));
    }
    public function profile()
    {
        $this->load->view('profile');
    }
    public function getItem()
    {
        $id = $this->input->post('id');
        $data = $this->Notes_model->getItem($id);
        echo json_encode($data);
    }
    public function removeItem()
    {
        $id = $this->input->post('id');
        $data = $this->Notes_model->removeItem($id);
        echo "true";
    }
    public function updateItem()
    {
        $id = $this->input->post('id');
        $kks = $this->input->post('kks');
        $title = $this->input->post('title');
        $notis = $this->input->post('notis');
        $archieved = $this->input->post('archieved');
        $error = $this->input->post('error');
        $publics = $this->input->post('publics');
        $referenceN = $this->input->post('referenceN');
        $publicLink = $this->input->post('publicLink');
        $email = $this->input->post('email');

        $datas = array('archived' => $archieved, 'title' => $title, 'notis' => $notis,
                        'kks' => $kks, 'error' => $error, 'public' => $publics,
                        'referenceN' => $referenceN, 'purl' => $publicLink, 'email' => $email);
        $wheres = array('id'=>$id);
        $data = $this->Notes_model->updateItem($wheres,$datas);
        echo "true";
    }
}