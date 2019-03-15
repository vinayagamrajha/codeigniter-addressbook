<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404_class extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Index Page
     *
     * @return Response
     */
    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('includes/header');
        $this->load->view('error404');
    }
}
