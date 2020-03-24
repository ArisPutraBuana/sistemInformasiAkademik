<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Update Identitas
                </div>

    <?php foreach ($identitas as $id) : ?>

            <form action="<?= base_url('administrator/identitas/update_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">JUDUL WEBSITE</label>
                    <input type="hidden" name="id_identitas" class="form-control" value="<?= $id->id_identitas ?>">
                    <input type="text" name="judul_website" class="form-control" value="<?= $id->judul_website ?>">
                </div>
                <div class="form-group">
                    <label for="">ALAMAT</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $id->alamat ?>">
                </div>
                <div class="form-group">
                    <label for="">EMAIL</label>
                    <input type="email" name="email" class="form-control" value="<?= $id->email ?>">
                </div>
                <div class="form-group">
                    <label for="">NO TELEPON</label>
                    <input type="text" name="telp" class="form-control" value="<?= $id->telp ?>">
                </div>
            
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            </form>

            <?php endforeach; ?> 


        </div>
    <div class="col-6"></div>
</div>
</div>