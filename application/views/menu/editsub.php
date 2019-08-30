<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="" method='post'>
                <input type="hidden" name="id" value="#">
                <div class="form-group row">
                    <label for="menu_id" class="col-sm-2 col-form-label">Menu Id</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu_id" class="form-control" id="menu_id" value="#">
                        <small class="form-text text-danger"><?= form_error('menu_id'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-7">
                        <input type="text" name="title" class="form-control" id="title" value="#">
                        <small class="form-text text-danger"><?= form_error('title'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="url" class="col-sm-2 col-form-label">Url</label>
                    <div class="col-sm-7">
                        <input type="text" name="url" class="form-control" id="url" value="#">
                        <small class="form-text text-danger"><?= form_error('url'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                    <div class="col-sm-7">
                        <input type="text" name="icon" class="form-control" id="icon" value="#">
                        <small class="form-text text-danger"><?= form_error('icon'); ?></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="is_active" class="col-sm-2 col-form-label">Is Active</label>
                    <div class="col-sm-7">
                        <input type="text" name="is_active" class="form-control" id="is_active" value="#">
                        <small class="form-text text-danger"><?= form_error('is_active'); ?></small>
                    </div>
                </div>
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