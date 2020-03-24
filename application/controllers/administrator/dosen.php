<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	public function index()
	{
        // Memanggil data di dalam database melalui Model
        $data['dosen'] = $this->dosen_model->tampil_data('dosen')->result();
   
		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dosen', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function detail($id)
    {
        $data['detail'] = $this->dosen_model->ambil_id_dosen($id);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dosen_detail', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_dosen()
    {
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dosen_form');
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_dosen_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function tambah dosen
            $this->tambah_dosen();
        } 
        else 
        {
            // Jika benar, data masuk ke database
                $nidn             = $this->input->post('nidn');
                $nama_dosen       = $this->input->post('nama_dosen');
                $alamat           = $this->input->post('alamat');
                $jenis_kelamin    = $this->input->post('jenis_kelamin');
                $email            = $this->input->post('email');
                $telp             = $this->input->post('telp');
                $photo            = $_FILES['photo'];

                if($photo = '') 
                {

                } 
                else 
                {
                    $config['upload_path'] = './assets/img';
                    $config['allowed_types'] = 'jpg|png|gif|tiff';

                    $this->load->library('upload',$config);

                    if(!$this->upload->do_upload('photo')) 
                    {
                        echo "Gagal Upload"; die();
                    } 
                    else
                    {
                        $photo = $this->upload->data('file_name');
                    }
                }

            $data = [
                'nidn'           => $nidn,
                'nama_dosen'     => $nama_dosen,
                'alamat'         => $alamat,
                'jenis_kelamin'  => $jenis_kelamin,
                'email'          => $email,
                'telp'           => $telp,
                'photo'          => $photo
            ];
                $this->dosen_model->insert_data($data, 'dosen');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Dosen berhasil di tambahkan </div>');
                redirect('administrator/dosen');
        }
    }


    public function update($id) 
    {
        $where = ['nidn' => $id];
        
        $data['dosen'] = $this->dosen_model->edit_data($where, 'dosen')->result();
        $data['detail'] = $this->dosen_model->ambil_id_dosen($id);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/dosen_update', $data);
        $this->load->view('templates_administrator/footer');
    }



    public function update_dosen_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            // Jika gagal kembali ke Function update
            $this->update();
        } 
        else 
        {
                $id               = $this->input->post('id_dosen');
                $nidn             = $this->input->post('nidn');
                $nama_dosen       = $this->input->post('nama_dosen');
                $alamat           = $this->input->post('alamat');
                $jenis_kelamin    = $this->input->post('jenis_kelamin');
                $email            = $this->input->post('email');
                $telp             = $this->input->post('telp');
                $photo            = $_FILES['userfile']['name'];

                if($photo) 
                {
                    $config['upload_path'] = './assets/img';
                    $config['allowed_types'] = 'jpg|png|gif|tiff';

                    $this->load->library('upload',$config);

                    if($this->upload->do_upload('userfile')) 
                    {
                        $userfile = $this->upload->data('file_name');
                        $this->db->set('photo', $userfile);
                    } 
                    else 
                    {
                       echo "Gagal Upload";
                    }
                }

                $data = [
                    'nidn'           => $nidn,
                    'nama_dosen'     => $nama_dosen,
                    'alamat'         => $alamat,
                    'jenis_kelamin'  => $jenis_kelamin,
                    'email'          => $email,
                    'telp'           => $telp
                ];
                    $where = ['id_dosen' => $id];

                    $this->dosen_model->update_data($where, $data, 'dosen');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Dosen berhasil di Update </div>');
                    redirect('administrator/dosen');
        }

    }




    public function _rules()
    {
        $this->form_validation->set_rules('nidn','nidn','required',[
            'required' => 'NIDN Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_dosen','nama_dosen','required',[
            'required' => 'Nama Dosen Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat','alamat','required',[
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required',[
            'required' => 'Jenis kelamin Wajib di pilih'
        ]);
        $this->form_validation->set_rules('email','email','required',[
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('telp','telp','required',[
            'required' => 'Telepon Wajib di isi'
        ]);
    } 



    public function delete($id)
    {
        $where = ['nidn' => $id];
        $this->dosen_model->hapus_data($where, 'dosen');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Dosen berhasil di hapus</div>');
        redirect('administrator/dosen');
    }




    
}