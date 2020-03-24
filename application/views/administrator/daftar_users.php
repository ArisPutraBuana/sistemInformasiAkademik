<div class="container-fluid">

<div class="alert alert-success" role="alert">
    <i class="fas fa-university mr-2"></i> Daftar Users
    </div>

    <?= $this->session->flashdata('pesan'); ?>

    <?= anchor('administrator/users/tambah_users', '<button class="btn btn-primary"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Users</button>'); ?>

    <table class="table table-bordered table-striped table-hover mt-4">
        <tr>
         <th width="20px">NO</th>
         <th>USERNAME</th>
         <th>EMAIL</th>
         <th>LEVEL</th>
         <th>BLOKIR</th>
         <th colspan="2" class="text-center">AKSI</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td width="20px"><?= $no; ?></td>
                <td><?= $user->username; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->level; ?></td>
                <td><?= $user->blokir; ?></td>
                <td width="20px"><?= anchor('administrator/users/update/'.$user->id, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"><i></div>'); ?></td>

                <td width="20px"><?= anchor('administrator/users/delete/'.$user->id, '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"><i></div>'); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>

</div>