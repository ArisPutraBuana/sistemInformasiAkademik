<!-- Navbar Info awal -->
<nav class="navbar navbar-light bg-primary text-white" id="beranda">

<?php foreach ($identitas as $id) : ?>
    <a class="navbar-brand font-weight-bold ml-5"><?= $id->judul_website; ?></a>
    <span class="small mr-3"> <p class="d-inline mr-3 text-d text-white"><?= $id->alamat; ?></p> <p class="d-inline mr-3 text-white"><?= $id->email; ?></p> <p class="d-inline mr-3 text-white"><?= $id->telp; ?></p> </span>
<?php endforeach; ?>

</nav>
<!-- Navbar Info akhir -->

<!-- Navbar awal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto font-weight-bold">
      <li class="nav-item">
        <a class="nav-link ml-3" href="#beranda">BERANDA <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-3" href="#tentangKampus">TENTANG KAMPUS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-3" href="#informasiKampus">INFORMASI</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-3" href="#gallery">GALLERY</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-3" href="#kontak">KONTAK</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Navbar akhir -->

<!-- Slider awal -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner h-25">
    <div class="carousel-item active">
      <img src="<?= base_url('assets/img/1.jpg'); ?>" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/img/2.jpg'); ?>" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url('assets/img/3.jpg'); ?>" class="d-block w-100">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Slider akhir -->

<!-- Awal tentang kampus -->
<div class="card m-5" id="tentangKampus"> 
  <div class="card-header">
  <h5 class="text-center font-weight-bolder">TENTANG KAMPUS</h5>
  </div>
  <div class="card-body text-center">
    <p class="card-text p-2">
        <?php foreach ($tentang as $ttg) : ?>
          <?= word_limiter($ttg->sejarah,75); ?>
        <?php endforeach; ?>
    </p>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Selengkapnya ...
    </button>
  </div>
</div>
<!-- Akhir tentang kampus -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title ml-auto" id="exampleModalLabel"><strong>TENTANG KAMPUS</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body text-justify">

          <strong>SEJARAH STMIK Insan Pembangunan</strong> <br>
          <?php foreach ($tentang as $ttg) : ?>
              <?= $ttg->sejarah; ?>
            <?php endforeach; ?> <br><br>

           <strong>VISI STMIK Insan Pembangunan</strong> <br>
          <?php foreach ($tentang as $ttg) : ?>
              <?= $ttg->visi; ?>
            <?php endforeach; ?> <br><br>

            <strong>MISI STMIK Insan Pembangunan</strong> <br>
            <?php foreach ($tentang as $ttg) : ?>
                <?= $ttg->misi; ?>
              <?php endforeach; ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Awal Informasi kampus -->
<h5 class="text-center mb-5 font-weight-bolder" id="informasiKampus">INFORMASI KAMPUS</h5>
<div class="row ml-5">

<?php foreach ($informasi as $info) : ?>

  <div class="card text-center mr-4 mb-3" style="width: 18rem;">
    <span class="display-4 text-info mt-2"><i class="<?= $info->icon; ?>"></i></span>
    <div class="card-body">
      <h5 class="card-title"><?= $info->judul_informasi; ?></h5>
      <p class="card-text"><?= $info->isi_informasi; ?></p>
      <!-- <a href="#" class="btn btn-primary">Selengkapnya ...</a> -->
    </div>
  </div>

  <?php endforeach; ?>

</div>
<!-- Akhir Informasi kampus -->


<!-- Awal gallery -->
<h5 class="text-center mb-5 mt-3 font-weight-bolder" id="gallery">GALLERY</h5>
<div class="row ml-5 mr-5 mt-3">
 <div class="col-6">
    <div class="card" style="width: 37rem;">
      <img src="<?= base_url('assets/img/kerjasama.jpg'); ?>" class="card-img-top">
      <div class="card-body">
        <p class="card-text">Seminar Teknologi dan Informasi di STMIK Insan Pembangunan Bitung yang dilakukan pada bulan Agustus 2019</p>
      </div>
    </div>
 </div>

 <div class="col-6">
    <div class="card lg" style="width: 37rem;">
      <img src="<?= base_url('assets/img/workshop.jpg'); ?>" class="card-img-top">
      <div class="card-body">
        <p class="card-text">Workshop Kampus STMIK Insan Pembangunan dengan Tema Sister, Sinta, Siakad, dan Ecampus</p>
      </div>
    </div>
 </div>

</div>

<div class="row ml-5 mr-5 mt-3">

      <div class="col-6">
        <div class="card" style="width: 37rem;">
        <img src="<?= base_url('assets/img/kemanusian.jpeg'); ?>" class="card-img-top">
        <div class="card-body">
          <p class="card-text">Pemberian Bantuan Kemanusian kepada Masyarakat terdampak Banjir Banten Khususnya Kabupaten Tangerang</p>
        </div>
        </div>
      </div>
 <!-- akhir galley -->

 <!-- Awal kontak -->
    <div class="col-6">
        <div class="alert alert-primary text-center" id="kontak">
          <i class="fas fa-envelope-open-text mr-2"></i> HUBUNGI KAMI
        </div>

        <form action="<?= base_url('landing_page/kirim_pesan'); ?>" method="post">

        <?= $this->session->flashdata('pesan'); ?>

        <div class="form-group">
          <label for="">NAMA</label>
          <input type="text" name="nama" class="form-control">
          <?= form_error('nama','<small class="text-danger pl-2">','</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">EMAIL</label>
          <input type="email" name="email" class="form-control">
          <?= form_error('email','<small class="text-danger pl-2">','</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">PESAN</label>
          <textarea name="pesan" rows="3" class="form-control"></textarea>
          <?= form_error('pesan','<small class="text-danger pl-2">','</small>'); ?>
        </div>

        <button type="submit" class="btn btn-primary mb-5">Kirim</button>
        </form>
    </div>
</div>