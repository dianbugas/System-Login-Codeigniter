<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <h5>Role : <?= $role['role']; ?></h5>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Menu</th>
            <th scope="col">Access</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <!-- $menu ambil dari controller admin baris 46  -->
          <?php foreach ($menu as $m) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $m['menu']; ?></td>
              <td>
                <div class="form-check">
                  <!-- check_accces akan menerima dua parameter 1 role idnya berapa ambil dari baris 9 dan menu idnya berapa dari baris ke 21 nenti di query // untuk helper-->
                  <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $m['id']; ?>">
                  <!-- baris 29 untuk jquery -->
                </div>
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