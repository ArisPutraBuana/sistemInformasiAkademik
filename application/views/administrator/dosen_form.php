<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Dosen
                </div>

           <?= form_open_multipart('administrator/dosen/tambah_dosen_aksi'); ?>

                <div class="form-group">
                    <label for="">NIDN</label>
                    <input type="text" name="nidn" placeholder="Masukan NIDN " class="form-control">
                        <?= form_error('nidn','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">NAMA DOSEN</label>
                    <input type="text" name="nama_dosen" placeholder="Masukan Nama Dosen" class="form-control">
                    <?= form_error('nama_dosen','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">ALAMAT</label>
                    <input type="text" name="alamat" placeholder="Masukan Alamat" class="form-control">
                    <?= form_error('alamat','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">JENIS KELAMIN</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                    <?= form_error('jenis_kelamin','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">EMAIL</label>
                    <input type="email" name="email" placeholder="Masukan Email" class="form-control">
                    <?= form_error('email','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">TELEPON</label>
                    <input type="text" name="telp" placeholder="Masukan Telepon" class="form-control">
                    <?= form_error('telp','<small class="text-danger ml-3">','</small>'); ?>
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