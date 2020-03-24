<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Kartu Hasil Studi ( KHS ) </div>

<div class="row">
    <div class="col-3"></div>
        <div class="col-6">
            <h2 class="w-auto pl-5"><strong>KARTU HASIL STUDI</strong></h2>
            <table class="table mt-3 w-auto">
                <tr>
                    <td><strong>NIM</strong></td>
                    <td><strong>&nbsp;:  <?= $mhs_nim; ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Nama Lengkap</strong></td>
                    <td><strong>&nbsp;:  <?= $mhs_nama; ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Program Studi</strong></td>
                    <td><strong>&nbsp;:  <?= $mhs_prodi; ?> </strong></td>
                </tr>
                <tr>
                    <td><strong>Tahun Akadmik ( Semester )</strong></td>
                    <td><strong>&nbsp;:  <?= $thn_akad; ?> </strong></td>
                </tr>
            </table>
        </div>
    <div class="col-3"></div>

    <div class="row">

    <!-- <?= anchor('administrator/krs/print', '<button class="btn btn-info ml-2"><i class="fas fa-print fa-sm mr-2"></i>Print KRS</button>'); ?> -->

    <button class="btn btn-info ml-2"><i class="fas fa-print fa-sm mr-2"></i>Print KRS</button>

        <table class="table table-bordered table-hover table-striped ml-2 mt-4">
            <tr>
                <th>NO</th>
                <th>KODE MATA KULIAH</th>
                <th>NAMA MATA KULIAH</th>
                <th>SKS</th>
                <th>NILAI</th>
                <th>SKOR</th>
            </tr>

            <?php $no = 1; 
                  $jumlahSks = 0;
                  $jumlahNilai = 0; ?>
                <?php foreach ($mhs_data as $row) : ?>
                    <tr>
                        <td class="20"><?= $no; ?></td>
                        <td><?= $row->kode_matakuliah; ?></td>
                        <td><?= $row->nama_matakuliah; ?></td>
                        <td><?= $row->sks; ?></td>
                        <td><?= $row->nilai; ?></td>
                        <td><?= skorNilai($row->nilai,$row->sks); ?></td>

                        <?php
                            $jumlahSks+=$row->sks;
                            $jumlahNilai+=skorNilai($row->nilai,$row->sks); 
                        ?>

                    </tr>
                <?php $no++; ?>
                <?php endforeach; ?>

                <tr>
                    <td colspan="3">Jumlah</td>
                    <td><?= $jumlahSks; ?></td>
                    <td colspan="2"><?= $jumlahNilai; ?></td> 
                </tr>

        </table>

       <p class="ml-2">Index Prestasi : <?= number_format($jumlahNilai / $jumlahSks,2); ?></p>

    </div>
    </div>
</div>