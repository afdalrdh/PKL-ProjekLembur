<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Monitoring</title>
<link href="<?php echo base_url()."assets/css/"; ?>font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."assets/css/"; ?>bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."assets/css/"; ?>custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."assets/css/"; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."assets/css/"; ?>bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()."assets/js/morris/"; ?>morris-0.4.3.min.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
<section class="inputdata" id="inputdata">
    <div class="container-fluid">
    <form method="POST" action="<?php echo base_url()."admin/index"; ?>">
    <div class="row">
        <div class="col-sm-3" style="padding-right:20px; border-right: 1px solid #ccc;">
        <div class="menu">
            <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="#"><span class="glyphicon glyphicon-tasks"></span> &nbsp; Dashboard</a></li>
            <li role="presentation"><a href="<?php echo base_url()."admin/dkeuangan/"; ?>"><span class="glyphicon glyphicon-euro"></span> &nbsp; Pengolahan Data Keuangan</a></li>
            <li role="presentation"><a href="<?php echo base_url()."admin/dkaryawan/"; ?>"><span class="glyphicon glyphicon-copy"></span> &nbsp; Data Karyawan</a></li>
            <li role="presentation"><a href="<?php echo base_url()."admin/approval/"; ?>"><span class="glyphicon glyphicon-ok"></span> &nbsp; Approval</a></li>
            <li role="presentation"><a href="<?php echo base_url()."admin/monitoring/"; ?>"><span class="glyphicon glyphicon-eye-open"></span> &nbsp; Monitoring</a></li>
            <li role="presentation"><a href="<?php echo base_url()."laporan/admin"; ?>"><span class="glyphicon glyphicon-duplicate"></span> &nbsp; Cetak</a></li>
            <li role="presentation"><a href="<?php echo base_url()."admin/uang/"; ?>"><span class="glyphicon glyphicon-usd"></span> &nbsp; Keuangan</a></li>
            </ul>
        </div>
        </div>

        <!-- MENU UANG -->

        <div class="col-sm-9">
            <div class="row">
                <div id="page-inner">
            <!-- /. ROW  -->

            <h3 class="text-primary" style="margin-top:0px;">Dashboard <?php echo $this->session->userdata('divisi'); ?></h3>
                <div class="form-group">
                <div class="col-sm-3">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Form Date">
                </div>
                <div class="col-sm-3">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date">
                </div>
                <div class="col-sm-5">
                    <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info">
                </div>
            </div>
            <br><br>
            <hr/>
            <div class="row">

                <!-- PENDING -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-red set-icon">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        <div class="text-box" >
                            <p class="main-text" style="font-size:40px;"><?php echo $pending ?></p>
                            <p class="main-text">Pending</p>
                        </div>
                    </div>
                </div>

                <!-- APPROVE -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-green set-icon">
                            <i class="fa fa-bars"></i>
                        </span>
                        <div class="text-box" >
                            <p class="main-text" style="font-size:40px;"><?php echo $approve ?></p>
                            <p class="main-text">Approve</p>
                        </div>
                    </div>
                </div>

                <!-- REJECT -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-blue set-icon">
                            <i class="fa fa-bell-o"></i>
                        </span>
                        <div class="text-box" >
                            <p class="main-text" style="font-size:40px;"><?php echo $reject ?></p>
                            <p class="main-text">Reject</p>
                        </div>
                    </div>
                </div>

                <!-- SIMPAN -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="panel panel-back noti-box">
                        <span class="icon-box bg-color-brown set-icon">
                            <i class="fa fa-rocket"></i>
                        </span>
                        <div class="text-box" >
                            <p class="main-text" style="font-size:40px;"><?php echo $simpan ?></p>
                            <p class="main-text">Simpan</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. ROW  -->
            <div class="row">

                <!-- CHART KARYAWAN -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Chart Karyawan
                        </div>
                        <div class="panel-body">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                <!-- JUMLAH PENGAJUAN LEMBUR -->
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-bar-chart-o fa-5x"></i>
                            <h3><?php echo $ajuan ?> Data</h3>
                        </div>
                        <div class="panel-footer back-footer-green">
                            Jumlah Pengajuan Lembur
                        </div>
                    </div>

                <!-- JUMLAH JAM PENGAJUAN LEMBUR -->
                    <div class="panel panel-primary text-center no-boder bg-color-red">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3><?php echo $waktu ?> Jam</h3>
                        </div>
                        <div class="panel-footer back-footer-red">
                            Jumlah Jam Pengajuan Lembur
                        </div>
                    </div>
                </div>

            </div>
            <!-- /. ROW  -->
            <div class="row" >
                <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="panel panel-primary text-center no-boder bg-color-green">
                        <div class="panel-body">
                            <i class="fa fa-comments-o fa-5x"></i>
                            <h4><b><?php echo $namanya ?></b></h4>
                            <h5>Pegawai Yang Paling Banyak Lembur</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Karyawan <?php echo $this->session->userdata('divisi'); ?>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="table_id" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th hidden>ID</th>
                                        <th>Inisial</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Divisi</th>
                                        <th>Lokasi</th>
                                        <th>Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data_log2 as $r) {

                                ?>
                                    <tr>
                                        <td hidden><?php echo $r->id ?></td>
                                        <td><?php echo $r->inisial ?></td>
                                        <td><?php echo $r->nama ?></td>
                                        <td><?php echo $r->nik ?></td>
                                        <td><?php echo $r->divisi ?></td>
                                        <td><?php echo $r->lokasi ?></td>
                                        <td><?php echo $r->jam ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- AKHIR MENU MONITORING -->

    </div>
    </div>
    </section>

<?php
    //index.php
    $connect = mysqli_connect("localhost", "root", "", "projek_lembur");
    $divisi = $this->session->userdata('divisi');
    $query = "SELECT * FROM tb_uang where divisi='$divisi' order by jam desc";
    $result = mysqli_query($connect, $query);
    $chart_data = '';
    while($row = mysqli_fetch_array($result))
    {
    $chart_data .= "{ inisial:'".$row["inisial"]."', jam:".$row["jam"].", uang:".$row["uang"]."}, ";
    }
    $chart_data = substr($chart_data, 0, -2);
?>


<script src="<?php echo base_url().'assets/js/jquery-1.11.2.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/js/admin.js';?>"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo base_url().'assets/js/morris/raphael-2.1.0.min.js';?>"></script>
<script src="<?php echo base_url().'assets/js/morris/morris.js';?>"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url().'assets/js/moment.js';?>"></script>
<script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js';?>"></script>
<script type="text/javascript">
    $(document).ready( function () {

    $(function(){  
        $("#from_date").datetimepicker({
            format:'YYYY-MM-DD'
        });  
        $("#to_date").datetimepicker({
            format:'YYYY-MM-DD'
        });  
    }); 
    $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' && to_date != ''){
            $.ajax({
                url:"filter.php",
                method:"POST",
                data:{from_date:from_date, to_date:to_date},
                success:function(data){
                    
                }
            })
        }
    })

    $('#table_id').DataTable({
        "pageLength":10,
        lengthMenu: [[10, 20, 50], [10, 20, 50]]
        });
    } );

    Morris.Bar({
                element: 'morris-bar-chart',
                data: [<?php echo $chart_data; ?>],
                xkey: 'inisial',
                ykeys: ['jam'],
                labels: ['Total Jam'],
                hideHover: 'auto',
                resize: true
            });

</script>

</body>
</html>
