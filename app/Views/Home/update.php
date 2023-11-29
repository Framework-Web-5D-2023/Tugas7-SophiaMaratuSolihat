<?php echo $this->extend("templates/header"); ?> 

<?= $this->section("content"); ?>
<div class="container">
  <?php $session = session(); ?>
  <?php if ($session->getFlashdata("success")) : ?>
    <div class="alert alert-success" role="alert">
      <?= $session->getFlashdata("success"); ?>
    </div>
  <?php endif; ?>
  <?php if ($session->getFlashdata("error")) : ?>
    <div class="alert alert-danger" role="alert">
      <?= $session->getFlashdata("error"); ?>
    </div>
  <?php endif; ?>
  <div class="my-3">
    <h1>Update data</h1>
  </div>
  <?php if (session('validation')) : ?>
    <div class="alert alert-danger alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <ul>
        <?php foreach (session('validation')->getErrors() as $error) : ?>
          <li><?= esc($error) ?></li>
        <?php endforeach ?>
      </ul>
    </div>
  <?php endif ?>
  
  <form action="<?= base_url("/updateMahasiswa/update/" . $mahasiswa["id"]); ?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control <?= ($validation && $validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="Inputan Nama.." value="<?= $mahasiswa["nama"]; ?>">
          <div class="invalid-feedback">
            <?= ($validation && $validation->hasError('nama')) ? 'is-invalid' : ''; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="npm" class="form-label">Npm</label>
          <input type="text" class="form-control <?= ($validation && $validation->hasError('npm')) ? 'is-invalid' : ''; ?>" id="npm" name="npm" placeholder="Inputan NPM.." value="<?= $mahasiswa["npm"]; ?>">
          <div class="invalid-feedback">
            <?= ($validation && $validation->hasError('npm')) ? 'is-invalid' : ''; ?>
          </div>
        </div>
        <div class="mb-3">
          <label for="prodi" class="form-label">Prodi</label>
          <input type="text" class="form-control <?= ($validation && $validation->hasError('prodi')) ? 'is-invalid' : ''; ?>" id="prodi" name="prodi" placeholder="Inputan Prodi.." value="<?= $mahasiswa["prodi"]; ?>">
          <div class="invalid-feedback">
            <?= ($validation && $validation->hasError('prodi')) ? 'is-invalid' : ''; ?>
          </div>
        </div>
        <div class="mb-3">
    <?php if (!empty($mahasiswa["image"])) : ?>
        <img src="<?= base_url("image/" . $mahasiswa["image"]); ?>" class="img-fluid rounded" style="width: 80px; height: 100px;" alt="">
    <?php endif; ?>
    <input type="file" class="form-control <?= ($validation && $validation->hasError('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" placeholder="Inputan Prodi..">
    <div class="invalid-feedback">
        <?= ($validation && $validation->hasError('image')) ? $validation->getError('image') : ''; ?>
    </div>
</div>
        <!-- Sisanya sesuaikan dengan pola yang sama -->
      </div>
    </div>
    <div>
    <button class="btn btn-success" type="submit">Update</button>
    </div>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>