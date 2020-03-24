<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-edit mr-2"></i> From Update Mata Kuliah
    </div>

<div class="row">
            <div class="col-9">

            <?php foreach ($matakuliah as $mk) : ?>
                <form action="<?= base_url('administrator/matakuliah/update_aksi'); ?>" method="post">

                        <div class="form-group">
                            <label for="">Nama Mata Kuliah</label>
                            <input type="hidden" name="kode_matakuliah" class="form-control" value="<?= $mk->kode_matakuliah ?>">
                            <input type="text" name="nama_matakuliah" class="form-control" value="<?= $mk->nama_matakuliah ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="">SKS</label>
                            <select name="sks" class="form-control">
                                <option><?= $mk->sks ?></option>
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
                                <option><?= $mk->semester ?></option>
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
                                <option><?= $mk->nama_prodi ?></option>
                                <?php foreach ($prodi as $prd) : ?>
                                    <option value="<?= $prd->nama_prodi ?>"><?= $prd->nama_prodi; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>

                </form>
            <?php endforeach; ?>

            </div>
    <div class="col-3"></div>
    </div>

</div>    