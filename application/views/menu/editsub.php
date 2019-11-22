<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="modal-body">
                <?php foreach ($submenu as $sub) { ?>
                    <form action="<?= base_url() . 'menu/update'; ?>" method="post">
                        <div class="form-group row">
                            <input type="hidden" name="id" value="<?= $sub->id ?>">
                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-7">
                                <input type="text" name="title" class="form-control" id="title" value="<?= $sub->title ?>">
                                <small class="form-text text-danger"><?= form_error('title'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="menu_id" class="col-sm-2 col-form-label">Menu</label>
                            <div class="col-sm-7">
                                <select name="menu_id" id="menu_id" class="form-control">
                                    <?php
                                        $query = $this->db->query("SELECT * FROM user_menu");
                                        foreach ($query->result() as $p) : ?>
                                        <?php if ($p == $query->result()) : ?>
                                            <option value="<?= $p->id; ?>" selected><?= $p->menu; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $p->id; ?>"><?= $p->menu; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="url" class="col-sm-2 col-form-label">Url</label>
                            <div class="col-sm-7">
                                <input type="text" name="url" class="form-control" id="url" value="<?= $sub->url ?>">
                                <small class="form-text text-danger"><?= form_error('url'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-7">
                                <input type="text" name="icon" class="form-control" id="icon" value="<?= $sub->icon ?>">
                                <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
                            <div class="col-sm-7">
                                <input type="text" name="is_active" class="form-control" id="is_active" value="<?= $sub->is_active ?>">
                                <small class="form-text text-danger"><?= form_error('is_active'); ?></small>
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
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->