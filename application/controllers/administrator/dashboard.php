<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    // Memaksa untuk wajib LOGIN terlebih dahulu
    public function __construct()
    {
            parent::__construct();
            
            if (!isset($this->session->userdata['username'])) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Anda Belum Login.!</div>');
                    redirect('administrator/auth');
            }

    }


	public function index()
	{
        $data = $this->user_model->ambil_data($this->session->userdata['username']);
        $data = [
            'username' => $data->username,
            'level' => $data->level
        ];

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dashboard', $data);
        $this->load->view('templates_administrator/footer');
    }
    

}