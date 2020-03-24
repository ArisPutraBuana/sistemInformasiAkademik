<div class="container-fluid">
 <div class="col-6">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-university mr-2"></i> From Update Program Studi
    </div>

    <?php foreach ($prodi as $prd) : ?>
        <form action="<?= base_url('administrator/prodi/update_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">Kode Prodi</label>
                    <input type="hidden" name="id_prodi" class="form-control" value="<?= $prd->id_prodi ?>">
                    <input type="text" name="kode_prodi" class="form-control" value="<?= $prd->kode_prodi ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Prodi</label>
                    <input type="text" name="nama_prodi" class="form-control" value="<?= $prd->nama_prodi ?>">
                </div>
                <div class="form-group">
                    <label for="">Nama Jurusan</label>
                        <select name="nama_jurusan" class="form-control">
                                <option value="<?= $prd->nama_jurusan ?>"><?= $prd->nama_jurusan; ?></option>

                                <?php foreach ($jurusan as $jrs) : ?>
                                    <option value="<?= $jrs->nama_jurusan ?>"><?= $jrs->nama_jurusan; ?></option>
                                <?php endforeach; ?>
                        </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>

        </form>
    <?php endforeach; ?>
    </div>
    <div class="col-6"></div>
</div>    