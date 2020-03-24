<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Program Studi
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/prodi/tambah_prodi', '<button class="btn btn-primary"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Program Studi</button>'); ?>

    <table class="table table-bordered table-striped table-hover mt-3">
        <tr>
            <th>NO</th>
            <th>KODE PRODI</th>
            <th>NAMA PRODI</th>
            <th>NAMA JURUSAN</th>
            <th colspan="2" class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($prodi as $prd) : ?>
            <tr>
                <td width="20px"><?= $no ?></td>
                <td><?= $prd->kode_prodi ?></td>
                <td><?= $prd->nama_prodi ?></td>
                <td><?= $prd->nama_jurusan ?></td>
                <td width="20px"><?= anchor('administrator/prodi/update/'.$prd->id_prodi, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/prodi/delete/'.$prd->id_prodi, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>