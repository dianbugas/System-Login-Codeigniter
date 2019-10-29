<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="" method='post'>
                <div class="form-group row">
                    <label for="menu" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $pic['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('pic'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-2 col-form-label">Divisi</label>
                    <div class="col-sm-7">
                        <input type="text" name="divisi" class="form-control" id="divisi" value="<?= $pic['divisi']; ?>">
                        <small class="form-text text-danger"><?= form_error('pic'); ?></small>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $pic['id']; ?>">
                <div class="form-file row justify-content-end">
                    <div class="col-sm-10">
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