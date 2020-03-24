<div class="container-fluid">
 <div class="col-6">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university mr-2"></i> Jurusan
    </div>

    <?php foreach ($jurusan as $jrs) : ?>
        <form action="<?= base_url('administrator/jurusan/update_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">Kode Jurusan</label>
                    <input type="hidden" name="id_jurusan" class="form-control" value="<?= $jrs->id_jurusan ?>">
                    <input type="text" name="kode_jurusan" class="form-control" value="<?= $jrs->kode_jurusan ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" class="form-control" value="<?= $jrs->nama_jurusan ?>">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

        </form>
    <?php endforeach; ?>
    </div>
    <div class="col-6"></div>
</div>    