<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function index()
	{
        // Memanggil data di dalam database melalui Model ( jurusan_model )
        $data['jurusan'] = $this->jurusan_model->tampil_data()->result();

		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function input()
    {
        $data = [
            'id_jurusan'   => set_value('id_jurusan'),
            'kode_jurusan' => set_value('kode_jurusan'),
            'nama_jurusan' => set_value('nama_jurusan'),
        ];

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function input_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function input
            $this->input();
        } 
        else 
        {
            // Jika benar, data masuk ke database
            $data = [
                'kode_jurusan' => $this->input->post('kode_jurusan', TRUE),
                'nama_jurusan' => $this->input->post('nama_jurusan', TRUE)
            ];
                $this->jurusan_model->input_data($data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Jurusan berhasil di tambahkan </div>');
                redirect('administrator/jurusan');
        }
    }
    


    public function _rules()
    {
        $this->form_validation->set_rules('kode_jurusan','Kode_jurusan','required',[
            'required' => 'Kode jurusan Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_jurusan','nama_jurusan','required',[
            'required' => 'Nama jurusan Wajib di isi'
        ]);
    }


    public function update($id) 
    {
        $where = ['id_jurusan' => $id];
        $data['jurusan'] = $this->jurusan_model->edit_data($where, 'jurusan')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/jurusan_update', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function update_aksi()
    {
        $id           = $this->input->post('id_jurusan');
        $kode_jurusan = $this->input->post('kode_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');

        $data = [
            'kode_jurusan' => $kode_jurusan,
            'nama_jurusan' => $nama_jurusan,
        ];

        $where = ['id_jurusan' => $id];

        $this->jurusan_model->update_data($where, $data, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Jurusan berhasil di update</div>');
        redirect('administrator/jurusan');
    }


    public function delete($id)
    {
        $where = ['id_jurusan' => $id];
        
        $this->jurusan_model->hapus_data($where, 'jurusan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Jurusan berhasil di hapus</div>');
        redirect('administrator/jurusan');
    }


}