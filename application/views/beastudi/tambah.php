<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="" method='post'>
                <input type="hidden" name="id">
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-7">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                        <small class="form-text text-danger"><?= form_error('nama_mh'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="jk" value="jk" id="jk">
                            <option class="hidden" selected disabled>Jenis Kelamin</option>
                            <option>Laki-Laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Semester</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="semester" value="semester" id="semester">
                            <option class="hidden" selected disabled>Semester</option>
                            <option>1 Satu</option>
                            <option>2 Dua</option>
                            <option>3 Tiga</option>
                            <option>4 Empat</option>
                            <option>5 Lima</option>
                            <option>6 Enam</option>
                            <option>7 Tujuh</option>
                            <option>8 Delapan</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Angkatan</label>
                    <div class="col-sm-7">
                        <input type="number" maxlength="4" class="form-control" placeholder="Angkatan" value="angkatan" id="angkatan" name="angkatan" />
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Program Studi</label>
                    <div class="col-sm-7">
                        <select class="form-control">
                            <option class="hidden" id="programstudi" name="programstudi" selected disabled>Program Studi</option>
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                        </select>
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="kontribusi" name="kontribusi">
                            <option class="hidden" selected disabled>Jenis Kontribusi</option>
                            <?php foreach ($beastudi as $beas) : ?>
                                <option value="<?= $beas->kontribusi; ?>"><?php echo $beas->kontribusi; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('menu'); ?></small>
                    </div>
                </div>
                <div class="form-file row justify-content-end">
                    <div class="col-sm-9">
                        <button type="submit" name="edit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->