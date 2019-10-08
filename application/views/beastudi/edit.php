<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="" method='post'>
                <input type="hidden" name="id" value="<?= $beastudi['id']; ?>">
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu" class="form-control" id="menu" value="<?= $beastudi['nama']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu" class="form-control" id="menu" value="<?= $beastudi['jk']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="maxl col-sm-7">
                        <label class="radio inline">
                            <input type="radio" name="jk" id="jk" value="<?= $beastudi['jk']; ?>">
                            <span> Laki - Laki </span>
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="jk" id="jk" value="<?= $beastudi['jk']; ?>">
                            <span> Perempuan </span>
                        </label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu" class="form-control" id="menu" value="<?= $beastudi['semester']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Angkatan</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu" class="form-control" id="menu" value="<?= $beastudi['angkatan']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Program Studi</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu" class="form-control" id="menu" value="programstudi">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu" class="form-control" id="menu" value="kontribusi">
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
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