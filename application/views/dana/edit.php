<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-6">
            <form action="" method='post'>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Nama Donatur</label>
                    <div class="col-sm-9">
                        <input type="text" name="nama_donatur" class="form-control" id="nama_donatur" value="<?= $dana['nama_donatur']; ?>">
                        <small class="form-text text-danger"><?= form_error('dana'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Perusahaan</label>
                    <div class="col-sm-9">
                        <input type="text" name="perusahaan" class="form-control" id="perusahaan" value="<?= $dana['perusahaan']; ?>">
                        <small class="form-text text-danger"><?= form_error('dana'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $dana['alamat']; ?>">
                        <small class="form-text text-danger"><?= form_error('dana'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Dana</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">Rp</span>
                            </div>
                            <input type="text" class="form-control" name="dana" id="rupiah" value="<?= $dana['dana']; ?>" placeholder="Nominal Dana" aria-describedby="validationTooltipUsernamePrepend">
                            <small class="form-text text-danger"><?= form_error('dana'); ?></small>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $dana['id']; ?>">
                <div class="form-file row justify-content-end">
                    <div class="col-sm-9">
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->