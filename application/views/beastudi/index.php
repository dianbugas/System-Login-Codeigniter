<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('pic', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newRoleModal">Tambah</a>
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
                                <a href="<?= base_url(); ?>beastudi/edit/<?= $bs['id']; ?>" class="badge badge-success">Edit</a>
                                <a href="<?= base_url(); ?>beastudi/delete/<?= $bs['id']; ?>" class="badge badge-danger">delete</a>
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
            <form action="<?= base_url('beastudi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                        <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                    </div>
                    <div class="form-group">
                        <div class="maxl">
                            <label class="radio inline">
                                <input type="radio" name="jk" value="jk" id="jk" checked>
                                <span> Laki - Laki </span>
                            </label>
                            <label class="radio inline">
                                <input type="radio" name="jk" value="jk" id="jk">
                                <span> Perempuan </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="semester" value="semester" id="semester">
                            <option class="hidden" selected disabled>Semester</option>
                            <option>1 Satu</option>
                            <option>2 Dua</option>
                            <option>3 Tiga</option>
                            <option>4 Empat</option>
                            <option>5 Lima</option>
                            <option>6 Enam</option>
                            <option>7 Tujuh</option>
                            <option>8 Delapan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" maxlength="4" class="form-control" placeholder="Angkatan" value="angkatan" id="angkatan" name="angkatan" />
                    </div>
                    <div class="form-group">
                        <select class="form-control">
                            <option class="hidden" id="programstudi" name="programstudi" selected disabled>Program Studi</option>
                            <option>Teknik Informatika</option>
                            <option>Sistem Informasi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="kontribusi" name="kontribusi">
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