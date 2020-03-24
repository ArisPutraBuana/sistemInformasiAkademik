<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Kartu Rencana Studi ( KRS ) </div>

<div class="row">
    <div class="col-3"></div>
        <div class="col-6">
            <h2 class="w-auto pl-5"><strong>KARTU RENCANA STUDI</strong></h2>
            <table class="table mt-3 w-auto">
                <tr>
                    <td><strong>NIM</strong></td>
                    <td><strong>&nbsp;:  <?= $nim ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Nama Lengkap</strong></td>
                    <td><strong>&nbsp;:  <?= $nama_lengkap ?></strong></td>
                </tr>
                <tr>
                    <td><strong>Program Studi</strong></td>
                    <td><strong>&nbsp;:  <?= $prodi ?> </strong></td>
                </tr>
                <tr>
                    <td><strong>Tahun Akadmik ( Semester )</strong></td>
                    <td><strong>&nbsp;:  <?= $tahun_akademik.' &nbsp;('.$semester.')'; ?> </strong></td>
                </tr>
            </table>
        </div>
    <div class="col-3"></div>

    <div class="row">

    
    <?= anchor('administrator/krs/tambah_krs/'.$nim.'/'.$id_thn_akademik, '<button class="btn btn-primary ml-2"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data KRS</button>'); ?>
    
        <table class="table table-bordered table-hover table-striped ml-2 mt-4">
            <tr>
                <th>NO</th>
                <th>KODE MATA KULIAH</th>
                <th>NAMA MATA KULIAH</th>
                <th>SKS</th>
                <th colspan="2">AKSI</th>
            </tr>

            <?php $no = 1; 
                  $jumlahSks = 0; ?>
                <?php foreach ($krs_data as $krs) : ?>
                    <tr>
                        <td class="20"><?= $no ?></td>
                        <td><?= $krs->kode_matakuliah ?></td>
                        <td><?= $krs->nama_matakuliah ?></td>
                        <td><?= $krs->sks;
                                $jumlahSks+=$krs->sks; ?>
                        </td>
                        <td width="20px"><?= anchor('administrator/krs/update/'.$krs->id_krs, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>

                        <td width="20px"><?= anchor('administrator/krs/delete/'.$krs->id_krs, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"><i></div>'); ?></td>
                    </tr>
                <?php $no++; ?>
                <?php endforeach; ?>

                <tr>
                     <td colspan="3" class="text-right"><strong>Jumlah SKS</strong></td>
                     <td colspan="3"><strong><?= $jumlahSks; ?></strong></td>
                    </tr>

        </table>
    </div>
    </div>
</div>