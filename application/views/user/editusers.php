<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($users as $us) { ?>
                <form action="<?= base_url() . 'admin/update'; ?>" method='post'>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $us->email ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="<?= $us->name ?>" readonly>
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Gambar</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $us->image ?>" class="img-thumbnail">
                                </div>
                                <!-- <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" value="<?= $user['image']; ?>" readonly>
                                <label class="custom-file-label" for="image"><?= $user['image']; ?>"</label>
                            </div>
                        </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Role Id</label>
                        <div class="col-sm-10">
                            <select name="pic_id" id="pic_id" class="form-control">
                                <?php
                                    $query = $this->db->query("SELECT * FROM user_role");
                                    foreach ($query->result() as $p) : ?>
                                    <?php if ($p == $query->result()) : ?>
                                        <option value="<?= $p->id; ?>" selected><?= $p->role; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $p->id; ?>"><?= $p->role; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            <!-- <input type="text" class="form-control" id="role_id" name="role_id" value="<?= $us->role_id ?>"> -->
                            <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Verifikasi Aktif</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="is_active" name="is_active" value="<?= $us->is_active ?>" readonly>
                            <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-file row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->