<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi_kami extends CI_Controller {

	public function index()
	{
        // Memanggil data di dalam database melalui Model
        $data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();
   
		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/hubungi_kami', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function kirim_email($id)
    {
        $where = ['id_hubungi' => $id];

        $data['hubungi'] = $this->hubungi_model->kirim_data($where, 'hubungi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/form_kirim_email', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function kirim_email_aksi()
    {
        $to_email = $this->input->post('email');
        $subject  = $this->input->post('subject');
        $message  = $this->input->post('pesan');

        $config = [
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.gmail.com',
            'smtp_user'     => 'buanaap9@gmail.com',
            'smtp_pass'     => '1234aris',
            'smtp_post'     => 465,
            'crlf'          => "\r\n",
            'newline'       => "\r\n"
        ];
        
        $this->load->library('email', $config); // Load library email

        $this->email->from("Universitas Indonesia"); // Nama pengirim
        $this->email->to($to_email); // Email tujuan
        $this->email->subject($subject); // Subjeck email
        $this->email->message($message); // isi pesan

        // apabila Email terkirim => send()
        if ($this->email->send())
        {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Pesan berhasil terkirim ke user!</div>');
            redirect('administrator/hubungi_kami');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Pesan tidak terkirim ke user!</div>');
            redirect('administrator/hubungi_kami');
        }

    }


    public function delete($id)
    {
        $where = ['id_hubungi' => $id];
        $this->hubungi_model->hapus_data($where, 'hubungi');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Hubungi Kami berhasil di hapus</div>');
        redirect('administrator/hubungi_kami');
    }




    
}