<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pengajuan Lembur</title>
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url()."assets/css/"; ?>bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />


  </head>
  <body>
  <div class="col-sm-6 col-sm-offset-1">
    <form action="" method="post">
      <div>
        <label>nik</label>
        <input type="text" name="nik" class="form-control">
      </div>
      <div>
        <label>nama</label>
        <input type="text" name="nama" class="form-control">
      </div>
      <div>
        <label>divisi</label><br>
        <div class="radio">
          <label><input type="radio" name="optradio" checked>IT Application</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="optradio">Option 2</label>
        </div>
      </div>
      <div>
        <label>lokasi</label>
        <input type="text" name="lokasi" class="form-control">
      </div>
      <div>
        <label>inisial</label>
        <input type="text" name="inisial" class="form-control">
      </div>
      <div>
        <label>password</label>
        <input type="text" name="password" class="form-control">
      </div>
      <div>
        <label>level</label>
        <input type="radio" name="level" value="user">
        <input type="radio" name="level" value="admin">
      </div>
      <button type="submit" class="btn btn-primary">SUBMIT</button>
    </form>
  </div>


  <script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/moment.js';?>"></script>
  <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js';?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){

      var min = moment().subtract(7, 'days').millisecond(0).second(0).minute(0).hour(0);

      switch(new Date().getDay()){
        case 1: //SENIN
          min = moment().subtract(5, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
        case 2: //SELASA
          min = moment().subtract(5, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
        case 3: //RABU
          min = moment().subtract(5, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
        case 4:
          min = moment().subtract(3, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
        case 5:
          min = moment().subtract(3, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
        case 6:
          min = moment().subtract(3, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
        case 0:
          min = moment().subtract(3, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
        default:
          min = moment().subtract(6, 'days').millisecond(0).second(0).minute(0).hour(0);
          break;
      }

			 $('#dtp_icon').datetimepicker({
			 	format : 'YYYY/MM/DD',
        daysOfWeekDisabled: [0, 6],
        maxDate: new Date(),
        minDate: min
			 });

			 $('#dtp_jam').datetimepicker({
			 	format : 'HH:mm'
			 });

       $('#dtp_jam2').datetimepicker({
			 	format : 'HH:mm'
			 });

		});

    function seeDiff() {
        var now  = document.getElementById('time_now').value;
        var then = document.getElementById('time_then').value;

        var halo = moment.utc(moment(then,"HH:mm").diff(moment(now,"HH:mm"))).format("HH:mm");
        document.getElementById('diff_value').value = halo;
        document.getElementById('different').innerHTML = halo;
    }
	</script>

  </body>
</html>
