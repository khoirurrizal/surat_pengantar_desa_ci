<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	
.table {
    font-family: serif;
    font-size: 12pt;
    color: black;
    border-collapse: collapse;
}
 
.table, th, td {
    border: 0px solid black;
    padding: 2px 5px;
}



.page_break { page-break-after: always; }

</style>
</head>
<body>
  <p align="center"><b style="font-size: 20px">
    RUKUN TETANGGA 04/028 DESA ALBAHAR <br>
    HARAPAN JAYA - BEKASI UTARA <br>
      
    <hr size="4.5px">
  </b></p>

  <p  align="center"><b>
    <u style="font-size: 20px">SURAT PENGANTAR</u> <br>
    <?php foreach($record->result_array() as $sp) : ?>
      <?php $tgl = $sp['tanggal_buat']; ?>
    NO. <?php echo $sp['no_surat'] ?>/INT/III/<?php echo date('Y', strtotime($tgl)) ?>
    <?php endforeach; ?>
  </b></p>
<p>
  Yang bertanda tangan dibawah ini ketua RT.07 RW.10 Desa Pasir Angin Kecamatan Cileungsi Kabupaten Bogor, Menerangkan bahwa :
</p>
	

<h1></h1>

<table class="table"  width="90%"  align="center">
  <thead>
      <?php foreach($record->result_array() as $sp) : ?>
    <tr>
      <td align="center" width="5%" scope="col" >1</td>
      <td align="left" width="22%" scope="col" >Nama Lengkap</td>
      <td width="2%" scope="col" >:</td>
      <td width="65%" scope="col" ><?php echo $sp['nama_lengkap'] ?></td>
    </tr>
    <tr>
      <td align="center" width="5%" scope="col" >2</td>
      <td width="22%" scope="col" >Tempat/Tgl Lahir</td>
      <td width="2%" scope="col" >:</th>
        <?php $ttl = $sp['tanggal_lahir']; $convertDate = format_indo(date("Y-m-d", strtotime($ttl)));?>
      <td width="73%" scope="col" ><?php echo $sp['tempat'].', '.$convertDate ?></td>
    </tr>
    <tr>
      <td align="center" width="5%" scope="col" >3</td>
      <td width="22%" scope="col" >Jenis Kelamin</td>
      <td width="2%" scope="col" >:</td>
      <td width="73%" scope="col" ><?php echo ($sp['jk'] == 'L' ? 'Laki - laki' :  'Perempuan') ?></td>
    </tr>
    <tr>
      <td align="center" width="5%" scope="col" >4</td>
      <td width="22%" scope="col" >Agama</td>
      <td width="2%" scope="col" >:</td>
      <td width="73%" scope="col" ><?php echo $sp['agama'] ?></td>
    </tr>
    <tr>
      <td align="center" width="5%" scope="col" >5</td>
      <td width="22%" scope="col" >Alamat</td>
      <td width="2%" scope="col" >:</td>
      <td width="73%" scope="col" ><?php echo $sp['alamat'] ?></td>
    </tr>
    <tr>
      <td align="center" width="5%" scope="col" >6</td>
      <td width="22%" scope="col" >Keperluan</td>
      <td width="2%" scope="col" >:</td>
      <td width="73%" scope="col" ><?php echo $sp['keperluan'] ?></td>
    </tr>
  </thead>
  <?php endforeach; ?>
  </table>
  <p>Demikian Surat keterangan ini dibuat untuk dapat dipergunakan sesuai dengan keperluanya.</p>
  

<h1></h1>
<h1></h1>
<table class="table" border="1"  width="100%" >
  <thead>
      <?php foreach($record->result_array() as $sp) : ?>
    <tr>
      <?php $tgl = $sp['tanggal_buat']; $tanggal_buat = format_indo(date("Y-m-d", strtotime($tgl)));?>
      <td  width="40%" scope="col" >Bogor, <?php echo $tanggal_buat ?></td>
      <td  width="10%" scope="col" ></td>
      <td  width="40%" scope="col" ></td>
    </tr>
    <tr>
      <td  height="10" scope="col" ></td>
      <td  height="10" scope="col" ></td>
      <td  height="10" scope="col" ></td>
    </tr>
    <tr>
      <td align="center" width="40%" scope="col" >Pemohon</td>
      <td  width="20%" scope="col" ></td>
      <td align="center" width="40%" scope="col" >Ketua RT.07 RW.10</td>
    </tr>
    <tr>
      <td  height="60" scope="col" ></td>
      <td  height="60" scope="col" ></td>
      <td  height="60" scope="col" ></td>
    </tr>
    <tr>
      <td align="center" width="40%" scope="col" >(___________________)</td>
      <td  width="10%" scope="col" ></td>
      <td align="center" width="40%" scope="col" >(___________________)</td>
    </tr>
    <tr>
      <td  height="90" scope="col" ></td>
      <td  height="90" scope="col" ></td>
      <td  height="90" scope="col" ></td>
    </tr>
     <tr>
      <td  width="40%" scope="col" ></td>
      <td align="center" width="20%" scope="col" >Mengetahui</td>
      <td  width="40%" scope="col" ></td>
    </tr>
    <tr>
      <td  width="40%" scope="col" ></td>
      <td align="center" width="20%" scope="col" >Ketua RW.10</td>
      <td  width="40%" scope="col" ></td>
    </tr>
    <tr>
      <td  height="60" scope="col" ></td>
      <td  height="60" scope="col" ></td>
      <td  height="60" scope="col" ></td>
    </tr>
    <tr>
      <td  width="40%" scope="col" ></td>
      <td align="center" width="20%" scope="col" >(___________________)</td>
      <td  width="40%" scope="col" ></td>
    </tr>
    
  </thead>
      <?php endforeach; ?>
  
</table> 
</body>
</html>
