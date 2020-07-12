<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inbox</title>
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
            <ul class="nav nav-pills nav-stacked">
              <li role="presentation"><a href="<?php echo base_url()."welcome/index/"; ?>"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Form Pengajuan Lembur</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/approval/"; ?>"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/monitoring/"; ?>"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
              <li role="presentation"><a href="<?php echo base_url()."laporan/"; ?>"><span class="glyphicon glyphicon-file"></span> &nbsp; Cetak</a></li>
              <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-inbox"></span> &nbsp; Inbox</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/outbox/"; ?>"><span class="glyphicon glyphicon-trash"></span> &nbsp; Outbox</a></li>
            </ul>
          </div>

          <!-- MENU MONITORING -->

          <div class="col-sm-9">
            <br>
            <div class="row">
              <div class="col-sm-12">
                <?php
                        $inisial = $this->session->userdata('inisial');
                        $data=$this->db->query("SELECT * FROM biodata_karyawan WHERE inisial='$inisial'");
                        foreach($data->result_array() as $user) {
                          echo "<h5>Inbox ".$user['nama']."</h5><br>";
                        }
                ?>

              <form method="POST" action="<?php echo base_url()."welcome/prosesinbox"; ?>">
                <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th hidden>id</th>
                      <th>Inbox</th>
                      <th>Agenda Lembur</th>
                      <th>Pemberi Tugas</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($data_log as $r) {
                    ?>
                      <tr>
                        <td class="text-center">
                          <a href="<?php echo base_url()."welcome/edit_data/".$r->id; ?>"> Ubah </a>
                        </td>
                        <td class="text-center">
                          <input class="form-check-input" type="checkbox" name="pilih[]" value="<?php echo $r->id; ?>">
                        </td>
                        <td hidden><?php echo $r->id;?></td>
                        <td><?php echo $r->waktu;?></td>
                        <td><?php echo $r->agenda_lembur;?></td>
                        <td><?php echo $r->pemberi_tugas;?></td>
                        <td><?php
                              if ($r->status == '0') {
                                echo 'Create';
                              }
                              else if ($r->status == '2'){
                                echo 'Dikembalikan Pemberi Tugas';
                              }
                              else if ($r->status == '3'){
                                echo 'Approve Pemberi Tugas';
                              }
                              else if ($r->status == '5'){
                                echo 'Dikembalikan Atasan';
                              }
                        ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>


              </br>
              </div>
            </div>
              <div class="col-sm-7 col-sm-offset-5">
                <button type="submit" class="btn btn-success">SUBMIT</button>
              </div>
          </form>
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
          "pageLength":5,
          lengthMenu: [[5, 10, 20, 50], [5, 10, 20, 50]]
        })

        $("#kirimulang").click(function(){
          $("#alasan").show();
          $("#kirimulang").hide();
          $("#update").hide();
        })
    } );
  </script>

  </body>
</html>
