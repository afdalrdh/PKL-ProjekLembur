<!DOCTYPE html>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#bs-example-navbar-collapse-l" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand">Pengajuan Lembur</a>
      </div>
      <div class="id=#bs-example-navbar-collapse-l">

        <?php
                $inisial = $this->session->userdata('inisial');
                $data=$this->db->query("SELECT * FROM biodata_karyawan WHERE inisial='$inisial'");
                foreach($data->result_array() as $user) {
        ?>

        <ul class="nav navbar-nav navbar-right">
          <li><a> <?php echo $user['nama'] ?> &nbsp;<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            &nbsp;<?php
              $tanggal= mktime(date("m"),date("d"),date("Y"));
              echo "<b>".date("d-M-Y", $tanggal)."</b> ";
              ?>
          </a></li>
          <a href="<?php echo base_url()."login"; ?>"><button type="submit" class="btn btn-danger" style="margin-top:8px; margin-right:15px;">Logout</button></a>
        </ul>
        <?php } ?>
      </div>
    </div>
  </nav>
