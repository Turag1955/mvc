<?php

class Login extends dController {

    public function __construct() {
        parent::__construct();
        //Session::checkSession();
    }

    public function Index() {
        $this->login();
    }

    public function login() {
        Session::init();
        if (Session::get('adminlogin') == true) {
              header("Location:" . BASE_URL . "admin");
        }
        $this->load->view('login');
    }

    public function userlogin() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $loginmodel = $this->load->getmodal('LoginModel');
        $data['checkuser'] = $loginmodel->checkLogin('users', $username, $password);
        if ($data['checkuser']) {
            $dbpassword = $data['checkuser'][0]['password'];
            if (password_verify($password, $dbpassword)) {
                Session::init();
                Session::set('adminlogin', true);
                Session::set('adminid', $data['checkuser'][0]['id']);
                Session::set('adminname', $data['checkuser'][0]['name']);
                header("Location:" . BASE_URL . "admin/dashboard");
            } else {
                $data['userincorrect'] = ['password incorrect...!'];
                $this->load->view('login', $data);
            }
        } else {
            $data['userincorrect'] = ['username incorrect...!'];
            $this->load->view('login', $data);
        }
    }

    public function logout() {
        Session::init();
        Session::Sessiondestroy();
        header("Location:" . BASE_URL . "Login");
    }

}

?>