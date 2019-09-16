<div class="container">
  <div class="row mt-4">
    <div class="col md-8">
      <div class="card">
        <div class="site-index">
          <div class="col-lg-12">
            <h1 class="page-header" align="center">
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
            </h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col md-8">
      <div class="card-deck">
        <div class="card text-white bg-success">
          <div class="card-body">
            <h4><a href="#" class="fa fa-envelope fa-lg" style="color:white"></a>&nbsp;&nbsp;Jumlah Surat Masuk</h4>
            <h5><a href="<?= base_url(); ?>suratmasuk/" class="text-white">1 Surat Masuk</a></h5>
          </div>
        </div>
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h4><a href="#" class="fa fa-send fa-lg" style="color:white"></a>&nbsp;&nbsp;Jumlah Surat Keluar</h4>
            <h5><a href="<?= base_url(); ?>suratkeluar/" class="text-white">1 Surat Keluar</a></h5>
          </div>
        </div>
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h4><a href="#" class="fa fa-comments-o fa-lg" style="color:white"></a>&nbsp;&nbsp;Memo</h4>
            <h5><a href="#" class="text-white">1 Memo</a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col md-8">
      <div class="card-deck">
        <div class="card text-white bg-warning">
          <div class="card-body">
            <h4><a href="#" class="fa fa-file fa-lg" style="color:white"></a>&nbsp;&nbsp;Jumlah Disposisi</h4>
            <h5><a href="<?= base_url(); ?>disposisi/" class="text-white">1 Disposisi</a></h5>
          </div>
        </div>
        <div class="card text-white bg-secondary">
          <div class="card-body">
            <h4><a href="#" class="fa fa-paste fa-lg" style="color:white"></a>&nbsp;&nbsp;Jumlah Verifikasi</h4>
            <h5><a href="<?= base_url(); ?>verifikasi/" class="text-white">1 Verifikasi</a></h5>
          </div>
        </div>
        <div class="card text-white bg-info">
          <div class="card-body">
            <h4><a href="#" class="fa fa-users fa-lg" style="color:white"></a>&nbsp;&nbsp;Jumlah Pengguna</h4>
            <h5><a href="<?= base_url(); ?>user/" class="text-white">1 Pengguna</a></h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



</div>
<!-- End of Main Content -->