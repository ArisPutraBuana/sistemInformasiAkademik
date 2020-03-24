<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function index()
	{
        // Memanggil data di dalam database melalui Model
        $data['mahasiswa'] = $this->mahasiswa_model->tampil_data('mahasiswa')->result();
        $data['prodi'] = $this->prodi_model->tampil_data('prodi')->result();

		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function detail($id)
    {
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa_detail', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_mahasiswa()
    {
        $data['prodi'] = $this->mahasiswa_model->tampil_data('prodi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_mahasiswa_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function tambah mahasiswa
            $this->tambah_mahasiswa();
        } 
        else 
        {
            // Jika benar, data masuk ke database
                $nim              = $this->input->post('nim');
                $nama_lengkap     = $this->input->post('nama_lengkap');
                $alamat           = $this->input->post('alamat');
                $email            = $this->input->post('email');
                $telepon          = $this->input->post('telepon');
                $tempat_lahir     = $this->input->post('tempat_lahir');
                $tanggal_lahir    = $this->input->post('tanggal_lahir');
                $jenis_kelamin    = $this->input->post('jenis_kelamin');
                $nama_prodi       = $this->input->post('nama_prodi');
                $photo            = $_FILES['photo'];

                if($photo = '') 
                {

                } 
                else
                {
                    $config['upload_path'] = './assets/img';
                    $config['allowed_types'] = 'jpg|png|gif|tiff';

                    $this->load->library('upload',$config);

                    if (!$this->upload->do_upload('photo'))
                    {
                        echo "Gagal Upload"; die();
                    } 
                    else 
                    {
                        $photo = $this->upload->data('file_name');
                    }
                }

            $data = [
                'nim'            => $nim,
                'nama_lengkap'   => $nama_lengkap,
                'alamat'         => $alamat,
                'email'          => $email,
                'telepon'        => $telepon,
                'tempat_lahir'   => $tempat_lahir,
                'tanggal_lahir'  => $tanggal_lahir,
                'jenis_kelamin'  => $jenis_kelamin,
                'nama_prodi'     => $nama_prodi,
                'photo'          => $photo
            ];
                $this->mahasiswa_model->insert_data($data, 'mahasiswa');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Mahasiswa berhasil di tambahkan </div>');
                redirect('administrator/mahasiswa');
        }
    }


    public function update($id) 
    {
        $where = ['id' => $id];
        //  Join table ( Prodi dan Mahasiswa )
        $data['mahasiswa'] = $this->db->query("SELECT * FROM mahasiswa mhs, prodi prd WHERE mhs.nama_prodi=prd.nama_prodi AND mhs.id='$id'")->result();
        $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();
        $data['detail'] = $this->mahasiswa_model->ambil_id_mahasiswa($id);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/mahasiswa_update', $data);
        $this->load->view('templates_administrator/footer');
    }



    public function update_mahasiswa_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function update
            $this->update();
        } 
        else 
        {
                $id               = $this->input->post('id');
                $nim              = $this->input->post('nim');
                $nama_lengkap     = $this->input->post('nama_lengkap');
                $alamat           = $this->input->post('alamat');
                $email            = $this->input->post('email');
                $telepon          = $this->input->post('telepon');
                $tempat_lahir     = $this->input->post('tempat_lahir');
                $tanggal_lahir    = $this->input->post('tanggal_lahir');
                $jenis_kelamin    = $this->input->post('jenis_kelamin');
                $nama_prodi       = $this->input->post('nama_prodi');
                $photo            = $_FILES['userfile']['name'];

                if ($photo) 
                {
                    $config['upload_path'] = './assets/img';
                    $config['allowed_types'] = 'jpg|png|gif|tiff';

                    $this->load->library('upload',$config);

                    if ($this->upload->do_upload('userfile')) 
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
                    'nim'            => $nim,
                    'nama_lengkap'   => $nama_lengkap,
                    'alamat'         => $alamat,
                    'email'          => $email,
                    'telepon'        => $telepon,
                    'tempat_lahir'   => $tempat_lahir,
                    'tanggal_lahir'  => $tanggal_lahir,
                    'jenis_kelamin'  => $jenis_kelamin,
                    'nama_prodi'     => $nama_prodi
                ];
                    $where = ['id' => $id];

                    $this->mahasiswa_model->update_data($where, $data, 'mahasiswa');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Mahasiswa berhasil di Update </div>');
                    redirect('administrator/mahasiswa');
        }

    }




    public function _rules()
    {
        $this->form_validation->set_rules('nim','nim','required',[
            'required' => 'NIM Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_lengkap','nama_lengkap','required',[
            'required' => 'Nama Lengkap Wajib di isi'
        ]);
        $this->form_validation->set_rules('alamat','alamat','required',[
            'required' => 'Alamat Wajib di isi'
        ]);
        $this->form_validation->set_rules('email','email','required',[
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('telepon','telepon','required',[
            'required' => 'Telepon Wajib di isi'
        ]);
        $this->form_validation->set_rules('tempat_lahir','tempat_lahir','required',[
            'required' => 'Tempat Lahir Wajib di isi'
        ]);
        $this->form_validation->set_rules('tanggal_lahir','tanggal_lahir','required',[
            'required' => 'Tanggal Lahir Wajib di isi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin','jenis_kelamin','required',[
            'required' => 'Jenis kelamin Wajib di pilih'
        ]);
        $this->form_validation->set_rules('nama_prodi','nama_prodi','required',[
            'required' => 'Program studi Wajib di pilih'
        ]);
    } 



    public function delete($id)
    {
        $where = ['id' => $id];
        
        $this->mahasiswa_model->hapus_data($where, 'mahasiswa');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Mahasiswa berhasil di hapus</div>');
        redirect('administrator/mahasiswa');
    }




    
}