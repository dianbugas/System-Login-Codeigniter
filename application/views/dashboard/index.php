<div class="container">
    <div class="row mt-4">
        <div class="col md-8">
            <div class="card-deck">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div>
                                        <a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kontribusi</a>
                                    </div>
                                    <div>
                                        <a href="<?= base_url(); ?>beastudi/" class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $total_beastudi; ?>
                                            Beastudi
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div>
                                        <a href="<?= base_url(); ?>report/" class="text-xs font-weight-bold text-info text-uppercase mb-1">Report</a>
                                    </div>
                                    <div>
                                        <a href="<?= base_url(); ?>report/" class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $total_beastudi; ?>
                                            Report
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div>
                                        <a href="<?= base_url(); ?>pic/" class="text-xs font-weight-bold text-warning text-uppercase mb-1">PIC</a>
                                    </div>
                                    <div>
                                        <a href="<?= base_url(); ?>pic/" class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?= $total_pic; ?>
                                            PIC
                                        </a>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="<?= base_url(); ?>pic/">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?= form_error('beastudi', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <h6 class="m-0 font-weight-bold text-primary">Daftar Nama Mahasiswa Beastudi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <td>
                                    <?php foreach ($semester as $s) { ?>
                                    <?php if ($s->id == $bs['semester_id']) {
                                                echo $s->semester;
                                            }
                                        } ?>
                                </td>
                                <td><?= $bs['angkatan']; ?></td>
                                <td>
                                    <?php foreach ($programstudi as $k) { ?>
                                    <?php if ($k->id == $bs['programstudi_id']) {
                                                echo $k->programstudi;
                                            }
                                        } ?>
                                </td>
                                <td>
                                    <?php foreach ($kontribusi as $k) { ?>
                                    <?php if ($k->id == $bs['kontribusi_id']) {
                                                echo $k->kontribusi;
                                            }
                                        } ?>
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
<!-- End of Main Content -->