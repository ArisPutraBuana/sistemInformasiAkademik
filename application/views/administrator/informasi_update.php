<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Update Informasi Kampus
                </div>

    <?php foreach ($informasi as $info) : ?>

           <?= form_open_multipart('administrator/informasi/update_informasi_aksi'); ?>

                <div class="form-group">
                    <label for="">ICON</label>
                    <input type="hidden" name="id_informasi" value="<?= $info->id_informasi; ?>" class="form-control">
                    <input type="text" name="icon" value="<?= $info->icon; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">JUDUL INFORMASI</label>
                    <input type="text" name="judul_informasi" value="<?= $info->judul_informasi; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">ISI INFORMASI</label>
                    <textarea type="text" name="isi_informasi" rows="3" class="form-control">
                    <?= $info->isi_informasi; ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            <?php form_close(); ?>

        <?php endforeach; ?>

        </div>
    <div class="col-6"></div>
</div>
</div>