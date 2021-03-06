<?php

class User extends Controller{

    function __construct()
    {
        parent::__construct();
        Authenticate::adminAuth();
    }

    function index(){
    	$this->view->userList = $this->model->listUsers();
        
   	    $this->view->render('dashboard/admin/user');
    }

    function create(){
    	$data = array();
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['gender'] = $_POST['gender'];
        $data['email'] = $_POST['email'];
        $data['contact_no'] = $_POST['contact_no'];
        $data['username'] = $_POST['email'];
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data['user_status'] = 'new';
        $data['user_type'] = $_POST['user_type'];

        if(!$this->model->checkExists($data['username'])){
            $this->model->create($data);
            header('location: '.URL.'user');
        } else{
        header('location: '.URL.'user?error=usernameExists#message');
        }
        
    }

    function edit($id,$type){
        $this->view->user = $this->model->getUser($id,$type);
        $this->view->render('dashboard/admin/edit_user');
    }

    function editSave(){
    	$data = array();
        $data['first_name'] = $_POST['first_name'];
        $data['last_name'] = $_POST['last_name'];
        $data['gender'] = $_POST['gender'];
        $data['email'] = $_POST['email'];
        $data['contact_no'] = $_POST['contact_no'];
        $data['username'] = $_POST['email'];
        $data['user_status'] = $_POST['user_status'];
        $data['user_type'] = $_POST['user_type'];
        $data['user_id'] = $_POST['user_id'];
        $data['prev_user_type'] = $_POST['prev_user_type'];
        $data['login_id'] = $_POST['login_id'];
        
        if(!$this->model->checkExistsWhere($data['username'],$data['login_id'])){
            $this->model->update($data);
            header('location: '.URL.'user');
        } else{
        header('location: '.URL.'user?error=usernameExists#message');
        }
        
    }

    function delete($id){
        $this->model->delete($id);
        header('location: '.URL.'user');
    }
}
