<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Dosen
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/dosen/tambah_dosen', '<button class="btn btn-primary"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Dosen</button>'); ?>

    <table class="table table-bordered table-striped table-hover mt-3">
        <tr>
            <th>NO</th>
            <th>NIDN</th>
            <th>NAMA DOSEN</th>
            <th>ALAMAT</th>
            <th colspan="3" class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($dosen as $dsn) : ?>
            <tr>
                <td width="20px"><?= $no; ?></td>
                <td><?= $dsn->nidn; ?></td>
                <td><?= $dsn->nama_dosen; ?></td>
                <td><?= $dsn->alamat; ?></td>
                <td width="20px"><?= anchor('administrator/dosen/detail/'.$dsn->nidn, '<div class="btn btn-sm btn-info"><i class="fa fa-search-plus"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/dosen/update/'.$dsn->nidn, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/dosen/delete/'.$dsn->nidn, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>