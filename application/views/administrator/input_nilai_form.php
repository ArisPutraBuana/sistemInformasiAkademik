<div class="container-fluid">

<div class="row">
        <div class="col-6">

    <div class="alert alert-success" role="alert">
        <i class="fa fa-university mb-2"></i> From Masuk Halaman Input Nilai
    </div>


        <form action="<?= base_url('administrator/nilai/input_nilai_aksi'); ?>" method="post">
            <div class="form-group">
                <label for="">TAHUN AKADEMIK ( SEMESTER ) </label>

                <?php 
                    $query = $this->db->query('SELECT id_thn_akademik, semester, CONCAT(tahun_akademik,"/") AS ta_semester FROM tahun_akademik');

                    $dropdowns = $query->result();
                    
                    foreach($dropdowns as $dropdown)
                    {
                        if($dropdown->semester === 1)
                        {
                            $tampilSemester = "Ganjil";
                        } else {
                            $tampilSemester = "Genap";
                        }

                        $dropDownList[$dropdown->id_thn_akademik] = $dropdown->ta_semester ." ".$tampilSemester;
                    }

                    echo form_dropdown('id_thn_akademik', $dropDownList,'','class="form-control"'); ?>
            </div>

            <div class="form-group">
                <label for="">KODE MATA KULIAH</label>
                <input type="text" name="kode_matakuliah" class="form-control" placeholder="Masukan Kode Mata kuliah">
            </div>

            <button type="submit" class="btn btn-primary">Proses</button>

        </form>

        </div>
        <div class="col-6"></div>
    </div>
</div>