<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Update Users
                </div>

    <?php foreach ($user as $us) : ?>

            <form action="<?= base_url('administrator/users/update_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">USERNAME</label>
                    <input type="hidden" name="id" class="form-control" value="<?= $us->id ?>">
                    <input type="text" name="username" class="form-control" value="<?= $us->username ?>">
                </div>
                <div class="form-group">
                    <label for="">PASSWORD</label>
                    <input type="password" name="password" class="form-control" value="<?= $us->password; ?>">
                </div>
                <div class="form-group">
                    <label for="">EMAIL</label>
                    <input type="email" name="email" value="<?= $us->email; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">LEVEL</label>
                        <select name="level" class="form-control" value="<?= $us->level; ?>">

                            <?php if ($level == 'admin') { ?>
                                <option value="admin" selected>Admin</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            <?php } elseif ($level == 'mahasiswa') { ?>
                                <option value="admin">Admin</option>
                                <option value="mahasiswa" selected>Mahasiswa</option>
                            <?php } else { ?>    
                                <option value="admin">Admin</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            <?php } ?>    
                        </select>
                </div>
                <div class="form-group">
                    <label for="">BLOKIR</label>
                        <select name="blokir" class="form-control" value="<?= $us->blokir; ?>">

                            <?php if($blokir == 'Y') { ?>
                                <option value="Y" selected>Ya</option>
                                <option value="N">Tidak</option>
                            <?php } elseif($blokir == 'N') { ?>
                                <option value="Y">Ya</option>
                                <option value="N" selected>Tidak</option>
                            <?php } else { ?>    
                                <option value="Y">Ya</option>
                                <option value="N">Tidak</option>
                            <?php } ?>    
                        </select>
                </div>
        
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            </form>

            <?php endforeach; ?> 


        </div>
    <div class="col-6"></div>
</div>
</div>