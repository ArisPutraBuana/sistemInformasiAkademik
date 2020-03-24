<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Jurusan
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/jurusan/input', '<button class="btn btn-primary"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Jurusan</button>'); ?>

    <table class="table table-bordered table-striped table-hover mt-3">
        <tr>
            <th>NO</th>
            <th>KODE JURUSAN</th>
            <th>NAMA JURUSAN</th>
            <th colspan="2" class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($jurusan as $jrs) : ?>
            <tr>
                <td width="20px"><?= $no ?></td>
                <td><?= $jrs->kode_jurusan ?></td>
                <td><?= $jrs->nama_jurusan ?></td>
                <td width="20px"><?= anchor('administrator/jurusan/update/'.$jrs->id_jurusan, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/jurusan/delete/'.$jrs->id_jurusan, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>