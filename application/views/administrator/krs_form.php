<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-plus mr-2"></i> From Input Data <b>KRS</b>
                </div>

            <form action="<?= base_url('administrator/krs/tambah_krs_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">TAHUN AKADEMIK</label>
                    <input type="hidden" name="id_thn_akademik" class="form-control" value="<?= $id_thn_akademik; ?>">
                    <input type="hidden" name="id_krs" class="form-control" value="<?= $id_krs; ?>">

                    <input type="text" name="thn_akad_smt" class="form-control" value="<?= $thn_akad_smt. '/' .$semester; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">NIM MAHASISWA</label>
                    <input type="text" name="nim" class="form-control" value="<?= $nim; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">MATA KULIAH</label>
                    <?php 
                        $query = $this->db->query('SELECT kode_matakuliah, nama_matakuliah FROM matakuliah');

                        $dropdowns = $query->result();

                        foreach ($dropdowns as $dropdown) 
                        {
                            $dropDownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
                        }

                        echo form_dropdown('kode_matakuliah', $dropDownList, $kode_matakuliah, 'class="form-control" id="kode_matakuliah"');
                    ?>

                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <?= anchor('administrator/krs/krs_aksi','<div class="btn btn-danger">Kembali</div>'); ?>

            </form>
        </div>
    <div class="col-6"></div>
</div>
</div>