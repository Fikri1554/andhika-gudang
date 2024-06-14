<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Master_Lantai extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('Master_lantai_model', 'master_lantai_model');
    // }

    public function getMasterLantai()
    {
        //$data['master_lantai'] = $this->master_lantai_model->getAllMasterLantai();
        $this->load->view('viewmaster_lantai');
    }

}
    
 