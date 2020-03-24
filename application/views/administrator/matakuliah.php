<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Mata kuliah
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/matakuliah/tambah_matakuliah', '<button class="btn btn-primary"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Mata kuliah</button>'); ?>

    <table class="table table-bordered table-striped table-hover mt-3">
        <tr>
            <th>NO</th>
            <th>KODE MATA KULIAH</th>
            <th>NAMA MATA KULIAH</th>
            <th>PROGRAM STUDI</th>
            <th colspan="3" class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($matakuliah as $mk) : ?>
            <tr>
                <td width="20px"><?= $no ?></td>
                <td><?= $mk->kode_matakuliah ?></td>
                <td><?= $mk->nama_matakuliah ?></td>
                <td><?= $mk->nama_prodi ?></td>
                <td width="20px"><?= anchor('administrator/matakuliah/detail/'.$mk->kode_matakuliah, '<div class="btn btn-sm btn-info"><i class="fa fa-search-plus"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/matakuliah/update/'.$mk->kode_matakuliah, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/matakuliah/delete/'.$mk->kode_matakuliah, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>