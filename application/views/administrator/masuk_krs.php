<div class="container-fluid">
    <div class="row mt-3">
            <div class="col-6">

                <div class="alert alert-success" role="alert">
                    <i class="fas fa-university mr-2"></i> Form Masuk Halaman <b>KRS</b>
                </div>

            <?= $this->session->flashdata('pesan'); ?>

            <form action="<?= base_url('administrator/krs/krs_aksi'); ?>" method="post">

                <div class="form-group">
                    <label for="">NIM</label>
                    <input type="text" name="nim" placeholder="Masukan Nim Mahasiswa" class="form-control">
                        <?= form_error('nim','<small class="text-danger ml-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="">Tahun Akademik & Semester</label>

                   <?php 
                        $query = $this->db->query('SELECT id_thn_akademik, semester,CONCAT(tahun_akademik, "/")
                        AS thn_semester FROM tahun_akademik');

                        $dropdowns = $query->result();

                        foreach ($dropdowns as $dropdown) 
                        {
                            if ($dropdown->semester == 1) 
                            {
                                $tampilSemester = "Ganjil";
                            } else {
                                $tampilSemester = "Genap";
                            }

                            $dropDownList[$dropdown->id_thn_akademik] = $dropdown->thn_semester . " " . $tampilSemester;
                        }
                            echo form_dropdown('id_thn_akademik', $dropDownList, '', 'class="form-control" id="$id_thn_akademik"');
                   ?>

                </div>

                <button type="submit" class="btn btn-primary mb-5">Proses</button>

            </form>
        </div>
    <div class="col-6"></div>
</div>
</div>