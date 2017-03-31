<?php

class adminController
{
    private $request, $response, $args, $view, $data;

    function __construct($data)
    {
        //initializing value
        $this->data = $data;
        $this->request = $data->request;
        $this->response = $data->response;
        $this->view = $data->view;
        $this->args = $this->args;
    }

    function run($action = "")
    {
        $db = getDB();

        switch ($action){
            case "login":
                $this->login();
                break;
            default:
                $this->response = $this->view->render($this->response, 'admin/index.twig');
                break;
        }

        return $this->response;
    }

    private function login(){
        $this->response = $this->view->render($this->response, 'admin/login.twig');
        return $this->response;
    }
}