<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-edit mr-2"></i> From Update Tahun Akademik
                </div>

            <?php foreach ($tahun_akademik as $ta) : ?>

            <form action="<?= base_url('administrator/tahun_akademik/update_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">Tahun Akademik</label>
                    <input type="hidden" name="id_thn_akademik" value="<?= $ta->id_thn_akademik ?>" class="form-control">
                    <input type="text" name="tahun_akademik"  value="<?= $ta->tahun_akademik ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" class="form-control">
                        <option><?= $ta->semester ?></option>
                        <option>Ganjil</option>
                        <option>Genap</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select name="status" class="form-control">
                        <option><?= $ta->status ?></option>
                        <option>Aktif</option>
                        <option>Tidak Aktif</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>

            <?php endforeach; ?>

        </div>
    <div class="col-6"></div>
</div>
</div>