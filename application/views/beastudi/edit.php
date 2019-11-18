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
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    <?php
                                        $query = $this->db->query("SELECT * FROM pic");
                                        foreach ($query->result() as $p) : ?>
                                        <option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text- text-danger"><?= form_error('menu_id'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-7">
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" value="<?= $bes->nama_mh ?>">
                                <small class="form-text- text-danger"><?= form_error('nama'); ?></small>
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
                                    <small class="form-text- text-danger"><?= form_error('jk'); ?></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Semester</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="semester" id="semester">
                                    <?php foreach ($semester as $sem) : ?>
                                        <?php if ($sem == $semester['semester']) : ?>
                                            <option value="<?= $sem; ?>" selected><?= $sem; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $sem; ?>"><?= $sem; ?></option>
                                        <?php endif; ?>
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
                                    <?php foreach ($jurusan as $bes) : ?>
                                        <?php if ($bes == $jurusan['programstudi']) : ?>
                                            <option value="<?= $bes; ?>" selected><?= $bes; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $bes; ?>"><?= $bes; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text- text-danger"><?= form_error('programstudi'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu" class="col-sm-3 col-form-label">Kontribusi</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="kontribusi" id="kontribusi">
                                    <?php foreach ($kontribusi as $kon) : ?>
                                        <?php if ($kon == $kontribusi['kontribusi']) : ?>
                                            <option value="<?= $kon; ?>" selected><?= $kon; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $kon; ?>"><?= $kon; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <small class="form-text- text-danger"><?= form_error('kontribusi'); ?></small>
                            </div>
                        </div>
                        <div class="form-file row justify-content-end">
                            <div class="col-sm-9">
                                <button type="submit" name="edit" id="edit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>