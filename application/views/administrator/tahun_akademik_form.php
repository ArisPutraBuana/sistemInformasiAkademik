<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Tahun Akademik
                </div>

            <form action="<?= base_url('administrator/tahun_akademik/tambah_tahun_akademik_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <input type="text" name="tahun_akademik" placeholder="Masukan Tahun Akademik" class="form-control">
                        <?= form_error('tahun_akademik','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" class="form-control">
                        <option value="">- Pilih Semester</option>
                        <option>Ganjil</option>
                        <option>Genap</option>
                    </select>
                    <?= form_error('semester','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- Pilih Status --</option>
                        <option>Aktif</option>
                        <option>Tidak Aktif</option>
                    </select>
                    <?= form_error('status','<small class="text-danger ml-3">','</small>'); ?>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    <div class="col-6"></div>
</div>
</div>