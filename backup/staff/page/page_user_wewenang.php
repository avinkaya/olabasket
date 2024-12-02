<?php
SWITCH($_SESSION["sessionidwewenang"]){
case "1":
echo"
	<img src='images/top_user.gif' width=197px>
	<div style='border:solid 2px rgb(138,40,41)'>
     		<div id='menuakun'><a href='#' onclick=post('SS','','intipage')><b>Add User</b><br>&nbsp;&nbsp;&nbsp;<i>Menambahkan akun user</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('S','','intipage')><b>Search User</b><br>&nbsp;&nbsp;&nbsp;<i>Pencarian user</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('S','','intipage')><b>List User</b><br>&nbsp;&nbsp;&nbsp;<i>Daftar user</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('S','','intipage')><b>Visitors reports</b><br>&nbsp;&nbsp;&nbsp;<i>Laporan kunjungan</i></a></div>
	</div><br>
	<img src='images/top_personalia.gif' width=197px>
		<div style='border:solid 2px rgb(138,40,41)'>
		<div id='menuakun'><a href='#' onclick=post('page/page_staff_add','','intipage')><b>Add Staff</b><br>&nbsp;&nbsp;&nbsp;<i>Menambahkan Staff</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_work_add','','intipage')><b>Add Worker</b><br>&nbsp;&nbsp;&nbsp;<i>Menambahkan Karyawan</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_staff_add_form','".md5("v")."=".md5("s")."','intipage')><b>Search Staff</b><br>&nbsp;&nbsp;&nbsp;<i>Pencarian Staff</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_work_add_form','".md5("v")."=".md5("s")."','intipage')><b>Search Worker</b><br>&nbsp;&nbsp;&nbsp;<i>Pencarian Karyawan</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_staff_list','','intipage')><b>List Staff</b><br>&nbsp;&nbsp;&nbsp;<i>Daftar Staff</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_work_list','','intipage')><b>List Worker</b><br>&nbsp;&nbsp;&nbsp;<i>Daftar Karyawan</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')><b>Staff Attendance</b><br>&nbsp;&nbsp;&nbsp;<i>Presensi Staff</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')><b>Worker Attendance</b><br>&nbsp;&nbsp;&nbsp;<i>Presensi Karyawan</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')><b>Staff Attendance Report</b><br>&nbsp;&nbsp;&nbsp;<i>Laporan Presensi Staff</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')><b>Worker Attendance Report</b><br>&nbsp;&nbsp;&nbsp;<i>Laporan Presensi Karyawan</i></a></div>
        </div><br>
	<img src='images/top_marketing.gif' width=197px>
		<div style='border:solid 2px rgb(138,40,41)'>
		<div id='menuakun'><a href='#' onclick=post('page/market_kontrak_kerja','','intipage')>Add Kontrak Kerja<br><i></i></a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>Box Kontrak Produksi<br><i></i></a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')></a></div>
	</div><br><br>
	<div id='menuakunjudul'><b>Fabric Warehouse</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/product_fabric_printed','','intipage')></a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')></a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')></a></div>
	<br><br>
	<div id='menuakunjudul'><b>Design patterns</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/xv','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
	<div id='menuakunjudul'><b>Part Cutting</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/v','','intipage')>Cloth Cutting Report</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
		<div id='menuakunjudul'><b>Aircraft Parts</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/v','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
	<div id='menuakunjudul'><b>Sewing Parts</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/v','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
	<div id='menuakunjudul'><b>Quality Control</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/v','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
	<div id='menuakunjudul'><b>Iron Parts</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/v','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
	<div id='menuakunjudul'><b>Packing</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/v','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
	<div id='menuakunjudul'><b>parts Delivery</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/v','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
	<br><br>
	<div id='menuakunjudul'><b>parts Delivery</b></div>
     		<div id='menuakun'><a href='#' onclick=post('page/xx','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
		<div id='menuakun'><a href='#' onclick=post('sS','','intipage')>&nbsp;</a></div>
";
break;

case "2":
echo"
	<img src='images/top_personalia.gif' width=197px>
	<div style='border:solid 2px rgb(138,40,41)'>
 		<div id='menuakun'><a href='#' onclick=post('page/page_hrd_add_jabatan','','intipage')><b>Composition of the Working</b><br>&nbsp;&nbsp;&nbsp;<i>Susunan Kerja</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_work_add','','intipage')><b>Add Worker</b><br>&nbsp;&nbsp;&nbsp;<i>Menambahkan Karyawan</i></a></div>
	   	<div id='menuakun'><a href='#' onclick=post('page/page_hrd_absen','','intipage')><b>Worker Attendance</b><br>&nbsp;&nbsp;&nbsp;<i>Presensi Karyawan</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_hrd_group_add','','intipage')><b>Group Gelar</b><br>&nbsp;&nbsp;&nbsp;<i>Kelola & Gaji group</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('page/page_hrd_sewing_work','','intipage')><b>Sewing Work</b><br>&nbsp;&nbsp;&nbsp;<i>Kerja Penjahitan</i></a></div>
	</div>
";
break;

case "3":
echo"
	<img src='images/top_marketing.gif' width=197px>
	<div style='border:solid 2px rgb(138,40,41)'>
		<div id='menuakun'><a href='#' onclick=post('page/market_kontrak_kerja','','intipage')>Work Contract<br><i>&nbsp;&nbsp;&nbsp;Kontrak kerja</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>Style Data<br>&nbsp;&nbsp;&nbsp;<i>Data Style Perusahaan</i></a></div>
		<div id='menuakun'><a href='#' onclick=post('aa','','intipage')>Order Quantity<br>&nbsp;&nbsp;&nbsp;<i>Jumlah Order</i></a></div>
	</div><br><br>
";
break;
}
?>
