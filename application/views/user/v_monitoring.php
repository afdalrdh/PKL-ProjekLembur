<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monitoring</title>
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <script src="<?php echo base_url().'assets/js/moment.js';?>"></script>
    <script src="<?php echo base_url().'assets/js/moment-with-locales.js';?>"></script>


  </head>
  <body>
    <section class="inputdata" id="inputdata">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3" style="padding-right:20px; border-right: 1px solid #ccc;">
            <ul class="nav nav-pills nav-stacked">
              <li role="presentation"><a href="<?php echo base_url()."welcome/index/"; ?>"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Form Pengajuan Lembur</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/approval/"; ?>"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
              <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
              <li role="presentation"><a href="<?php echo base_url()."laporan/"; ?>"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/inbox/"; ?>"><span class="glyphicon glyphicon-inbox"></span> &nbsp; Inbox</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/outbox/"; ?>"><span class="glyphicon glyphicon-trash"></span> &nbsp; Outbox</a></li>
            </ul>
          </div>

          <!-- MENU MONITORING -->

          <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-12">
                <form class="" action="<?php echo base_url()."welcome/prosesinbox"; ?>" method="post">
                  <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th></th>
                        <th hidden>id</th>
                        <th>Dari Jam</th>
                        <th>Sampai Jam</th>
                        <th>Tanggal</th>
                        <th>Agenda Lembur</th>
                        <th>Pemberi Tugas</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($data_log as $r) {
                      ?>
                        <tr>
                          <td><input type="radio" id="radio<?php echo $r->id;?>" name="data-changer" value="<?php echo $r->id;?>" onclick="ChangeTable(<?php echo $r->id;?>)"></td>
                          <td class="text-center" hidden><?php echo $r->id;?></td>
                          <td><?php echo $r->dari_jam;?></td>
                          <td><?php echo $r->sampai_jam;?></td>
                          <td><?php echo date_indo($r->tgl);?></td>
                          <td><?php echo $r->agenda_lembur;?></td>
                          <td><?php echo $r->pemberi_tugas;?></td>
                          <td><?php
                              if ($r->status == '7' || $r->status == '8' || $r->status == '9') {echo 'Close';}
                              else {echo 'Open';}
                              ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>

                </form>
              <br>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1" id="proses">
                <table class="table table-striped table-bordered">
                  <tr>
                    <th>Proses</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Awal Proses</th>
                    <th>Akhir Proses</th>
                  </tr>
                  <?php
                    foreach ($data_log2 as $r) {
                  ?>
                    <tr  id="trdata" class="data<?php echo $r->id; ?>" hidden>
                      <td><?php
                          if ($r->status == '0') {echo 'Create Pengajuan Lembur';}
                          else if ($r->status == '1'){echo 'Create Pengajuan Lembur';}
                          else if ($r->status == '2'){echo 'Approve Pemberi Tugas';}
                          else if ($r->status == '3'){echo 'Dikembalikan Pemberi Tugas';}
                          else if ($r->status == '30'){echo 'Dikembalikan Pemberi Tugas';}
                          else if ($r->status == '4'){echo 'Create Pengajuan Lembur (Pemtug)';}
                          else if ($r->status == '5'){echo 'Create Pengajuan Lembur (Pemtug)';}
                          else if ($r->status == '50'){echo 'Create Pengajuan Lembur (Pemtug)';}
                          else if ($r->status == '6'){echo 'Approve Pemberi Tugas';}
                          else if ($r->status == '60'){echo 'Approve Pemberi Tugas';}
                          else if ($r->status == '7'){echo 'Approve Atasan';}
                          else if ($r->status == '8'){echo 'Dikembalikan Atasan';}
                          else if ($r->status == '80'){echo 'Dikembalikan Atasan';}
                          else if ($r->status == '9'){echo 'Create Pengajuan Lembur (Atasan)';}
                          else if ($r->status == '10'){echo 'Approve Pemtug (Kembalikan)';}
                          else if ($r->status == '100'){echo 'Approve Pemtug (Kembalikan)';}
                          else if ($r->status == '11'){echo 'Approve Atasan';}
                          else if ($r->status == '12'){echo 'Reject Pemtug';}
                          else if ($r->status == '13'){echo 'Reject Atasan';}
                      ?></td>

                      <td><?php
                          if ($r->status == '0') {echo 'Open';}
                          else if ($r->status == '1'){echo 'Close';}
                          else if ($r->status == '2'){echo 'Open';}
                          else if ($r->status == '3'){echo 'Kembalikan';}
                          else if ($r->status == '30'){echo 'Kembalikan';}
                          else if ($r->status == '4'){echo 'Open';}
                          else if ($r->status == '5'){echo 'Close';}
                          else if ($r->status == '50'){echo 'Create Pengajuan Lembur (Pemtug)';}
                          else if ($r->status == '6'){echo 'Close';}
                          else if ($r->status == '60'){echo 'Close';}
                          else if ($r->status == '7'){echo 'Open';}
                          else if ($r->status == '8'){echo 'Kembalikan';}
                          else if ($r->status == '80'){echo 'Kembalikan';}
                          else if ($r->status == '9'){echo 'Open';}
                          else if ($r->status == '10'){echo 'Close';}
                          else if ($r->status == '100'){echo 'Close';}
                          else if ($r->status == '11'){echo 'Close';}
                          else if ($r->status == '12'){echo 'Close';}
                          else if ($r->status == '13'){echo 'Close';}
                      ?></td>
                    <td><?php echo $r->ket;?></td>
                    <td><?php echo $r->awalp;?></td>
                    <td><?php echo $r->akhirp;?></td>
                    </tr>
                  <?php } ?>

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

  </body>
</html>
