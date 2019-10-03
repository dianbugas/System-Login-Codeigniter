<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('pic', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newRoleModal">Tambah Data Pic</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Angkatan</th>
                        <th scope="col">Program Studi</th>
                        <th scope="col">Kontribusi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($beastudi as $bs) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $bs['nama']; ?></td>
                            <td><?= $bs['jk']; ?></td>
                            <td><?= $bs['semester']; ?></td>
                            <td><?= $bs['angkatan']; ?></td>
                            <td><?= $bs['programstudi']; ?></td>
                            <td><?= $bs['kontribusi']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success">Edit</a>
                                <a href="#" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="register-heading">Identitas Mahasiswa Beastudi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- method="post" ketika input tidak terlihat di url -->
            <!-- action untuk mengarakan controller role -->
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" value="" />
                    </div>
                    <div class="form-group">
                        <div class="maxl">
                            <label class="radio inline">
                                <input type="radio" name="gender" value="male" checked>
                                <span> Laki - Laki </span>
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="gender" value="female">
                                <span> Perempuan </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Semester" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Angkatan" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Program Studi" value="" />
                    </div>

                    <div class="form-group">
                        <select class="form-control">
                            <option class="hidden" selected disabled>Jenis Kontribusi</option>
                            <option>Content</option>
                            <option>Upload Content</option>
                            <option>Website Developer</option>
                            <option>Design Graphic</option>
                            <option>Video Content</option>
                            <option>LPPM</option>
                            <option>Inkubator</option>
                            <option>LPMI</option>
                        </select>
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
</div>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"></h1>
    <div class="container register">
        <div class="row">
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row register-form">
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
</div>