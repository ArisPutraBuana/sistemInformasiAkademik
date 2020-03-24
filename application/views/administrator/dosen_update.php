<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Update Dosen
                </div>

        <?php foreach ($dosen as $dsn) : ?>

           <?= form_open_multipart('administrator/dosen/update_dosen_aksi'); ?>

                <div class="form-group">
                    <label for="">NIDN</label>
                    <input type="hidden" name="id_dosen" value="<?= $dsn->id_dosen ?>" class="form-control">
                    <input type="text" name="nidn" value="<?= $dsn->nidn ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">NAMA DOSEN</label>
                    <input type="text" name="nama_dosen" value="<?= $dsn->nama_dosen ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">ALAMAT</label>
                    <input type="text" name="alamat" value="<?= $dsn->alamat ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">JENIS KELAMIN</label>
                    <select name="jenis_kelamin" value="<?= $dsn->jenis_kelamin ?>" class="form-control">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">EMAIL</label>
                    <input type="email" name="email" value="<?= $dsn->email ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">TELEPON</label>
                    <input type="text" name="telp" value="<?= $dsn->telp ?>" class="form-control">
                </div>
                <div class="form-group">
                        <?php foreach ($detail as $dt) : ?>
                            <img style="width:20%" src="<?= base_url('assets/img/').$dsn->photo; ?>">
                        <?php endforeach; ?> <br><br>
                    <label for="">FOTO</label>
                    <input type="file" name="userfile" value="<?= $dsn->photo ?>" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mb-5">Update</button>

            <?php form_close(); ?>

            <?php endforeach; ?>

        </div>
    <div class="col-6"></div>
</div>
</div>