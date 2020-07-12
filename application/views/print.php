<html>
<head>
  <title>Cetak PDF</title>
</head>
<body style="font-size:12px;">
<img src="<?php echo base_url()."assets/images/";?>kopkarla.jpg"><br>

<h4 style="text-align: center;"><u>PERENCANAAN PELAKSANAAN LEMBUR</u></h4>
Berdasarkan Surat Tugas Lembur, yang bertanda tangan dibawah ini :<br><br>
<table border="0">
  <tr>
    <td height="15">Nama </td>
    <td>&nbsp; : <?php echo $nama; ?></td>
  </tr>
  <tr>
    <td height="15">NIK </td>
    <td>&nbsp; : <?php echo $nik; ?></td>
  </tr>
  <tr>
    <td height="15">Bagian/Divisi </td>
    <td>&nbsp; : <?php echo $divisi; ?></td>
  </tr>
  <tr>
    <td height="15">Lokasi Kerja </td>
    <td>&nbsp; : <?php echo $lokasi; ?></td>
  </tr>
</table>
<br>
Melaksanakan lembur pada :<br><br>
<table>
  <tr>
    <td height="15"> Hari/Tanggal </td>
    <td>&nbsp; : <?php echo date_indo($hari); ?> </td>
  </tr>
  <tr>
    <td height="15"> Jam </td>
    <td>&nbsp; : <?php echo $dari_jam; ?> s/d <?php echo $sampai_jam; ?></td>
  </tr>
</table>
<br>
Tugas yang harus diselesaikan sebagai berikut :<br>
<ul>
  <li> <?php echo $agenda_lembur; ?></li>
</ul>
<p align="right">Jakarta, <?php echo date_indo($hari); ?></p>
<table border="0">
  <tr>
    <td width="205" align="center"> Mengetahui Atasan Langsung, </td>
    <td width="205" align="center"> Yang Memberi Tugas, </td>
    <td width="205" align="center"> Yang Diberi Tugas, </td>
  </tr>
  <tr>
    <td width="205" align="center"> <img width="65" src="<?php echo base_url()."assets/images/";?><?php echo $gambar1; ?>.jpg"> </td>
    <td width="205" align="center"> <img width="65" src="<?php echo base_url()."assets/images/";?><?php echo $gambar2; ?>.jpg"> </td>
    <td width="205" align="center"> <img width="65" src="<?php echo base_url()."assets/images/";?><?php echo $gambar3; ?>.jpg"> </td>
  </tr>
  <tr>
    <td width="205" align="center">( <?php echo $atasan; ?> )</td>
    <td width="205" align="center">( <?php echo $pemberi_tugas; ?> )</td>
    <td width="205" align="center">( <?php echo $nama; ?> )</td>
  </tr>
  <tr>
    <td width="205" align="center">NIK. <?php echo $nik3; ?></td>
    <td width="205" align="center">NIK. <?php echo $nik2; ?></td>
    <td width="205" align="center">NIK. <?php echo $nik; ?></td>
  </tr>
</table>


<br><br>
<h4 style="text-align: center;"><u>LAPORAN PELAKSANAAN LEMBUR</u></h4>
Berdasarkan Surat Tugas Lembur, yang bertanda tangan dibawah ini :<br><br>
<table border="0">
  <tr>
    <td height="15">Nama </td>
    <td>&nbsp; : <?php echo $nama; ?></td>
  </tr>
  <tr>
    <td height="15">NIK </td>
    <td>&nbsp; : <?php echo $nik; ?></td>
  </tr>
  <tr>
    <td height="15">Bagian/Divisi </td>
    <td>&nbsp; : <?php echo $divisi; ?></td>
  </tr>
  <tr>
    <td height="15">Lokasi Kerja </td>
    <td>&nbsp; : <?php echo $lokasi; ?></td>
  </tr>
</table>
<br>
<br>
Telah melaksanakan lembur pada :<br><br>
<table>
  <tr>
    <td height="15"> Hari/Tanggal </td>
    <td>&nbsp; : <?php echo date_indo($hari); ?> </td>
  </tr>
  <tr>
    <td height="15"> Jam </td>
    <td>&nbsp; : <?php echo $dari_jam; ?> s/d <?php echo $sampai_jam; ?></td>
  </tr>
</table>
<br>
Tugas yang telah diselesaikan sebagai berikut :<br>
<ul>
  <li> <?php echo $agenda_lembur; ?></li>
</ul>
<br>
<p align="right">Jakarta, <?php
                            $tanggalnya = date("Y-m-d");
                            echo date_indo($tanggalnya) ?></p>
<table border="0">
  <tr>
    <td width="205" align="center"> Mengetahui Atasan Langsung, </td>
    <td width="205" align="center"> Yang Memberi Tugas, </td>
    <td width="205" align="center"> Yang Diberi Tugas, </td>
  </tr>
  <tr>
    <td width="205" align="center"> <img width="65" src="<?php echo base_url()."assets/images/";?><?php echo $gambar1; ?>.jpg"> </td>
    <td width="205" align="center"> <img width="65" src="<?php echo base_url()."assets/images/";?><?php echo $gambar2; ?>.jpg"> </td>
    <td width="205" align="center"> <img width="65" src="<?php echo base_url()."assets/images/";?><?php echo $gambar3; ?>.jpg"> </td>
  </tr>
  <tr>
    <td width="205" align="center">( <?php echo $atasan; ?> )</td>
    <td width="205" align="center">( <?php echo $pemberi_tugas; ?> )</td>
    <td width="205" align="center">( <?php echo $nama; ?> )</td>
  </tr>
  <tr>
    <td width="205" align="center">NIK. <?php echo $nik3; ?></td>
    <td width="205" align="center">NIK. <?php echo $nik2; ?></td>
    <td width="205" align="center">NIK. <?php echo $nik; ?></td>
  </tr>
</table>

</body>
</html>
