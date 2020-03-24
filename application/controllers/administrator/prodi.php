<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

	public function index()
	{
        // Memanggil data di dalam database melalui Model ( prodi_model )
        $data['prodi'] = $this->prodi_model->tampil_data('prodi')->result();

		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/prodi', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_prodi()
    {
        $data['jurusan'] = $this->prodi_model->tampil_data('jurusan')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/prodi_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_prodi_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE)
        {
            // Jika gagal kembali ke Function tambah prodi
            $this->tambah_prodi();
        } 
        else 
        {
            // Jika benar, data masuk ke database
                $kode_prodi     = $this->input->post('kode_prodi');
                $nama_prodi     = $this->input->post('nama_prodi');
                $nama_jurusan   = $this->input->post('nama_jurusan');

            $data = [
                'kode_prodi' => $kode_prodi,
                'nama_prodi' => $nama_prodi,
                'nama_jurusan' =>  $nama_jurusan
            ];
                $this->prodi_model->insert_data($data, 'prodi');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Prodi berhasil di tambahkan </div>');
                redirect('administrator/prodi');
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules('kode_prodi','Kode_Prodi','required',[
            'required' => 'Kode prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_prodi','Nama_prodi','required',[
            'required' => 'Nama prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_jurusan','Nama_jurusan','required',[
            'required' => 'Nama jurusan Wajib di isi'
        ]);
    }


    public function update($id) 
    {
        $where = ['id_prodi' => $id];
        //  Join table ( Prodi dan Jurusana )
        $data['prodi'] = $this->db->query("SELECT * FROM prodi prd, jurusan jrs WHERE prd.nama_jurusan=jrs.nama_jurusan AND prd.id_prodi='$id'")->result();
        $data['jurusan'] = $this->prodi_model->tampil_data('jurusan')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/prodi_update', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function update_aksi()
    {
        $id           = $this->input->post('id_prodi');
        $kode_prodi   = $this->input->post('kode_prodi');
        $nama_prodi   = $this->input->post('nama_prodi');
        $nama_jurusan = $this->input->post('nama_jurusan');

        $data = [
            'kode_prodi'    => $kode_prodi,
            'nama_prodi'    => $nama_prodi,
            'nama_jurusan'  => $nama_jurusan
        ];

        $where = ['id_prodi' => $id];

        $this->prodi_model->update_data($where, $data, 'prodi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Prodi berhasil di update</div>');
        redirect('administrator/prodi');
    }


    public function delete($id)
    {
        $where = ['id_prodi' => $id];
        
        $this->prodi_model->hapus_data($where, 'prodi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Prodi berhasil di hapus</div>');
        redirect('administrator/prodi');
    }




}