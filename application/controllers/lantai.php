<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lantai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Lantai_model');
    }

    public function getAllLantai() {
        $data = $this->Lantai_model->getLantaiDetail();
        echo json_encode($data);
        $this->load->view('lantai');
    }

    // Create new data
    public function addLantaiDetail() {
        $data = array(
            'lantai' => $this->input->post('lantai'),
            'divisi' => $this->input->post('divisi'),
            'rak' => $this->input->post('rak'),
            'tingkat' => $this->input->post('tingkat'),
            'judul' => $this->input->post('judul'),
            'remark' => $this->input->post('remark'),
            'company' => $this->input->post('company'),
            'tahun' => $this->input->post('tahun'),
            'no_penyimpanan' => $this->input->post('no_penyimpanan'),
            // Add more fields as needed
        );

        // Insert data using model
        $result = $this->Lantai_model->insertLantaiDetail($data);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Data inserted successfully.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to insert data.'));
        }
    }

    // Update existing data
    public function updateLantaiDetail() {
        $id = $this->input->post('id'); // Get ID from POST data

        $data = array(
            'nama_rak' => $this->input->post('namaRak'),
            'tingkat_dus' => $this->input->post('tingkatDus'),
            'judul' => $this->input->post('judul'),
            'remark' => $this->input->post('remark'),
            'company' => $this->input->post('company'),
            'no_penyimpanan' => $this->input->post('noPenyimpanan')
            // Add more fields as needed
        );

        // Update data using model
        $result = $this->Lantai_model->updateLantaiDetail($id, $data);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Data updated successfully.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to update data.'));
        }
    }

    // Delete data
    public function deleteLantaiDetail($id) {
        // Delete data using model
        $result = $this->Lantai_model->deleteLantaiDetail($id);

        if ($result) {
            echo json_encode(array('status' => 'success', 'message' => 'Data deleted successfully.'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Failed to delete data.'));
        }
    }

}
?>
