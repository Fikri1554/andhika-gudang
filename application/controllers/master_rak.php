<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_Rak extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getMasterRak()
    {
        $this->load->view('masterRak');
    }
}