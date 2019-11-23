<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile Donatur</h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card-body">
                <div class="table-responsive">
                    <?= form_error('dana', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <?= $this->session->flashdata('message'); ?>
                    <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newRoleModal">Tambah</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Donatur</th>
                                <th scope="col">Perusahaan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Dana</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($dana as $da) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $da['nama_donatur']; ?></td>
                                    <td><?= $da['perusahaan']; ?></td>
                                    <td><?= $da['alamat']; ?></td>
                                    <td>Rp <?= $da['dana']; ?></td>
                                    <td>
                                        <a href="<?= base_url(); ?>dana/edit/<?= $da['id']; ?>" class="badge badge-success">Edit</a>
                                        <a href="<?= base_url(); ?>dana/delete/<?= $da['id']; ?>" class="badge badge-danger">delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Tambah Data Dana</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- method="post" ketika input tidak terlihat di url -->
            <!-- action untuk mengarakan controller role -->
            <form action="<?= base_url('dana'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Donatur" name="nama_donatur" id="nama_donatur" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Perusahaan" name="perusahaan" id="perusahaan" />
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">Rp</span>
                            </div>
                            <input type="text" class="form-control" name="dana" id="rupiah" placeholder="Nominal Dana" aria-describedby="validationTooltipUsernamePrepend">
                            <small class="form-text text-danger"><?= form_error('dana'); ?></small>
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>