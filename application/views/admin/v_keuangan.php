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
                <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-euro"></span> &nbsp; Pengolahan Data Keuangan</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/dkaryawan/"; ?>"><span class="glyphicon glyphicon-copy"></span> &nbsp; Data Karyawan</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/approval/"; ?>"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/monitoring/"; ?>"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
                <li role="presentation"><a href="<?php echo base_url()."laporan/admin"; ?>"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/uang/"; ?>"><span class="glyphicon glyphicon-usd"></span> &nbsp; Keuangan</a></li>
              </ul>
            </div>
          </div>

          <!-- MENU DATA PENGOLAHAN KEUANGAN LEMBUR -->

          <div class="col-sm-9">
            <div class="row">
              <form class="form-horizontal" method="POST" action="<?php echo base_url()."admin/prosesuang"; ?>">
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
                        <td><input type="radio" id="radio<?php echo $r->nik;?>" name="data-changer[]" value="<?php echo $r->nik;?>" onclick="ChangeTable(<?php echo $r->nik;?>)"></td>
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
                        <td colspan="7" align="center"><b> Pengolahan Keuangan Lembur </b></td>
                      </tr>
                      <tr>
                        <th hidden>id</th>
                        <th align="center">Nama</th>
                        <th align="center">NIK</th>
                        <th align="center">Divisi</th>
                        <th align="center">Lokasi</th>
                        <th align="center">Jam</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($data_log2 as $r) {
                      ?>
                          <tr id="trdata" class="data<?php echo $r->nik; ?>" hidden>
                            <td class="text-center" hidden><?php echo $r->nik;?></td>
                            <td align="center"><?php echo $r->nama;?></td>
                            <td align="center"><?php echo $r->nik;?></td>
                            <td align="center"><?php echo $r->divisi;?></td>
                            <td align="center"><?php echo $r->lokasi;?></td>
                            <td align="center"><?php echo $r->jam;?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                    </table>
                    <div class="col-sm-15 col-sm-offset-5" >
                      <input type="text" onkeypress="return hanyaAngka(event)" name="gajinya" id="gajinya"/>
                      <button type="submit" class="btn btn-primary" name="btn" value="submit" align="center">Submit</button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- AKHIR MENU DATA PENGOLAHAN KEUANGAN LEMBUR -->




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

function hanyaAngka(evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))

  return false;
  return true;
}
</script>

  </body>
</html>
