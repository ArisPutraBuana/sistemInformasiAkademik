<div class="container-fluid">

    <div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Tahun Akademik
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/tahun_akademik/tambah_tahun_akademik', '<button class="btn btn-primary"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Tahun Akademik</button>'); ?>

    <table class="table table-bordered table-striped table-hover mt-3">
        <tr>
            <th>NO</th>
            <th>TAHUN AKADEMIK</th>
            <th>SEMESTER</th>
            <th>STATUS</th>
            <th colspan="2" class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($tahun_akademik as $ak) : ?>
            <tr>
                <td width="20px"><?= $no ?></td>
                <td><?= $ak->tahun_akademik ?></td>
                <td><?= $ak->semester ?></td>
                <td><?= $ak->status ?></td>
                <td width="20px"><?= anchor('administrator/tahun_akademik/update/'.$ak->id_thn_akademik, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/tahun_akademik/delete/'.$ak->id_thn_akademik, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>