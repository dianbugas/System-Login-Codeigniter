<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg-10">
            <table class="table table-hover">
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
                    <?php foreach ($report as $rp) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $rp['nama']; ?></td>
                            <td><?= $rp['nama_mh']; ?></td>
                            <td><?= $rp['semester']; ?></td>
                            <td>
                                <a href="#" class="btn btn-danger btn-circle btn-sm">
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
<!-- /.container-fluid -->
</div>