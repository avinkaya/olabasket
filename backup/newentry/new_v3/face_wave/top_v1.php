<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$line="<td width='1'><div style='width:1px;background:green;height:30px'></div></td>";
//url(gambar/peta.jpg) top no-repeat fixed;
echo"
<body onload='timerONE=window.setTimeout(scrollit_r21(100),500)' style='background:#fff '>
<div  align=center>
<div style='width:903px;background:black' align=center>
<table width='900' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#351404'>
  <tr>
    <td class='linehead'>&nbsp;</td>
  </tr>
  <tr>
    <td height='103'><table width='100%' border='0' cellspacing='0' cellpadding='0' background='gambar/i.jpg'>
      <tr>
        <td width='79' style='padding:10px'><div align='center'>
	<a href='http://www.kavinkayu.com/newentry'>
	<img src='gambar/logo.gif' alt='Kopma' title='kavinkayu.com' width='110px' style='border:solid 0px white' /></a>
	</div></td>
        <td width='592' class='tekshead'><strong>
		<span class='style4' style='color:red;font-size:30px;font-family:Century Schoolbook L, times new rowman;text-shadow:1px 1px black'>
		<small style='font-family:arial;color:yellow;font-size:13px'>$site[ket]</small><br>
		$site[perusahaan]</span><br></strong>
		<small style='font-family:arial;color:black;font-size:13px;'>$site[alamat]</small><br>
		</strong></td>
        <td width='229' align='right' valign='top' style='padding:20px;'>
<!--
	<div id='google_translate_element'></div>
	<script>
		function googleTranslateElementInit() {
	  	new google.translate.TranslateElement({
		    pageLanguage: 'id',
		    includedLanguages: 'af,ar,zh-CN,nl,en,fr,de,el,hi,it,ja,ko,ru,th,vi'
			}, 'google_translate_element');
		}
	</script>
	<script src='http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
	</div>-->
	</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height='30' background='gambar/bg_menu0.jpg'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
      <tr>
        <td class='menu linehead' title='Back to home page'><a href='../new_v4/?'>Camellia House</a></td>$line
        <td class='menu linehead' title='Back to home page'><a href='?'>Home</a></td>$line
        <td class='menu linehead' title='The newentry profile company'><a href='?".md5("page_halaman")."=".md5("halaman_profil_view")."&&".md5("id_data")."=1'>Profile</a></td>$line
        <td class='menu linehead' title='The newentry business company'><a href='?".md5("page_halaman")."=".md5("halaman_profil_view")."&&".md5("id_data")."=2'>Company</a></td>$line
        <td class='menu linehead' title='Forum Tanya Jawab'><a href='?".md5("page_halaman")."=".md5("forum")."'>F . A. Q</a></td>$line
        $button1 $line $button2
      </tr>
    </table></td>
  </tr>
  </table>
";
?>
