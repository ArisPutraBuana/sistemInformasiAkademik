<div class="container-fluid">
<div class="col-6">
        <div class="alert alert-success">
            <i class="fas fa-comment-dots mr-2"></i> FROM MEMBALAS PESAN USERS
        </div>

            <?php foreach ($hubungi as $hub) : ?>
                <form action="<?= base_url('administrator/hubungi_kami/kirim_email_aksi'); ?>" method="post">
                    <div class="form-group">
                        <label for="">EMAIL</label>
                        <input type="hidden" name="id_hubungi" value="<?= $hub->id_hubungi; ?>" class="form-control">
                        <input type="email" name="email" value="<?= $hub->email; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">SUBJECT</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">PESAN</label>
                        <textarea type="text" name="pesan" rows="4" class="form-control"></textarea>
                    </div>
                
                <button type="submit" class="btn btn-primary">Kirim</button>

                </form>
            <?php endforeach; ?>
</div>

    <div class="col-6"></div>
</div>