<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> From Input Users
                </div>

            <form action="<?= base_url('administrator/users/tambah_users_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">USERNAME</label>
                    <input type="text" name="username" placeholder="Masukan Username" class="form-control">
                        <?= form_error('username','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">PASSWORD</label>
                    <input type="password" name="password" placeholder="Masukan Password" class="form-control">
                    <?= form_error('password','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">EMAIL</label>
                    <input type="email" name="email" placeholder="Masukan Email" class="form-control">
                        <?= form_error('email','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">LEVEL</label>
                        <select name="level" class="form-control">

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
                        <?= form_error('level','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">BLOKIR</label>
                        <select name="blokir" class="form-control">

                            <?php if ($blokir == 'Y') { ?>
                                <option value="Y" selected>Ya</option>
                                <option value="N">Tidak</option>
                            <?php } elseif ($blokir == 'N') { ?>
                                <option value="Y">Ya</option>
                                <option value="N" selected>Tidak</option>
                            <?php } else { ?>    
                                <option value="Y">Ya</option>
                                <option value="N">Tidak</option>
                            <?php } ?>    
                        </select>
                        <?= form_error('blokir','<small class="text-danger ml-3">','</small>'); ?>
                </div>
        
                <button type="submit" class="btn btn-primary mb-5">Simpan</button>

            </form>
        </div>
    <div class="col-6"></div>
</div>
</div>