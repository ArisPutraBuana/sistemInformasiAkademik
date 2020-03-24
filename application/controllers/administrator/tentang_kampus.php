<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_kampus extends CI_Controller {

	public function index()
	{
        // Memanggil data di dalam database melalui Model
        $data['tentang'] = $this->tentang_model->tampil_data('tentang_kampus')->result();
   
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tentang_kampus', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function update($id) 
    {
        $where = ['id_tentang_kampus' => $id];

        $data['tentang'] = $this->tentang_model->edit_data($where, 'tentang_kampus')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tentang_kampus_update', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function update_aksi()
    {
        $id       = $this->input->post('id_tentang_kampus');
        $sejarah  = $this->input->post('sejarah');
        $visi     = $this->input->post('visi');
        $misi     = $this->input->post('misi');

        $data = [
            'sejarah'  => $sejarah,
            'visi'     => $visi,
            'misi'     => $misi
        ];

        $where = ['id_tentang_kampus' => $id];

        $this->tentang_model->update_data($where, $data, 'tentang_kampus');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Tetang Kampus berhasil di update</div>');
        redirect('administrator/tentang_kampus');
    }





    
}