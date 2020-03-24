<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Update Tentang Kampus
                </div>

    <?php foreach ($tentang as $ttg) : ?>

            <form action="<?= base_url('administrator/tentang_kampus/update_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">SEJARAH</label>
                    <input type="hidden" name="id_tentang_kampus" class="form-control" value="<?= $ttg->id_tentang_kampus; ?>">
                    <input type="text" name="sejarah" class="form-control" value="<?= $ttg->sejarah; ?>">
                </div>
                <div class="form-group">
                    <label for="">VISI</label>
                    <input type="text" name="visi" class="form-control" value="<?= $ttg->visi; ?>">
                </div>
                <div class="form-group">
                    <label for="">MISI</label>
                    <input type="text" name="misi" class="form-control" value="<?= $ttg->misi; ?>">
                </div>
                
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            </form>

            <?php endforeach; ?> 


        </div>
    <div class="col-6"></div>
</div>
</div>