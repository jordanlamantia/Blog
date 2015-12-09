<?php

class CoreController extends Core
{
    protected $load;
    protected $model;

    public function __construct()
    {
        $this->load = new CoreView();

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = DEFAULT_ACTION;
        }

        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            define("TITLE_FOR_LAYOUT", "erreur");
            $this->load->view('vue_error.php');
        }
    }
}