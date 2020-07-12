<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Approval</title>
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
                <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/monitoring/"; ?>"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
                <li role="presentation"><a href="<?php echo base_url()."laporan/admin"; ?>"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/uang/"; ?>"><span class="glyphicon glyphicon-usd"></span> &nbsp; Keuangan</a></li>
              </ul>
            </div>
          </div>

          <!-- MENU APPROVAL -->

          <div class="col-sm-9">
          <form>
            <h4>Tabel Data Approval Atasan</h4>
            <table id="table_id" class="table table-striped table-bordered">
              <thead>
              <tr>
                <th></th>
                <th hidden>id</th>
                <th>Nama</th>
                <th>Agenda Lembur</th>
                <th>Dari Jam</th>
                <th>Sampai Jam</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $no=1;
              if($query){
                foreach($query->result() as $data){
            ?>
              <tr>
                <td class="text-center">
                  <a href="<?php echo base_url()."admin/pilihapprove/".$data->id; ?>"> Pilih </a>
                </td>
                <td class="text-center" hidden><?php echo $data->id; ?></td>
                <td><?php echo $data->nama; ?></td>
                <td><?php echo $data->agenda_lembur; ?></td>
                <td><?php echo $data->dari_jam; ?></td>
                <td><?php echo $data->sampai_jam; ?></td>
                <td><?php echo date_indo($data->tgl); ?></td>
                <td><?php echo $data->ket; ?></td>
              </tr>
                  <?php
                }
              }
              ?>
            </tbody>
            </table>
            <br>
          </form>
          </div>

          <!-- AKHIR MENU APPROVAL -->

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
        lengthMenu: [[5, 10, 20, 50], [5, 10, 20, 50]]
      })
    });
  </script>

  </body>
</html>
