<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-search-plus mr-2"></i> Detail Dosen
    </div>

<div class="row">
        <div class="col-10">

    <table class="table table-bordered table-striped table-hover mt-3">

        
        <?php foreach ($detail as $dt) : ?>

        <!--  gambar  -->
        <img class="mb-4" src="<?= base_url('assets/img/').$dt->photo ?>" style="width: 20%">

        <tr>
            <th>NIDN</th>
            <td><?= $dt->nidn ?></td>
        </tr>
        <tr>
            <th>NAMA DOSEN</th>
            <td><?= $dt->nama_dosen ?></td>
        </tr>
        <tr>
            <th>ALAMAT</th>
            <td><?= $dt->alamat ?></td>
        </tr>
        <tr>
            <th>JENIS KELAMIN</th>
            <td><?= $dt->jenis_kelamin ?></td>
        </tr>
        <tr>
            <th>EMAIL</th>
            <td><?= $dt->email ?></td>
        </tr>
        <tr>
            <th>NO TELEPON</th>
            <td><?= $dt->telp ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

            <?= anchor('administrator/dosen','<div class="btn btn-sm btn-primary">Kembali</div>'); ?>

        </div>
    <div class="col-2"></div>
    </div>
</div>