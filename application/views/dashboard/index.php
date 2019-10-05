<div class="container">
    <div class="row mt-4">
        <div class="col md-8">
            <div class="card">
                <div class="site-index">
                    <div class="col-lg-12">
                        <h5 class="page-header" align="center">
                            <script type="text/javascript">
                                var mydate = new Date()
                                var year = mydate.getYear()
                                if (year < 1000)
                                    year += 1900
                                var day = mydate.getDay()
                                var month = mydate.getMonth()
                                var daym = mydate.getDate()
                                if (daym < 10)
                                    daym = "0" + daym
                                var dayarray = new
                                Array("Ahad", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu")
                                var montharray = new
                                Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember")
                                document.write("" + dayarray[day] + ", " + daym + " " + montharray[month] + " " + year + "")
                            </script>
                            <div id="clock">
                                <script type="text/javascript">
                                    function showTime() {
                                        var a_p = "";
                                        var today = new Date();
                                        var curr_hour = today.getHours();
                                        var curr_minute = today.getMinutes();
                                        var curr_second = today.getSeconds();
                                        if (curr_hour < 12) {
                                            a_p = "AM";
                                        } else {
                                            a_p = "PM";
                                        }
                                        if (curr_hour == 0) {
                                            curr_hour = 24;
                                        }
                                        if (curr_hour > 24) {
                                            curr_hour = curr_hour - 12;
                                        }
                                        curr_hour = checkTime(curr_hour);
                                        curr_minute = checkTime(curr_minute);
                                        curr_second = checkTime(curr_second);
                                        document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                                    }

                                    function checkTime(i) {
                                        if (i < 10) {
                                            i = "0" + i;
                                        }
                                        return i;
                                    }
                                    setInterval(showTime, 500);
                                </script>
                            </div>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col md-8">
            <div class="card-deck">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">kontribusi</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">40 beastudi</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Dana</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. 700.000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Report</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
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
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div>
                                        <a href="<?= base_url(); ?>pic/" class="text-xs font-weight-bold text-warning text-uppercase mb-1">PIC</a>
                                    </div>
                                    <div>
                                        <a href="<?= base_url(); ?>pic/" class="h5 mb-0 font-weight-bold text-gray-800">10</a>
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
                                <td><?= $bs['jk']; ?></td>
                                <td><?= $bs['semester']; ?></td>
                                <td><?= $bs['angkatan']; ?></td>
                                <td><?= $bs['programstudi']; ?></td>
                                <td><?= $bs['kontribusi']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">kontribusi</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">konten<span class="float-right">20%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">web dev<span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">LPPM <span class="float-right">60%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">LPMI <span class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">Dev<span class="float-right">Complete!</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->