<!-- Begin Page Content -->
<div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Menu</th>
      <th scope="col">Url</th>
      <th scope="col">Icon</th>
      <th scope="col">Active</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    <?php foreach ($subMenu as $sm) : ?>
    <tr>
      <th scope="row"><?= $i++; ?></th>
      <td><?= $sm['title']; ?></td>
      <td><?= $sm['menu']; ?></td>
      <td><?= $sm['url']; ?></td>
      <td><?= $sm['icon']; ?></td>
      <td><?= $sm['is_active']; ?></td>
      <td>
      <a href="#" class="badge badge-success">Edit</a>
      <a href="#" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- method="post" ketika input tidak terlihat di url -->
      <!-- action untuk mengarakan controller menu -->
      <form action="<?php base_url('menu'); ?>" method="post"> 
      <div class="modal-body">
      <div class="form-group">
    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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

