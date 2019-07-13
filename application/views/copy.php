  <!-- Begin Page Content -->
  <div class="container-fluid">
  <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
      <div class="row">
          <div class="col-lg-8">
              <?= form_open_multipart('menu/edit'); ?>
              <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Menu</label>
                  <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email">
                  </div>
              </div>
          
              
      </div>
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->