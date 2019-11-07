<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="modal-body">
                <form action="<?= base_url('beastudi/update'); ?>" method='post'>
                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">PIC</label>
                        <div class="col-sm-7">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value=""><?= $beastudi['pic_id']; ?></option>
                                <?php
                                $query = $this->db->query("SELECT * FROM pic");
                                foreach ($query->result() as $p) : ?>
                                    <option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= $beastudi['nama_mh']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label class="radio inline">
                                    <input type="radio" name="jk" value="Laki-Laki" checked>
                                    <span> Laki - Laki </span>
                                </label>
                                <label class="radio inline">
                                    <input type="radio" name="jk" value="Perempuan">
                                    <span> Perempuan </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">Semester</label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <select class="form-control" name="semester" value="semester" id="semester">
                                    <option class="hidden" selected disabled><?= $beastudi['semester']; ?></option>
                                    <option>Satu</option>
                                    <option>Dua</option>
                                    <option>Tiga</option>
                                    <option>Empat</option>
                                    <option>Lima</option>
                                    <option>Enam</option>
                                    <option>Tujuh</option>
                                    <option>Delapan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">Angkatan</label>
                        <div class="col-sm-7">
                            <input type="number" maxlength="4" class="form-control" placeholder="Angkatan" id="angkatan" name="angkatan" value="<?= $beastudi['angkatan']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">Program Studi</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="programstudi" id="programstudi">
                                <option><?= $beastudi['programstudi']; ?></option>
                                <option value="Teknik Informatika">Teknik Informatika</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="kontribusi" name="kontribusi">
                                <option><?= $beastudi['kontribusi']; ?></option>
                                <option value="Content">Content</option>
                                <option value="Upload Content">Upload Content</option>
                                <option value="Website Developer">Website Developer</option>
                                <option value="Design Graphic">Design Graphic</option>
                                <option value="Video Content">Video Content</option>
                                <option value="LPPM">LPPM</option>
                                <option value="Inkubator">Inkubator</option>
                                <option value="LPMI">LPMI</option>
                            </select>
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
</div>
</div>