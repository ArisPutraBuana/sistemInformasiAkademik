<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-search-plus mr-2"></i> Detail Mata Kuliah
    </div>

<div class="row">
        <div class="col-10">

    <table class="table table-bordered table-striped table-hover mt-3">
        <?php foreach ($detail as $dt) : ?>
        <tr>
            <th>Kode Mata Kuliah</th>
            <td><?= $dt->kode_matakuliah ?></td>
        </tr>
        <tr>
            <th>Nama Mata Kuliah</th>
            <td><?= $dt->nama_matakuliah ?></td>
        </tr>
        <tr>
            <th>SKS</th>
            <td><?= $dt->sks ?></td>
        </tr>
        <tr>
            <th>Semester</th>
            <td><?= $dt->semester ?></td>
        </tr>
        <tr>
            <th>Nama Program Studi</th>
            <td><?= $dt->nama_prodi ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

            <?= anchor('administrator/matakuliah','<div class="btn btn-sm btn-primary">Kembali</div>'); ?>

        </div>
    <div class="col-2"></div>
    </div>
</div>