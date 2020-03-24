<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Program Studi
                </div>

            <form action="<?= base_url('administrator/prodi/tambah_prodi_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">Kode Prodi</label>
                    <input type="text" name="kode_prodi" placeholder="Masukan kode prodi" class="form-control">
                        <?= form_error('kode_prodi','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Prodi</label>
                    <input type="text" name="nama_prodi" placeholder="Masukan nama prodi" class="form-control">
                    <?= form_error('nama_prodi','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Jurusan</label>
                    <select name="nama_jurusan" class="form-control">
                        <option value="">- Pilih Jurusan</option>

                        <?php foreach ($jurusan as $jrs) : ?>
                            <option value="<?= $jrs->nama_jurusan ?>"><?= $jrs->nama_jurusan; ?></option>
                        <?php endforeach; ?>    

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    <div class="col-6"></div>
</div>
</div>