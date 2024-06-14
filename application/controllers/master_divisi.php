<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_Divisi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getMasterDivisi()
    {
        $this->load->view('master_divisi');
    }
}