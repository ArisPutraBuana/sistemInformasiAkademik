<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {

	public function index()
	{
        $data = [
            'nim'             => set_value('nim'),
            'id_thn_akademik' => set_value('id_thn_akademik')
        ];

		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_krs', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function krs_aksi()
    {
        $this->_rulesKrs();

        if ($this->form_validation->run() == FALSE) 
        {
            // Jika gagal kembali ke Function index
            $this->index();
        }
         else
        {
            // Jika benar, data masuk ke database
                $nim                 = $this->input->post('nim', TRUE);
                $thn_akad            = $this->input->post('id_thn_akademik', TRUE);
        }

        if ($this->mahasiswa_model->get_by_id($nim) == NULL) 
        {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data Mahasiswa yang Anda input belum terdaftar </div>');
                redirect('administrator/krs');
        }

        $data = [
            'nim'               => $nim,
            'id_thn_akademik'   => $thn_akad,
            'nama_lengkap'      => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap
        ];

        $dataKrs = [
            'krs_data'              => $this->baca_krs($nim, $thn_akad),   // baca_krs() = untuk menampilkan NIM & tahun akademik
            'nim'                   => $nim,
            'id_thn_akademik'       => $thn_akad,
            'tahun_akademik'        => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester'              => $this->tahunakademik_model->get_by_id($thn_akad)->semester == 1?'Ganjil':'Genap',
            'nama_lengkap'          => $this->mahasiswa_model->get_by_id($nim)->nama_lengkap,
            'prodi'                 => $this->mahasiswa_model->get_by_id($nim)->nama_prodi,
        ];

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/krs_list', $dataKrs);
        $this->load->view('templates_administrator/footer');


    }


    public function baca_krs($nim,$thn_akad)
    {
        $this->db->select('k.id_krs,k.kode_matakuliah,m.nama_matakuliah,m.sks');
        $this->db->from('krs as k');
        $this->db->where('k.nim', $nim);
        $this->db->where('k.id_thn_akademik', $thn_akad);   
        $this->db->join('matakuliah as m','m.kode_matakuliah = k.kode_matakuliah');

        $krs = $this->db->get()->result();
        return $krs;
    }


    public function _rulesKrs()
    {
        $this->form_validation->set_rules('nim','nim','required',[
            'required' => 'NIM Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_thn_akademik','id_thn_akademik','required',[
            'required' => 'Wajib di isi'
        ]);
    }


    public function tambah_krs($nim, $thn_akad)
    {
        $data = [
            'id_krs'                => set_value('id_krs'),
            'id_thn_akademik'       => $thn_akad,
            'thn_akad_smt'          => $this->tahunakademik_model->get_by_id($thn_akad)->tahun_akademik,
            'semester'              => $this->tahunakademik_model->get_by_id($thn_akad)->semester == 1?'Ganjil':'Genap',
            'nim'                   => $nim,
            'kode_matakuliah'       => set_value('kode_matakuliah')
        ];

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/krs_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_krs_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE) 
        {
            $this->tambah_krs($this->input->post('name', TRUE),
            $this->input->post('id_thn_akademik', TRUE) );
        } 
        else
        {
            $nim             = $this->input->post('nim', TRUE);
            $id_thn_akademik = $this->input->post('id_thn_akademik', TRUE);
            $kode_matakuliah = $this->input->post('kode_matakuliah', TRUE);

            $data = [
                'id_thn_akademik'  => $id_thn_akademik,
                'nim'              => $nim,
                'kode_matakuliah'  => $kode_matakuliah
            ];

            $this->krs_model->insert($data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data KRS berhasil di tambahkan</div>');
            redirect('administrator/krs/index');
        }
    }


    public function _rules()
    {
        $this->form_validation->set_rules('id_thn_akademik','id_thn_akademik','required',[
            'required' => 'Tahun Akademik Wajib di isi'
        ]);
        $this->form_validation->set_rules('nim','nim','required',[
            'required' => 'NIM Wajib di isi'
        ]);
        $this->form_validation->set_rules('kode_matakuliah','kode_matakuliah','required',[
            'required' => 'Kode Mata kuliah Wajib di isi'
        ]);
    }


    public function update($id)
    {
        // Menampilkan data berdasarkan ID
        $row = $this->krs_model->get_by_id($id);
        $th = $row->id_thn_akademik;

        if ($row)
         {
            $data = [
                'id_krs'          => set_value('id_krs', $row->id_krs),
                'id_thn_akademik' => set_value('id_thn_akademik', $row->id_thn_akademik),
                'nim'             => set_value('nim', $row->nim),
                'kode_matakuliah' => set_value('kode_matakuliah', $row->kode_matakuliah),
                'thn_akad_smt'    => $this->tahunakademik_model->get_by_id($th)->tahun_akademik,
                'semester'        => $this->tahunakademik_model->get_by_id($th)->semester==1?'Ganjil':'Genap'
            ];

            $this->load->view('templates_administrator/header');
            $this->load->view('templates_administrator/sidebar');
            $this->load->view('administrator/krs_update', $data);
            $this->load->view('templates_administrator/footer');
        } 
        else
        {
            echo "Data Tidak Ada";
        }
    }


    public function update_krs_aksi()
    {
        $id_krs          = $this->input->post('id_krs', TRUE);
        $nim             = $this->input->post('nim', TRUE);
        $id_thn_akademik = $this->input->post('id_thn_akademik', TRUE);
        $kode_matakuliah = $this->input->post('kode_matakuliah', TRUE);

        $data = [
            'id_krs'          => $id_krs,
            'nim'             => $nim ,
            'id_thn_akademik' => $id_thn_akademik,
            'kode_matakuliah' => $this->input->post('kode_matakuliah', TRUE)
        ];

        $this->krs_model->update($id_krs, $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data KRS berhasil di update!</div>');
        redirect('administrator/krs/index');
    }


    public function delete($id)
    {
        $where = ['id_krs' => $id];
        
        $this->krs_model->hapus_data($where, 'krs');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data KRS berhasil di hapus</div>');
        redirect('administrator/krs/index');
    }




}