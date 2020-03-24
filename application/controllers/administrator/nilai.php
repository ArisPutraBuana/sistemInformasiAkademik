<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function index()
	{
        $data = [
            'nim'             => set_value('nim'),
            'id_thn_akademik' => set_value('id_thn_akademik')
        ];

		$this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/masuk_khs', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function nilai_aksi()
    {
        $this->_rulesKhs();

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

                $query = "SELECT krs.id_thn_akademik,
                                 krs.kode_matakuliah,
                                 matakuliah.nama_matakuliah,
                                 matakuliah.sks,
                                 krs.nilai
                                 FROM 
                                    krs
                                 INNER JOIN matakuliah
                                 ON (krs.kode_matakuliah = matakuliah.kode_matakuliah)
                                 WHERE krs.nim = $nim AND krs.id_thn_akademik = $thn_akad";

              $sql = $this->db->query($query)->result(); 
              
              $smt = $this->db->select('tahun_akademik, semester')
                              ->from('tahun_akademik')
                              ->where(['id_thn_akademik' => $thn_akad])->get()->row();

             $query_str = "SELECT mahasiswa.nim,
                                  mahasiswa.nama_lengkap,
                                  prodi.nama_prodi
                           FROM 
                                mahasiswa
                           INNER JOIN prodi
                           ON (mahasiswa.nama_prodi = prodi.nama_prodi)";  

             $mhs = $this->db->query($query_str)->row();
             
             if ($smt->semester == 1) 
             {
                 $tampilSemester = "Ganjil";
             } 
             else 
             {
                $tampilSemester = "Genap";
             }

             $data = [
                'mhs_data'  => $sql,
                'mhs_nim'   => $nim,
                'mhs_nama'  => $mhs->nama_lengkap,
                'mhs_prodi' => $mhs->nama_prodi,
                'thn_akad'  => $smt->tahun_akademik."(".$tampilSemester.")"
             ];

                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('administrator/khs', $data);
                $this->load->view('templates_administrator/footer');
        } 

    }


    public function _rulesKhs()
    {
        $this->form_validation->set_rules('nim','Nim','required',[
            'required' => 'NIM Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_thn_akademik','id_thn_akademik','required',[
            'required' => 'Id Tahun Akademik Wajib di isi'
        ]);
    }

    // Lihat di Template_administrator ( bagian : input nilai)
    public function input_nilai()
    {
        $data = [
            'kode_matakuliah' => set_value('kode_matakuliah'),
            'id_thn_akademik' => set_value('id_thn_akademik'),
        ];

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/input_nilai_form', $data);
        $this->load->view('templates_administrator/footer');

    }


    public function input_nilai_aksi()
    {
        $this->_rulesInputNilai();

        if ($this->form_validation->run() == FALSE) 
        {
            $this->input_nilai();
        } 
        else 
        {
            $kode_matakuliah = $this->input->post('kode_matakuliah', TRUE);
            $id_thn_akademik = $this->input->post('id_thn_akademik', TRUE);

            $this->db->select('k.id_krs,k.nim,m.nama_lengkap,k.nilai,d.nama_matakuliah');
            $this->db->from('krs as k');
            $this->db->join('mahasiswa as m','m.nim = k.nim');
            $this->db->join('matakuliah as d', 'k.kode_matakuliah = d.kode_matakuliah');
            $this->db->where('k.id_thn_akademik', $id_thn_akademik);
            $this->db->where('k.kode_matakuliah', $kode_matakuliah);

            $query = $this->db->get()->result();

            $data = [
                'list_nilai' => $query,
                'kode_matakuliah' => $kode_matakuliah,
                'id_thn_akademik' => $id_thn_akademik
            ];

                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('administrator/form_nilai', $data);
                $this->load->view('templates_administrator/footer');
        }
    }


    public function _rulesInputNilai()
    {
        $this->form_validation->set_rules('kode_matakuliah','kode_matakuliah','required',[
            'required' => 'Kode Mata kuliah Wajib di isi'
        ]);
        $this->form_validation->set_rules('id_thn_akademik','id_thn_akademik','required',[
            'required' => 'Id Tahun Akademik Wajib di isi'
        ]);
    }


    public function simpan_nilai()
    {
        $query = [];

        $id_krs = $_POST['id_krs'];
        $nilai = $_POST['nilai'];

        for ($i=0; $i>sizeof($id_krs); $i++)
        {
            $this->db->set('nilai', $nilai[$i])->where('id_krs', $id_krs[$i])->update('krs');
        }
        // Mengubah ID_KRS jadi ARRAY
        $data = [
            'id_krs' => $id_krs
        ];

                $this->load->view('templates_administrator/header');
                $this->load->view('templates_administrator/sidebar');
                $this->load->view('administrator/daftar_nilai', $data);
                $this->load->view('templates_administrator/footer');

    }




}