<?php 

$nilai = get_instance();    // Untuk memanggil objek utamanya
$nilai->load->model('krs_model');
$nilai->load->model('mahasiswa_model');
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');

$krs = $nilai->krs_model->get_by_id($id_krs[0]);
$kode_matakuliah = $krs->kode_matakuliah;
$id_thn_akademik = $krs->id_thn_akademik;

?>

<div class="container-fluid">
    <div class="alert alert-success">
        <i class="fa fa-university mr-2"></i> DAFTAR NILAI MAHASISWA
    </div>

    <center>
        <legend><strong>DAFTAR NILAI MAHASISWA</strong></legend>
        <table>
            <tr>
                <td>KODE MATA KULIAH</td>
                <td> : <?= $kode_matakuliah; ?></td>
            </tr>
            <tr>
                <td>NAMA MATA KULIAH</td>
                <td> : <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->nama_matakuliah; ?></td>
            </tr>
            <tr>
                <td>SKS</td>
                <td> : <?= $nilai->matakuliah_model->get_by_id($kode_matakuliah)->sks; ?></td>
            </tr>
                <?php
                        $thn = $nilai->tahunakademik_model->get_by_id($id_thn_akademik);
                        $semester = $thn->semester == 1;

                        if ($semester) {
                            $tampilSemester = "Ganjil";
                        } else {
                            $tampilSemester = "Genap";
                        }
                    ?>
            <tr>
                <td>TAHUN AKADEMIK ( SEMESTER )</td>
                <td> : <?= $thn->tahun_akademik . "(" . $tampilSemester . ")"; ?></td>
            </tr>
        </table>
    </center>

    <table class="table table-bordered table-striped table-hover mt-4">
        <tr>
          <td>NO</td>
          <td>NIM</td>
          <td>NAMA MAHASISWA</td>
          <td>NILAI</td>
        </tr>
        <?php $no = 1; ?>
            <?php for ($i=0; $i<sizeof($id_krs); $i++) : ?>
                <tr>
                    <td width="30px"><?= $no; ?></td>
                        <?php $nim = $nilai->krs_model->get_by_id($id_krs[$i])->nim; ?>
                    <td><?= $nim; ?></td>
                    <td><?= $nilai->mahasiswa_model->get_by_id($nim)->nama_lengkap; ?></td>
                    <td width="70px"><?= $nilai->krs_model->get_by_id($id_krs[$i])->nilai; ?></td>
                </tr>
         <?php $no++; ?>
            <?php endfor; ?>
    </table>

</div>