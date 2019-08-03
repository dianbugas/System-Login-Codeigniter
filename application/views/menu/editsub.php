    <!-- Begin Page Content -->
    
    <div class="container-fluid">
    <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <h3 style="color:red;">BAGIAN EDIT MASIH ERORR BELUM TERSIMPAN DI DATABASE yg lain fix</h3>
        <div class="row">
            <div class="col-lg-6">
                <?= form_open_multipart('menu/editsub'); ?>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="#">
                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-file row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
