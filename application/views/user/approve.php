<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input data</title>
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />


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
              <li role="presentation"><a href="<?php echo base_url()."laporan/"; ?>"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/inbox/"; ?>"><span class="glyphicon glyphicon-inbox"></span> &nbsp; Inbox</a></li>
              <li role="presentation"><a href="<?php echo base_url()."welcome/outbox/"; ?>"><span class="glyphicon glyphicon-trash"></span> &nbsp; Outbox</a></li>
            </ul>
          </div>

          <!-- INPUT DATA -->

          <div class="col-sm-6 col-sm-offset-1">
            <form class="form-horizontal" method="POST" action="<?php echo base_url()."welcome/prosesapproval"; ?>">
              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">id : </label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" name="id" readonly value="<?php echo $id ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama : </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama" readonly value="<?php echo $nama ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="nik" class="col-sm-3 control-label">NIK : </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nik" readonly value="<?php echo $nik ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="bagian" class="col-sm-3 control-label">Bagian / Divisi : </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="divisi" readonly value="<?php echo $divisi ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="lokasi" class="col-sm-3 control-label">Lokasi Kerja : </label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="lokasi" readonly value="<?php echo $lokasi ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="tgl" class="col-sm-3 control-label">Hari / Tanggal : </label>
                  <div class="col-sm-9">
                    <div class='input-group date'>
        							<input type="text" class="form-control" name="input_dtp_icon" readonly value="<?php echo date_indo($tgl) ?>" />
        							       <span class="input-group-addon">
        		                     <span class="glyphicon glyphicon-calendar"></span>
        		                 </span>
                    </div>
                  </div>
              </div>
              <div class="form-group">
                <label for="jam" class="col-sm-3 control-label">Jam : </label>
                  <div class="col-sm-3">
                    <div class='input-group date' id='dtp_jam'>
        							<input type="text" class="form-control" name="input_dtp_jam" readonly value="<?php echo $dari_jam ?>"/>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                  </div>
                <label for="jam2" class="col-sm-1 control-label">s/d</label>
                  <div class="col-sm-3">
                    <div class='input-group date' id='dtp_jam2'>
                      <input type="text" class="form-control" name="input_dtp_jam2" readonly value="<?php echo $sampai_jam ?>"/>
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                  </div>
                  <input type="hidden" name="diff_value" id="diff_value" value="">
                  <div class="col-sm-2">
                    <label id="different" class="control-label text-primary"><?php echo $jamnya ?> jam</label>
                  </div>
              </div>
              <div class="form-group">
                <label for="nik" class="col-sm-3 control-label">Agenda Lembur : </label>
                <div class="col-sm-9">
                  <textarea class="form-control" rows="3" name="agenda" readonly><?php echo $agenda_lembur ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="nik" class="col-sm-3 control-label">Pemberi Tugas : </label>
                <div class="col-sm-9">
                  <select class="form-control" name="penugas" readonly>
                    <option><?php echo $pemberi_tugas ?></option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="nik" class="col-sm-3 control-label">Keterangan Pengajuan Lembur: </label>
                <div class="col-sm-9">
                  <textarea class="form-control" rows="3" name="keterangan2" readonly><?php echo $keterangan2 ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="nik" class="col-sm-3 control-label">Keterangan : </label>
                <div class="col-sm-9">
                  <textarea class="form-control" rows="3" name="keterangan"></textarea>
                </div>
              </div>
              <div class="col-sm-9 col-sm-offset-3" style="padding-bottom:50px;">
                <button type="submit" class="btn btn-success" name="btn" value="approve">Approve</button>
                <button type="submit" class="btn btn-warning" name="btn" value="dikembalikan">Kembalikan</button>
                <button type="submit" class="btn btn-danger" name="btn" value="reject">Reject</button>
              </div>
            </form>
          </div>

          <!-- AKHIR INPUT DATA -->

        </div>
      </div>
    </section>



  <script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/moment.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js';?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){

			 $('#dtp_icon').datetimepicker({
			 	format : 'YYYY/MM/DD',
        daysOfWeekDisabled: [0, 6]
			 });

			 $('#dtp_jam').datetimepicker({
			 	format : 'HH:mm'
			 });

       $('#dtp_jam2').datetimepicker({
			 	format : 'HH:mm'
			 });

		});
	</script>

  </body>
</html>
