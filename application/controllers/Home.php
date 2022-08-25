<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function index()
    {
        redirect('auth');
    }

    public function error_404()
    {
        $this->output->set_status_header('404');
        $this->load->view('error_404');
    }
}
