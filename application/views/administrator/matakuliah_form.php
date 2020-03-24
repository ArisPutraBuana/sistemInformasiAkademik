<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Mata Kuliah
                </div>

            <form action="<?= base_url('administrator/matakuliah/tambah_matakuliah_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">Kode Mata Kuliah</label>
                    <input type="text" name="kode_matakuliah" placeholder="Masukan kode mata kuliah" class="form-control">
                        <?= form_error('kode_matakuliah','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Mata Kuliah</label>
                    <input type="text" name="nama_matakuliah" placeholder="Masukan nama mata kuliah" class="form-control">
                    <?= form_error('nama_matakuliah','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">SKS</label>
                    <select name="sks" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Program Studi</label>
                        <select name="nama_prodi" class="form-control">
                            <option value="">--Pilih Program Studi--</option>  
                            <?php foreach ($prodi as $prd) : ?>
                                <option value="<?= $prd->nama_prodi ?>"><?= $prd->nama_prodi ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>

                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            </form>
        </div>
    <div class="col-6"></div>
</div>
</div>