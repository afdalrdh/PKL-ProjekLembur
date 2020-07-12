<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak</title>
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
                <li role="presentation"><a href="<?php echo base_url()."admin/dkeuangan/"; ?>"><span class="glyphicon glyphicon-usd"></span> &nbsp; Pengolahan Data Keuangan</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/dkaryawan/"; ?>"><span class="glyphicon glyphicon-copy"></span> &nbsp; Data Karyawan</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/approval/"; ?>"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/monitoring/"; ?>"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
                <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
                <li role="presentation"><a href="<?php echo base_url()."admin/uang/"; ?>"><span class="glyphicon glyphicon-usd"></span> &nbsp; Keuangan</a></li>
              </ul>
            </div>
          </div>

          <!-- MENU CETAK -->

          <div class="col-sm-9">
            <br>
            <form method="POST" action="<?php echo base_url("laporan/cetak2"); ?>">
            <div class="row">
              <div class="col-sm-12">
                <h5 class="text-primary">Lembur yang bisa dicetak hanya yang sudah di approve pimpinan.</h5><br>
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Pilih</th>
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
                      foreach ($data_log as $r) {
                    ?>
                      <tr>
                        <td class="text-center"><input type="radio" name="pilih[]" value="<?php echo $r->id; ?>"></td>
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
              </br>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-4" style="padding-bottom:50px;">
                <button type="submit" class="btn btn-success">Cetak Sekarang</button>
              </div>
            </div>
          </form>
          </div>

          <!-- AKHIR MENU CETAK -->

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
          "pageLength":5,
          lengthMenu: [[5, 10, 20, 50], [5, 10, 20, 50]]
        });
    } );
  </script>

  </body>
</html>
