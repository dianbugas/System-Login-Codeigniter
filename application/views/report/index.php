<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-10">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">PIC</th>
                                <th scope="col">Nama Mahasiswa</th>
                                <th scope="col">Semester</th>
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
                                    <td>
                                        <?php foreach ($semester as $s) { ?>
                                        <?php if ($s->id == $bs['semester_id']) {
                                                    echo $s->semester;
                                                }
                                            } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('report/laporan_pdf') ?>" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
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