<?php

class UsersController extends AppController
{
    private $_login;
    private $_password;

    /**
     * UsersController constructor.
     */

    public function __construct()
    {
        require 'application/model/UsersModel.php';
        $this->model = new UsersModel();

        parent::__construct();

    }

    /**
     * Function connect
     * @param $login
     * @param $password
     */

    public function connect()
    {
        $this->_login = $_POST['login'];
        $this->_password = sha1($_POST['password']);

        switch ($this->model->connect($this->_login, $this->_password)) {
            case '1':
                header('location: ?module=posts&action=home&co=OK');
                break;

            case '0':
                header('location: ?module=posts&action=home&co=NOK');
                break;
        }
    }

    /**
     *Function disconnect
     */

    public function disconnect()
    {
        session_destroy();
        unset($_SESSION);
        header('location: ?module=posts&action=home&deco=OK');
        exit;
    }

    public function inscription()
    {
        define("TITLE_FOR_LAYOUT", "Inscription");
        $this->load->view('vue_inscription.php');
    }

}
