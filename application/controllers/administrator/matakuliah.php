<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	public function index()
	{
        $data['matakuliah'] = $this->matakuliah_model->tampil_data('matakuliah')->result();
        
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah', $data);
        $this->load->view('templates_administrator/footer');
    }
    

    public function tambah_matakuliah()
    {
        $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_matakuliah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE)
        {
            // Jika gagal kembali ke Function tambah prodi
            $this->tambah_matakuliah();
        } 
        else
        {
            // Jika benar, data masuk ke database
                $kode_matakuliah     = $this->input->post('kode_matakuliah');
                $nama_matakuliah     = $this->input->post('nama_matakuliah');
                $sks                 = $this->input->post('sks');
                $semester            = $this->input->post('semester');
                $nama_prodi          = $this->input->post('nama_prodi');

            $data = [
                'kode_matakuliah' => $kode_matakuliah,
                'nama_matakuliah' => $nama_matakuliah,
                'sks'             => $sks,
                'semester'        => $semester,
                'nama_prodi'      => $nama_prodi
            ];
                $this->matakuliah_model->insert_data($data, 'matakuliah');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Mata kuliah berhasil di tambahkan </div>');
                redirect('administrator/matakuliah');
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules('kode_matakuliah','Kode_matakuliah','required',[
            'required' => 'Kode Mata Kuliah Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_matakuliah','Nama_matakuliah','required',[
            'required' => 'Nama Mata Kuliah Wajib di isi'
        ]);
        $this->form_validation->set_rules('sks','sks','required',[
            'required' => 'SKS Wajib di isi'
        ]);
        $this->form_validation->set_rules('semester','semester','required',[
            'required' => 'Semester Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_prodi','Nama_prodi','required',[
            'required' => 'Nama Prodi Wajib di isi'
        ]);
    } 


    public function detail($kode)
    {
        $data['detail'] = $this->matakuliah_model->ambil_kode_matakuliah($kode);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah_detail', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function update($id) 
    {
        $where = ['kode_matakuliah' => $id];
        //  Join table ( Prodi dan Jurusan )
        $data['matakuliah'] = $this->db->query("SELECT * FROM matakuliah mk, prodi prd WHERE mk.nama_prodi = prd.nama_prodi AND mk.kode_matakuliah='$id'")->result();
        $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah_update', $data);
        $this->load->view('templates_administrator/footer');
    }



    public function update_aksi()
    {
        $id                = $this->input->post('kode_matakuliah');
        $kode_matakuliah   = $this->input->post('kode_matakuliah');
        $nama_matakuliah   = $this->input->post('nama_matakuliah');
        $sks               = $this->input->post('sks');
        $semester          = $this->input->post('semester');
        $nama_prodi        = $this->input->post('nama_prodi');

        $data = [
            'kode_matakuliah'    => $kode_matakuliah,
            'nama_matakuliah'    => $nama_matakuliah,
            'sks'                => $sks,
            'semester'           => $semester,
            'nama_prodi'         => $nama_prodi
        ];

        $where = ['kode_matakuliah' => $id];

        $this->matakuliah_model->update_data($where, $data, 'matakuliah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Mata kuliah berhasil di update</div>');
        redirect('administrator/matakuliah');
    }


    public function delete($id)
    {
        $where = ['kode_matakuliah' => $id];
        
        $this->matakuliah_model->hapus_data($where, 'matakuliah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Mata kuliah berhasil di hapus</div>');
        redirect('administrator/matakuliah');
    }

     

}