<div class="container-fluid">
<div class="row">
    <div class="col-6">
    <div class="alert alert-success">
        <i class="fa fa-university mr-2"></i> FORM MASUK HALAMAN TRANSKRIP NILAI
    </div>

    <form action="<?=  base_url('administrator/transkrip_nilai/buat_transkrip_aksi'); ?>" method="post">
        <div class="form-group">
            <label for="">NIM</label>
            <input type="text" name="nim" class="form-control" placeholder="Masukan NIM Mahasiswa">
            <?= form_error('nim','<small class="text-danger ml-2">','</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary">Proses</button>

    </form>

    <div class="col-6"></div>

    </div>
    </div>
</div>