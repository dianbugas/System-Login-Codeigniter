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
      <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newSubMenuModal">Add New User</a>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
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
<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- method="post" ketika input tidak terlihat di url -->
      <!-- action untuk mengarakan controller menu -->
      <form action="<?php base_url('user/users'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
          </div>
          <div class="form-group  ">
            <select name="menu_id" id="menu_id" class="form-control">
              <option value="">Select Menu</option>
              <?php foreach ($user as $u) : ?>
                <option value="<?= $u['id']; ?>"><?= $u['user']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
              <label class="form-check-label" for="is_active">
                Active?
              </label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>