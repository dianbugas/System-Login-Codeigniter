<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="modal-body">
                <?php foreach ($beastudi as $bes) { ?>
                    <form action="<?= base_url() . 'beastudi/update'; ?>" method='post'>
                        <input type="hidden" name="id" value="<?= $bes->id ?>">
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">PIC</label>
                            <div class="col-sm-7">
                                <select name="pic_id" id="pic_id" class="form-control">
                                    <?php
                                        $query = $this->db->query("SELECT * FROM pic")->result();
                                        foreach ($query as $p) : ?>
                                        <option <?php if ($p->id == $bes->pic_id) {
                                                            echo 'selected';
                                                        } ?> value="<?= $p->id; ?>"><?= $p->nama; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text- text-danger"><?= form_error('menu_id'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" name="nama_mh" class="form-control" id="nama_mh" placeholder="Nama Lengkap" value="<?= $bes->nama_mh ?>">
                                <small class="form-text- text-danger"><?= form_error('nama_mh'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for=""><input type="radio" name="jk" value="Laki-Laki" <?= $bes->jk == 'Laki-Laki' ? 'checked' : null; ?>> Laki-Laki</label>
                                    <label for=""><input type="radio" name="jk" value="Perempuan" <?= ($bes->jk == 'Perempuan') ? 'checked' : ''; ?>> Perempuan</label>
                                    <small class="form-text- text-danger"><?= form_error('jk'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="semester" id="semester">
                                    <?php foreach ($semester as $s) : ?>
                                        <option <?= $s->id == $bes->semester_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->semester; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text- text-danger"><?= form_error('semester'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Angkatan</label>
                            <div class="col-sm-7">

                                <input type="number" maxlength="4" class="form-control" placeholder="Angkatan" id="angkatan" name="angkatan" value="<?= $bes->angkatan ?>">
                                <small class="form-text- text-danger"><?= form_error('angkatan'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Program Studi</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="programstudi" id="programstudi">
                                    <?php foreach ($programstudi as $s) : ?>
                                        <option <?= $s->id == $bes->programstudi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->programstudi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text- text-danger"><?= form_error('programstudi'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="kontribusi" id="kontribusi">
                                    <?php foreach ($kontribusi as $s) : ?>
                                        <option <?= $s->id == $bes->kontribusi_id ? 'selected' : null; ?> value="<?= $s->id; ?>"><?= $s->kontribusi; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text- text-danger"><?= form_error('kontribusi'); ?></small>
                            </div>
                        </div>
                        <div class="form-file row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>