<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Jurusan
                </div>

            <form action="<?= base_url('administrator/jurusan/input_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">Kode Jurusan</label>
                    <input type="text" name="kode_jurusan" placeholder="Masukan kode jurusan" class="form-control">
                        <?= form_error('kode_jurusan','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Jurusan</label>
                    <input type="text" name="nama_jurusan" placeholder="Masukan nama jurusan" class="form-control">
                    <?= form_error('nama_jurusan','<small class="text-danger ml-3">','</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    <div class="col-6"></div>
</div>
</div>