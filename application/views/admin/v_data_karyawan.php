<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Karyawan</title>
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  </head>
  <body>
    <section class="inputdata" id="inputdata">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3" style="padding-right:20px; border-right: 1px solid #ccc;">
            <div class="menu">
              <ul class="nav nav-pills nav-stacked">
                <li role="presentation"><a href="<?php echo base_url()."admin/index/"; ?>"><span class="glyphicon glyphicon-tasks"></span> &nbsp; Dashboard</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/dkeuangan/"; ?>"><span class="glyphicon glyphicon-euro"></span> &nbsp; Pengolahan Data Keuangan</a></li>
                <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-copy"></span> &nbsp; Data Karyawan</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/approval/"; ?>"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/monitoring/"; ?>"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
                <li role="presentation"><a href="<?php echo base_url()."laporan/admin"; ?>"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/uang/"; ?>"><span class="glyphicon glyphicon-usd"></span> &nbsp; Keuangan</a></li>
              </ul>
            </div>
          </div>

          <!-- MENU DATA KARYAWAN -->

          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-12">
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th> Pilih </th>
                      <th>Nama</th>
                      <th>NIK</th>
                      <th>Divisi</th>
                      <th>Lokasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data_log as $r) {
                    ?>
                      <tr>
                        <td><input type="radio" id="radio<?php echo $r->nik;?>" name="data-changer" value="<?php echo $r->nik;?>" onclick="ChangeTable(<?php echo $r->nik;?>)"></td>
                        <td><?php echo $r->nama;?></td>
                        <td><?php echo $r->nik;?></td>
                        <td><?php echo $r->divisi;?></td>
                        <td><?php echo $r->lokasi;?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                <table id="table_id" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Dari Jam</th>
                        <th>Sampai Jam</th>
                        <th>Tanggal</th>
                        <th>Agenda Lembur</th>
                        <th>Pemberi Tugas</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($data_log2 as $r) {
                      ?>
                        <tr id="trdata" class="data<?php echo $r->nik; ?>" hidden>
                          <td><?php echo $r->nama;?></td>
                          <td><?php echo $r->dari_jam;?></td>
                          <td><?php echo $r->sampai_jam;?></td>
                          <td><?php echo date_indo($r->tgl);?></td>
                          <td><?php echo $r->agenda_lembur;?></td>
                          <td><?php echo $r->pemberi_tugas;?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    </table>
              </div>
            </div>
          </div>

          <!-- AKHIR MENU MONITORING -->

        </div>
      </div>
    </section>



  <script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/moment.js';?>"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">

    $(document).ready( function () {
        $('#table_id').DataTable({
          "pageLength":5,
          lengthMenu: [[5, 10, 20, 50], [5, 10, 20, 50]],

          fnDrawCallback: function() {
            $(':radio').each(function () {
              $('input[type="radio"]').prop('checked', false);
            });
          }

        });
    });

    function ChangeTable(data_id){
      if(document.getElementById('radio'+data_id).checked){
        var aa = document.getElementsByTagName('tr');
        var i;
        for(i=0; i<aa.length; i++){
          if(aa[i].id == 'trdata'){
            aa[i].style.display = 'none';
          }
        }
        var tr = document.getElementsByClassName('data'+data_id);
        var i;
        for(i=0; i<tr.length; i++){
          tr[i].style.display = 'table-row';
        }
      }
    }
  </script>
  <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

  </body>
</html>
