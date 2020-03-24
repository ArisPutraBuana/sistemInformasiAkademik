<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Mahasiswa
                </div>

           <?= form_open_multipart('administrator/mahasiswa/tambah_mahasiswa_aksi'); ?>

                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" placeholder="Masukan NIM " class="form-control">
                        <?= form_error('nim','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" placeholder="Masukan nama lengkap" class="form-control">
                    <?= form_error('nama_lengkap','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" placeholder="Masukan alamat" class="form-control">
                    <?= form_error('alamat','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Masukan email" class="form-control">
                    <?= form_error('email','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" name="telepon" placeholder="Masukan telepon" class="form-control">
                    <?= form_error('telepon','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" placeholder="Masukan tempat lahir" class="form-control">
                    <?= form_error('tempat_lahir','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" placeholder="Masukan tanggal_lahir" class="form-control">
                    <?= form_error('tanggal_lahir','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                    <?= form_error('jenis_kelamin','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Program Studi</label>
                    <select name="nama_prodi" class="form-control">
                        <option value="">-- Pilih Program Studi --</option>
                            <?php foreach ($prodi as $prd) : ?>
                                <option value="<?= $prd->nama_prodi ?>"><?= $prd->nama_prodi ?></option>
                            <?php endforeach; ?>
                    </select>
                    <?= form_error('nama_prodi','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">FOTO</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            <?php form_close(); ?>
        </div>
    <div class="col-6"></div>
</div>
</div>