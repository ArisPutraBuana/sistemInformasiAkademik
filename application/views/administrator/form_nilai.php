<?php 

$nilai = get_instance();    // Untuk memanggil objek utamanya
$nilai->load->model('matakuliah_model');
$nilai->load->model('tahunakademik_model');

?>

<div class="container-fluid">
    <?php 
        if ($list_nilai == NULL)
        {
            $thn = $nilai->tahunakademik_model->get_by_id($id_thn_akademik);
            $semester = $thn->semester == 1;

            // Mengubah nilai semester jadi STRING
            if ($semester == 1)
            {
                $tampilSemester = "Ganjil";
            } 
            else 
            {
                $tampilSemester = "Genap";
            }
        
    ?>

        <div class="alert alert-danger">
            Maaf, Kode Mata kuliah yang Anda input <strong>TIDAK TERSEDIA!</strong> di tahun ajaran 
            <?= $thn->tahun_akademik ."(" . $tampilSemester .")"; ?>
        </div>

        <?= anchor('administrator/nilai/input_nilai', '<div class="btn btn-primary">Kembali</div>'); ?>

        <?php
            } else {
        ?>

        <!-- <div class="row"> -->
        <center>
                <legend><strong>MASUKAN NILAI AKHIR</strong></legend>
        
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

                                    // Mengubah nilai semester jadi STRING
                                    if ($semester == 1)
                                    {
                                        $tampilSemester = "Ganjil";
                                    } 
                                    else 
                                    {
                                        $tampilSemester = "Genap";
                                    }

                            ?>

                            <tr>
                              <td>
                              TAHUN AKADEMIK ( SEMESTER )
                              <td> : <?= $thn->tahun_akademik . "(" . $tampilSemester . ")"; ?></td>
                              </td>
                            </tr>
                        </table>
                        </center>
        <!-- </div> -->

        
        <form action="<?= base_url('administrator/nilai/simpan_nilai'); ?>" method="post">
            <table class="table table-bordered table-hover table-striped mt-4">
                <tr>
                    <td>NO</td>
                    <td>NIM</td>
                    <td>NAMA MAHASISWA</td>
                    <td>NILAI</td>
                </tr>
                <?php 
                $no = 1; 
                    foreach ($list_nilai as $row) : ?>
                        <tr>
                            <td width="25px"><?= $no++; ?></td>
                            <td><?= $row->nim; ?></td>
                            <td><?= $row->nama_lengkap; ?></td>
                            <input type="hidden" name="id_krs[]" value="<?= $row->id_krs; ?>">
                            <td width="30px"><input type="text" name="nilai[]" class="form-control" value="<?= $row->nilai; ?>"></td>
                        </tr>
                    <?php endforeach; ?>
            </table>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>


        <?php } ?>


</div>