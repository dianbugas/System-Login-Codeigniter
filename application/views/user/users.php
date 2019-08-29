<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <!-- untuk menampilkan erorr -->
      <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert"></div>
        <?= validation_errors(); ?>
      <?php endif; ?>
      <?= $this->session->flashdata('message'); ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">role</th>
            <th scope="col">Active</th>
            <th scope="col">Tanggal Daftar</th>
            <th scope="col">Image</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($users as $us) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $us['name']; ?></td>
              <td><?= $us['email']; ?></td>
              <td><?= $us['role_id']; ?></td>
              <td><?= $us['is_active']; ?></td>
              <td><?= date('d F Y', $user['date_created']); ?></td>
              <td><img src="<?= base_url('assets/img/profile/') . $us['image']; ?>" class="img-circle" alt="..." width="40" height="40"></td>
              <td>
                <a href="<?= base_url(); ?>admin/hapus/<?= $us['id']; ?>" class="badge badge-danger">delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>