<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Update Mahasiswa
                </div>

        <?php foreach ($mahasiswa as $mhs) : ?>

           <?= form_open_multipart('administrator/mahasiswa/update_mahasiswa_aksi'); ?>

                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="hidden" name="id" value="<?= $mhs->id ?>" class="form-control">
                    <input type="text" name="nim" value="<?= $mhs->nim ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" value="<?= $mhs->nama_lengkap ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" value="<?= $mhs->alamat ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="<?= $mhs->email ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" name="telepon" value="<?= $mhs->telepon ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" value="<?= $mhs->tempat_lahir ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" value="<?= $mhs->tanggal_lahir ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" value="<?= $mhs->jenis_kelamin ?>" class="form-control">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Program Studi</label>
                    <select name="nama_prodi" value="<?= $mhs->nama_prodi ?>" class="form-control">
                            <?php foreach ($prodi as $prd) : ?>
                                <option value="<?= $prd->nama_prodi ?>"><?= $prd->nama_prodi ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                        <?php foreach ($detail as $dt) : ?>
                            <img style="width:20%" src="<?= base_url('assets/img/').$mhs->photo; ?>">
                        <?php endforeach; ?> <br><br>
                    <label for="">FOTO</label>
                    <input type="file" name="userfile" value="<?= $mhs->photo ?>" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mb-5">Update</button>

            <?php form_close(); ?>

            <?php endforeach; ?>

        </div>
    <div class="col-6"></div>
</div>
</div>