<?php

function skorNilai($nilai, $sks)
{
    if($nilai == 'A') $skor=4*$sks;
    else if ($nilai == 'B') $skor=3*$sks;
        else if ($nilai == 'C') $skor=2*$sks;
            else if ($nilai == 'D') $skor=1*$sks;
                else $skor=0;

         return $skor;       
}


function cekNilai($nim, $kode, $nilKhs)
{
    $nilai = get_instance();
    $nilai->load->model('transkrip_model');

    // query mengambil data transkrip nilai
    $nilai->db->select('*');
    $nilai->db->from('transkrip_nilai');
    $nilai->db->where('nim', $nim);
    $nilai->db->where('kode_matakuliah', $kode);
    $query = $nilai->db->get()->row();

    // Meng update nilai ( nilai lama di timpah oleh inputan terbaru )
    if($query != null) {
        if($nilKhs < $query->nilai)
        {
            $nilai->db->set('nilai', $nilKhs)
                      ->where('nim', $nim)
                      ->where('kode_matakuliah', $kode)
                      ->update('transkrip_nilai');
        }
    } else {
        // Menginput jika sebelumnya tdk ada nilai ( nilai = 0 )
        $data = [
            'nim' => $nim,
            'nilai' => $nilKhs,
            'kode_matakuliah' => $kode
        ];
        // Insert data melalui model
        $nilai->transkrip_model->insert($data);
    }



}