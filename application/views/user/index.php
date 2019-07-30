<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <!-- tombol flasdata erorr or succes -->
          <div class="row">
            <div class="col-lg-8">
              <?= $this->session->flashdata('message'); ?>
            </div>
          </div>

          <div class="card mb-3 col-lg-8">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $user['name']; ?></h5>
                  <p class="card-text"><?= $user['email']; ?></p>
                  <p class="card-text"><small class="text-muted">Terdaftar <?= date('d F Y', $user['date_created']); ?></small></p>
                </div>
                <div class="form-file row justify-content-end">
                  <div class="col-md-9">
                    <a href="<?= base_url(); ?>user/edit/<?= $user['id']; ?>" class="btn btn-success">Edit</a>
                  </div>
                </div>
              </div> 
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
  