<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <form action="" method='post'>
                <input type="hidden" name="id" value="<?= $subMenu['id']; ?>">
                <div class="form-group row">
                    <label for="menu_id" class="col-sm-2 col-form-label">Menu Id</label>
                    <div class="col-sm-7">
                        <input type="text" name="menu_id" class="form-control" id="menu_id" value="<?= $menu['menu_id']; ?>">
                        <small class="form-text text-danger"><?= form_error('menu_id'); ?></small>
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