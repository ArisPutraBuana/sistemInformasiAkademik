<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	public function index()
	{
        // Memanggil data di dalam database melalui Model
        $data['informasi'] = $this->informasi_model->tampil_data('informasi')->result();
   
		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/informasi', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_informasi()
    {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/informasi_form');
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_informasi_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function tambah informasi
            $this->tambah_informasi();
        } 
        else 
        {
            // Jika benar, data masuk ke database
                $icon             = $this->input->post('icon');
                $judul_informasi  = $this->input->post('judul_informasi');
                $isi_informasi    = $this->input->post('isi_informasi');

            $data = [
                'icon'              => $icon,
                'judul_informasi'   => $judul_informasi,
                'isi_informasi'     => $isi_informasi
            ];
                $this->informasi_model->insert_data($data, 'informasi');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Informasi Kampus berhasil di tambahkan </div>');
                redirect('administrator/informasi');
        }
    }


    public function update($id) 
    {
        $where = ['id_informasi' => $id];
        
        $data['informasi'] = $this->informasi_model->edit_data($where, 'informasi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/informasi_update', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function update_informasi_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function update
            $this->update();
        } 
        else 
        {
                $id               = $this->input->post('id_informasi');
                $icon             = $this->input->post('icon');
                $judul_informasi  = $this->input->post('judul_informasi');
                $isi_informasi    = $this->input->post('isi_informasi');
                
                $data = [
                    'icon'              => $icon,
                    'judul_informasi'   => $judul_informasi,
                    'isi_informasi'     => $isi_informasi
                ];
                    $where = ['id_informasi' => $id];

                    $this->informasi_model->update_data($where, $data, 'informasi');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Informasi  Kampus berhasil di Update </div>');
                    redirect('administrator/informasi');
        }

    }


    public function _rules()
    {
        $this->form_validation->set_rules('icon','icon','required',[
            'required' => 'Icon Wajib di isi'
        ]);
        $this->form_validation->set_rules('judul_informasi','judul_informasi','required',[
            'required' => 'Judul Informasi Wajib di isi'
        ]);
        $this->form_validation->set_rules('isi_informasi','isi_informasi','required',[
            'required' => 'Isi Informasi Wajib di isi'
        ]);
    } 


    public function delete($id)
    {
        $where = ['id_informasi' => $id];
        
        $this->informasi_model->hapus_data($where, 'informasi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Informasi Kampus berhasil di hapus</div>');
        redirect('administrator/informasi');
    }


 
}