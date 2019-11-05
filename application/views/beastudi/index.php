<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-12">
            <?= form_error('beastudi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-2" data-toggle="modal" data-target="#newRoleModal">Tambah</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">PIC</th>
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
                            <td><?= $bs['nama_mh']; ?></td>
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
            <form action="<?= base_url('beastudi/insert'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">PIC</option>
                            <?php
                            $query = $this->db->query("SELECT * FROM pic");
                            foreach ($query->result() as $p) : ?>
                                <option value="<?= $p->id; ?>"><?= $p->nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label class="radio inline">
                            <input type="radio" name="jk" value="Laki-Laki" checked>
                            <span> Laki - Laki </span>
                        </label>
                        <label class="radio inline">
                            <input type="radio" name="jk" value="Perempuan">
                            <span> Perempuan </span>
                        </label>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="semester" value="semester" id="semester">
                            <option class="hidden" selected disabled>Semester</option>
                            <option>Satu</option>
                            <option>Dua</option>
                            <option>Tiga</option>
                            <option>Empat</option>
                            <option>Lima</option>
                            <option>Enam</option>
                            <option>Tujuh</option>
                            <option>Delapan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" maxlength="4" class="form-control" placeholder="Angkatan" id="angkatan" name="angkatan" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="programstudi" id="programstudi">
                            <option>Pilih Program Studi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="kontribusi" name="kontribusi">
                            <option>Pilih Jenis Kontribusi</option>
                            <option value="Content">Content</option>
                            <option value="Upload Content">Upload Content</option>
                            <option value="Website Developer">Website Developer</option>
                            <option value="Design Graphic">Design Graphic</option>
                            <option value="Video Content">Video Content</option>
                            <option value="LPPM">LPPM</option>
                            <option value="Inkubator">Inkubator</option>
                            <option value="LPMI">LPMI</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>