<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keuangan</title>
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
                  <li role="presentation"><a href="<?php echo base_url()."admin/dkaryawan/"; ?>"><span class="glyphicon glyphicon-copy"></span> &nbsp; Data Karyawan</a></li>
                  <li role="presentation"><a href="<?php echo base_url()."admin/approval/"; ?>"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
                  <li role="presentation"><a href="<?php echo base_url()."admin/monitoring/"; ?>"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
                  <li role="presentation"><a href="<?php echo base_url()."laporan/admin"; ?>"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
                  <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-usd"></span> &nbsp; Keuangan</a></li>
              </ul>
            </div>
          </div>

          <!-- MENU UANG -->

          <div class="col-sm-9">
            <br>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <h3 class="text-primary">Data Keuangan Lembur <?php echo $this->session->userdata('divisi'); ?></h3><br>
                <table id="table_id" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Total Jam</th>
                    <th>Uang</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    foreach($query as $data){
                ?>
                  <tr>
                    <td><?php echo $data->nama; ?></td>
                    <td><?php echo $data->jam; ?></td>
                    <td align="right">
                      <?php
                        $hasil_rupiah = number_format($data->uang,2,',','.');
                        $hasil_total = number_format($uangtot,2,',','.');
                        echo 'Rp. '.$hasil_rupiah;
                      ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
                <tr>
                  <td colspan=2><b>Total Uang</b></td>
                  <td align="right"><?php echo 'Rp. '.$hasil_total; ?></td>
                </tr>
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
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable({
          "pageLength":10,
          lengthMenu: [[10, 20, 50], [10, 20, 50]]
        });
    } );
    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
      return true;
    }
  </script>

  </body>
</html>
