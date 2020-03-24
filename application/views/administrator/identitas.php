<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Identitas Website
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <table class="table table-bordered table-striped table-hover mt-4">
        <tr>
         <th width="20px">NO</th>
         <th>JUDUL WEBSITE</th>
         <th>ALAMAT</th>
         <th>EMAIL</th>
         <th>NO TELEPON</th>
         <th class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($identitas as $id) : ?>
            <tr>
                <td width="20px"><?= $no; ?></td>
                <td><?= $id->judul_website; ?></td>
                <td><?= $id->alamat; ?></td>
                <td><?= $id->email; ?></td>
                <td><?= $id->telp; ?></td>
                <td width="20px"><?= anchor('administrator/identitas/update/'.$id->id_identitas, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>