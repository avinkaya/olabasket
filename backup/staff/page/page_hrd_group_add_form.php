<?php
include("dbase_conection.php");
include("page_function_time.php");
switch($_POST['v']){
    case"":
        $idd=$_POST['id'];
        $nik1=$_POST['nik1'];
        $nik2=$_POST['nik2'];
        $nama=$_POST['nama'];
        $upah=$_POST['upah'];
        $koma=$_POST['koma'];
        switch($_POST['proses']){
        case "tambah":
            if($idd==""){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink;'><b>You can not continue adding data group</b><br><i>anda tidak dapat melanjutkan penambahan data kelompok</i></div>";}
            elseif($nama==""){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink;'><b>Form the name of the group is still empty, please use the first</b><br><i>Formulir nama kelompok masih kosong, silahkan isi dahulu</i></div>";}
            elseif($nik1==""){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink;'><b>NIK employees form 1 still empty, please fill in the first</b><br><i>Formulir NIK karyawan 1 masih kosong, silahkan isi dahulu</i></div>";}
            elseif($nik2==""){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink;'><b>NIK employees form 2 still empty, please fill in the first</b><br><i>Formulir NIK karyawan 2 masih kosong, silahkan isi dahulu</i></div>";}
            elseif($upah=="" or $koma==""){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink;'><b>NIK employees form 2 still empty, please fill in the first</b><br><i>Formulir NIK karyawan 2 masih kosong, silahkan isi dahulu</i></div>";}
            elseif($_POST['proses']=="tambah"){
                $querydata1=mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$nik1'");
                $num1=mysql_num_rows($querydata1);
                $querydata2=mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$nik2'");
                $num2=mysql_num_rows($querydata2);
                if($num1==0){echo"<font style='color:red'>&nbsp;&nbsp;Your entry NIK 1 not found.</font>";}
                elseif($num1>=2){echo"<font style='color:red'>&nbsp;&nbsp;Your entry NIK 1 is many found data,</font>";}
                elseif($num2==0){echo"<font style='color:red'>&nbsp;&nbsp;Your entry NIK 1 not found.</font>";}
                elseif($num2>=2){echo"<font style='color:red'>&nbsp;&nbsp;Your entry NIK 1 is many found data,</font>";}
                else{
                    session_start();
                    $iduser=$_SESSION["sessionid"];
                    $tambah=mysql_query("INSERT INTO hrd_group VALUE ('','$idd','$nama','$nik1','$nik2','$upah','$koma','$hari','$tanggal','$bulan','$tahun','$iduser','$jam','$ip','$host','1')");    
                }            
            }
        break;
        case"delete":
            $delete=mysql_query("UPDATE hrd_group SET status=0 WHERE id like '$idd'");
            if(!$delete){echo"gagal";}
        break;
        }
    
    
        $querydata=mysql_query("SELECT*FROM hrd_group Order by id Desc");
        $numdata=mysql_num_rows($querydata)+1;
        $codeauto="G$numdata";
        $querydata0=mysql_query("SELECT*FROM hrd_group WHERE status like 1 Order by id Desc");
        $numdata0=mysql_num_rows($querydata0);
        echo"<br>
            <div id='menu_judul_inti'><b>Tambah Data Group</b></div>
            <form name='form1'>
	           <table width=100% cellspacing=10 cellpadding=0>
               <tr valign=top>
	               <td align=right> Code Team<br><small><i>Kode kelompok</i></small></td>
	               <td width=1px>:</td>
	               <td><input type='text' readonly='readonly' name='code' value='$codeauto' /> <i><small style='color:red'>Passive form, you can't edit this form</i></td>
	           </tr>
	           <tr valign=top>
	               <td width=160px align=right> Name of Team<br><small><i>Nama group</i></small></td>
	               <td width=1px>:</td>
	               <td><input name='nama' value='' type=text style='width:350px'></td>
	           </tr>
               <tr valign=top>
	               <td align=right> No. Employee 1<br><small><i>NIK Karyawan 1</i></small></td>
	               <td width=1px>:</td>
	               <td><input name='nik1'  onchange=post('page/page_hrd_group_add_form','v=checkemploye&nik='+document.form1.nik1.value,'nik1name'); type=text style='width:220px'><font id='nik1name'></form></td>
	           </tr>
               <tr valign=top>
	               <td align=right> No. Employee 2<br><small><i>NIK Karyawan 2</i></small></td>
	               <td width=1px>:</td>
	               <td><input name='nik2' onchange=post('page/page_hrd_group_add_form','v=checkemploye&nik='+document.form1.nik2.value,'nik2name'); type=text style='width:220px'><font id='nik2name'></form></td>
	           </tr>
               <tr valign=top>
	               <td align=right> Standard wage employment<br><small><i>Standar upah kerja</i></small></td>
	               <td width=1px>:</td>
	               <td>Rp. <input name='upah' type=text style='width:100px' onKeyUp='javascript:checkNumber(form1.upah);' maxlength=3> , <input name='koma' value='00' type=text style='width:35px' onKeyUp='javascript:checkNumber(form1.koma);' maxlength=2> /komponen <i></i></td>
	           </tr>
               <tr valign=top>
                    <td colspan=3>
                        <input type=button value='Tambah' onclick=post('page/page_hrd_group_add_form','proses=tambah&id='+document.form1.code.value+'&nik1='+document.form1.nik1.value+'&nik2='+document.form1.nik2.value+'&nama='+document.form1.nama.value+'&upah='+document.form1.upah.value+'&koma='+document.form1.koma.value,'proses');>&nbsp;&nbsp;
                        <input type=reset value='Hapus'>
                    </td>
               </tr>
               </table></form><br><br>
               <div style='padding:7 7 7 7;' id='tableinti'>
               <table width=100% cellspacing=1 cellpadding=5 border=0>
               <tr valign=top bgcolor=#C10000>
                    <th width=20px>No</th>
                    <th width=70px>Kode</th>
                    <th width=200px>Group</th>
                    <th width=250px>Personil</th>
                    <th width=110px>Tanggal Input</th>
                    <th width=100px>Upah</th>
                    <th width=100px>Pengelolaan</th>
               </tr>
        ";     $no=1;
                if($numdata0==0){
                    echo"
                        <tr><td colspan=6>Belum ada data group</td></tr>
                    ";
                }else{
                while($data=mysql_fetch_array($querydata0)){
                    $nama1=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik1]'"));
                    $nama2=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik2]'"));
                    $nama1[nama]=strtolower($nama1[nama]);$nama2[nama]=strtolower($nama2[nama]);$data[nama]=strtoupper($data[nama]);
                    echo"
                        <tr valign=top>
                            <td>$no.</td>
                            <td>$data[code]</td>
                            <td>$data[nama]</td>
                            <td>$nama1[nama] ($data[nik1])<br>$nama2[nama] ($data[nik2])</td>
                            <td>$data[hari], $data[tgl_entry]-$data[bln_entry]-$data[thn_entry]</td>
                            <td>Rp. ,00</td>
                            <td align=center>
                                <a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=detail&id=$data[id]','detail');>Detail</a> | 
                                <a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','proses=delete&id=$data[id]','proses');>Hapus</a></td>
                        </tr>
                    ";$no++;
                }}            
    echo"      </table>
               </div><div id='detail'></div>
        ";
    break;
    
    case"checkemploye":
        $nik=$_POST['nik'];
        $querydata=mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$nik'");
        $num=mysql_num_rows($querydata);
        if($nik==""){}
        elseif($num==0){echo"<font style='color:red'>&nbsp;&nbsp;Your entry NIK not found.</font>";}
        elseif($num>=2){echo"<font style='color:red'>&nbsp;&nbsp;Your entry NIK many found data,</font>";}
        else{
            $data=mysql_fetch_array($querydata);$data[nama]=strtoupper($data[nama]);
            echo"&nbsp;&nbsp;Name : <b>$data[nama]</b>";
        }
    break;
    case"proses":
        
        $querydata=mysql_query("SELECT*FROM hrd_group WHERE status like 1 Order by id Desc");
        $numdata=mysql_num_rows($querydata)+1;
        echo"<br>
            <div style='padding:7 7 7 7;' id='tableinti'>
               <table width=100% cellspacing=1 cellpadding=5 border=0>
               <tr valign=top bgcolor=#C10000>
                    <th width=20px>No</th>
                    <th width=100px>Kode</th>
                    <th width=250px>Group</th>
                    <th width=250px>Personil</th>
                    <th width=110px>Tanggal Input</th>
                    <th width=100px>Pengelolaan</th>
               </tr>
        ";      $no=1;
                while($data=mysql_fetch_array($querydata)){
                    echo"
                        <tr valign=top>
                            <td>$no.</td>
                            <td>$data[code]</td>
                            <td>$data[nama]</td>
                            <td>NIK.$data[nik1]<br>NIK.$data[nik2]</td>
                            <td>$data[tgl_entry]-$data[bln_entry]-$data[thn_entry]</td>
                            <td>Detail</td>
                        </tr>
                    ";$no++;
                }               
        echo"  </table>
               </div>
        ";
    break;
    
    case"detail":
        include("page_fungsi_php.php");
        $id=$_POST['id'];
        $group=mysql_fetch_array(mysql_query("SELECT*FROM hrd_group WHERE id like '$id'"));
        $perso1=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$group[nik1]'"));
        $perso2=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$group[nik2]'"));
        $perso1[nama]=strtoupper($perso1[nama]);
        $perso2[nama]=strtoupper($perso2[nama]);
        if($id==""){}else{
	       echo"
                <div style='position:fixed; left:0%; top:10%; width:100%' align=center>
				<div style='padding:5 10 5 10;width:800px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>[ $group[code] ]&nbsp;&nbsp;$group[nama]</b></div>
				<div style='padding:0 0 10 0;width:820px;border:solid 1px #6F0000;background:white' align=center>
					<table border=0 width=100% cellspacing=0 cellpadding=0>
                    <tr bgcolor=black>
                        <td width=50% align=right style='border-bottom:solid 1px black'><img src='user_photo/$perso1[photo]' height=300px></td>
                        <td width=50% align=left style='border-bottom:solid 1px black'><img src='user_photo/$perso2[photo]' height=300px></td>
                    </tr>
                    <tr valign=top>
                        <td align=right style='padding:0 10 0 0'>
                            <b style='font-size:15px'>$perso1[nama]</b><br>
                            NIK. $group[nik1]<br>
                            
                        </td>
                        <td align=left style='padding:0 0 0 10'>
                            <b style='font-size:15px'>$perso2[nama]</b><br>
                            NIK. $group[nik2]<br>
                        </td>
                    </tr>
                    </table>
                    <br><br>
                    <input type='button' value='Close' style='padding:5 20 5 20;' onclick=post('page/page_hrd_group_add_form','v=detail','detail')>&nbsp;&nbsp;
				</div>
				</div>	
	       ";
        }
     break;
     
     case"search":
        echo"<form name=form1>
            <div id='menu_judul_inti'>
                <input type=text name=kunci style='padding:7 7 7 7;font-size:13px;width:200px'>
                    <select name=type>
                        <option value='code'>Kode group</option>
                        <option value='nama'>Nama group</option>
                        <option value='nik'>NIK</option>
                    </select>
                <input type=button value=' Cari ' onclick=post('page/page_hrd_group_add_form','v=search&type='+document.form1.type.value+'&kunci='+document.form1.kunci.value,'proses')>
            </div></form>
        ";
        switch($_POST['proses']){
        case"delete":
            $idd=$_POST['id'];
            $delete=mysql_query("UPDATE hrd_group SET status=0 WHERE id like '$idd'");
            if(!$delete){echo"gagal";}
        break;
        }   
     
        $type=$_POST['type'];
        $kunci=$_POST['kunci'];        
        if($type!=""&$kunci!=""){
            if($type=="nik"){$type="nik1";$tambahan="OR nik2 like '%$kunci%'";}
            $querydata0=mysql_query("SELECT*FROM hrd_group WHERE status like 1 and $type like '%$kunci%' $tambahan Order by id Desc");
            $numdata0=mysql_num_rows($querydata0);
            echo"<br>
               <div style='padding:7 7 7 7;' id='tableinti'>
               <table width=100% cellspacing=1 cellpadding=5 border=0>
               <tr valign=top bgcolor=#C10000>
                    <th width=20px>No</th>
                    <th width=70px>Kode</th>
                    <th width=200px>Group</th>
                    <th width=250px>Personil</th>
                    <th width=110px>Tanggal Input</th>
                    <th width=100px>Pengelolaan</th>
               </tr>
            ";  $no=1;
                if($numdata0==0){
                    echo"
                        <tr><td colspan=6>Data yang anda maksud tidak diketemukan</td></tr>
                    ";
                }else{
                while($data=mysql_fetch_array($querydata0)){
                    $nama1=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik1]'"));
                    $nama2=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik2]'"));
                    $nama1[nama]=strtolower($nama1[nama]);$nama2[nama]=strtolower($nama2[nama]);$data[nama]=strtoupper($data[nama]);
                    echo"
                        <tr valign=top>
                            <td>$no.</td>
                            <td><a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=detail&id=$data[id]','detail');>$data[code]</a></td>
                            <td><a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=detail&id=$data[id]','detail');>$data[nama]</a></td>
                            <td>$nama1[nama] ($data[nik1])<br>$nama2[nama] ($data[nik2])</td>
                            <td>$data[hari], $data[tgl_entry]-$data[bln_entry]-$data[thn_entry]</td>
                            <td align=center> 
                                <a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=search&proses=delete&id=$data[id]','proses');>Hapus</a></td>
                        </tr>
                    ";$no++;
                }}            
            echo" <tr><td colspan=6>Jumlah data yang ditemukan $numdata0</td></tr></table></div><div id='detail'></div>";
        }
     break;
     
     case"daftar":
        switch($_POST['proses']){
        case"delete":
            $idd=$_POST['id'];
            $delete=mysql_query("UPDATE hrd_group SET status=0 WHERE id like '$idd'");
            if(!$delete){echo"gagal";}
        break;
        }
        $querydata0=mysql_query("SELECT*FROM hrd_group WHERE status like 1 Order by id Desc");
        $numdata0=mysql_num_rows($querydata0);
        echo"<br>
            <div id='menu_judul_inti'><b>Daftar Group Pecah</b></div>
            <br>
               <div style='padding:7 7 7 7;' id='tableinti'>
               <table width=100% cellspacing=1 cellpadding=5 border=0>
               <tr valign=top bgcolor=#C10000>
                    <th width=20px>No</th>
                    <th width=70px>Kode</th>
                    <th width=200px>Group</th>
                    <th width=250px>Personil</th>
                    <th width=110px>Tanggal Input</th>
                    <th width=100px>Pengelolaan</th>
               </tr>
        ";     $no=1;
                if($numdata0==0){
                    echo"
                        <tr><td colspan=6>Belum ada data group</td></tr>
                    ";
                }else{
                while($data=mysql_fetch_array($querydata0)){
                    $nama1=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik1]'"));
                    $nama2=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik2]'"));
                    $nama1[nama]=strtolower($nama1[nama]);$nama2[nama]=strtolower($nama2[nama]);$data[nama]=strtoupper($data[nama]);
                    echo"
                        <tr valign=top>
                            <td>$no.</td>
                            <td><a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=detail&id=$data[id]','detail');>$data[code]</a></td>
                            <td><a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=detail&id=$data[id]','detail');>$data[nama]</a></td>
                            <td>$nama1[nama] ($data[nik1])<br>$nama2[nama] ($data[nik2])</td>
                            <td>$data[hari], $data[tgl_entry]-$data[bln_entry]-$data[thn_entry]</td>
                            <td align=center> 
                                <a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=daftar&proses=delete&id=$data[id]','proses');>Hapus</a></td>
                        </tr>
                    ";$no++;
                }}            
        echo" </table></div><div id='detail'></div>";
     break;
     
     
     
     
     case"input_gaji":
        echo"
		<div id='menu_judul_inti' style='border:solid 1px #808080'><b>Penggajian Group</b> | Formulir Input Gaji</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=baru','gaji');>Masukkan Harga</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=aktif','gaji');>Masukkan Hasil</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=pasif','gaji');>Lihat Gaji</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=mantan','gaji');>Rekap Gaji</a>
		</div></div><div style='height:3px;background:black'></div>
		<div id='gaji'></div>
	";
     break;
}

?>
