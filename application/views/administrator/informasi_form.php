<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Informasi Kampus
                </div>

           <?= form_open_multipart('administrator/informasi/tambah_informasi_aksi'); ?>

                <div class="form-group">
                    <label for="">ICON</label>
                    <input type="text" name="icon" placeholder="Masukan Icon " class="form-control">
                        <?= form_error('icon','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">JUDUL INFORMASI</label>
                    <input type="text" name="judul_informasi" placeholder="Masukan Judul Informasi" class="form-control">
                    <?= form_error('judul_informasi','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">ISI INFORMASI</label>
                    <textarea type="text" name="isi_informasi" rows="3" class="form-control"></textarea>
                    <?= form_error('isi_informasi','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            <?php form_close(); ?>
        </div>
    <div class="col-6"></div>
</div>
</div>