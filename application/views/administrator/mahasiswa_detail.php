<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-search-plus mr-2"></i> Detail Mahasiswa
    </div>

<div class="row">
        <div class="col-10">

    <table class="table table-bordered table-striped table-hover mt-3">
        <?php foreach ($detail as $dt) : ?>

        <!--  gambar  -->
        <img class="mb-4" src="<?= base_url('assets/img/').$dt->photo ?>" style="width: 20%">

        <tr>
            <th>NIM</th>
            <td><?= $dt->nim ?></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td><?= $dt->nama_lengkap ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?= $dt->alamat ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $dt->email ?></td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td><?= $dt->telepon ?></td>
        </tr>
        <tr>
            <th>Tempat Lahir</th>
            <td><?= $dt->tempat_lahir ?></td>
        </tr>
        <tr>
            <th>Tanggal Lahir</th>
            <td><?= $dt->tanggal_lahir ?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?= $dt->jenis_kelamin ?></td>
        </tr>
        <tr>
            <th>Program Studi</th>
            <td><?= $dt->nama_prodi ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

            <?= anchor('administrator/mahasiswa','<div class="btn btn-sm btn-primary">Kembali</div>'); ?>

        </div>
    <div class="col-2"></div>
    </div>
</div>