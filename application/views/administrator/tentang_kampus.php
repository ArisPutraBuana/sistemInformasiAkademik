<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Tentang Kampus
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-bordered table-striped table-hover mt-4">
        <tr>
         <th width="20px">NO</th>
         <th>SEJARAH</th>
         <th>VISI</th>
         <th>MISI</th>
         <th class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($tentang as $ttg) : ?>
            <tr>
                <td width="20px"><?= $no; ?></td>
                <td><?= $ttg->sejarah; ?></td>
                <td><?= $ttg->visi; ?></td>
                <td><?= $ttg->misi; ?></td>
                <td width="20px"><?= anchor('administrator/tentang_kampus/update/'.$ttg->id_tentang_kampus, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>