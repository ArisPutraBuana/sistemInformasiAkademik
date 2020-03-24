<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
        $data['users'] = $this->user_model->tampil_data('user')->result();

		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/daftar_users', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_users()
    {
       $data = [
            'username'      => set_value('username'),
            'password'      => set_value('password'),
            'email'         => set_value('email'),
            'level'         => set_value('level'),
            'blokir'        => set_value('blokir')
       ];

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/users_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_users_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function tambah users
            $this->tambah_users();
        } 
        else 
        {
            $data = [
                // Jika benar, data masuk ke database
                'username'     => $this->input->post('username',TRUE),
                'password'     => md5($this->input->post('password',TRUE)),
                'email'        => $this->input->post('email',TRUE),
                'level'        => $this->input->post('level',TRUE),
                'blokir'       => $this->input->post('blokir',TRUE),
                'id_session'   => md5($this->input->post('id_session',TRUE))
            ];
                $this->user_model->insert_data($data, 'user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User berhasil di tambahkan </div>');
                redirect('administrator/users');
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules('username','username','required',[
            'required' => 'Username Wajib di isi'
        ]);
        $this->form_validation->set_rules('password','password','required',[
            'required' => 'Password Wajib di isi'
        ]);
        $this->form_validation->set_rules('email','email','required',[
            'required' => 'Email Wajib di isi'
        ]);
        $this->form_validation->set_rules('level','level','required',[
            'required' => 'Level Wajib di isi atau di pilih'
        ]);
        $this->form_validation->set_rules('blokir','blokir','required',[
            'required' => 'Blokir Wajib di isi atau di pilih'
        ]);
    }


    public function update($id) 
    {
        $where = ['id' => $id];

        $data['user'] = $this->user_model->edit_data($where, 'user')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user_update', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function update_aksi()
    {
        $id           = $this->input->post('id');
        $username     = $this->input->post('username');
        $password     = $this->input->post('password');
        $email        = $this->input->post('email');
        $level        = $this->input->post('level');
        $blokir       = $this->input->post('blokir');
        $id_session   = $this->input->post('id_session');

        $data = [
            'username'    => $username,
            'password'    => $password,
            'email'       => $email,
            'level'       => $level,
            'blokir'      => $blokir
        ];

        $where = ['id' => $id];

        $this->user_model->update_data($where, $data, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data User berhasil di update</div>');
        redirect('administrator/users');
    }


    public function delete($id)
    {
        $where = ['id' => $id];

        $this->user_model->hapus_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data User berhasil di hapus</div>');
        redirect('administrator/users');
    }




}