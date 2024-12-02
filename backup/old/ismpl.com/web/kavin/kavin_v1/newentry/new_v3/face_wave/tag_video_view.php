
<?php

echo"
<div align=left >
<table border=0 cellspacing=0 cellpadding=0  >
<tr>
        <td style='font-size:12px;width:90px;border-bottom:solid 1px #eeeeee;border-top:solid 1px #eeeeee;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;background:#fcfcfc;padding:10 10 10 10;' align=center>
                <a href='javascript:void()' onclick=menu('face_wave/streaming_1','','komentar')>Video</a></td>
        <td style='font-size:12px;width:90px;border-bottom:solid 1px #eeeeee;border-top:solid 1px #eeeeee;border-right:solid 1px #eeeeee;background:#fcfcfc;padding:10 10 10 10;' align=center>
                <a href='javascript:void()' onclick=menu('face_wave/streaming_2','','komentar')>Audio</td>
        <td style='font-size:12px;width:90px;border-bottom:solid 1px #eeeeee;border-top:solid 1px #eeeeee;border-right:solid 1px #eeeeee;background:#fcfcfc;padding:10 10 10 10;' align=center>
                <a href='javascript:void()' onclick=menu('face_wave/streaming_3','','komentar')>Searching</td>
        <td style='font-size:12px;width:90px;border-bottom:solid 1px #eeeeee;border-top:solid 1px #eeeeee;border-right:solid 1px #eeeeee;background:#fcfcfc;padding:10 10 10 10;' align=center>
                <a href='javascript:void()' onclick=menu('face_wave/streaming_4','','komentar')>Populer</td>
        <td style='font-size:12px;width:90px;border-bottom:solid 1px #eeeeee;border-top:solid 1px #eeeeee;border-right:solid 1px #eeeeee;background:#fcfcfc;padding:10 10 10 10;' align=center>
                <a href='javascript:void()' onclick=menu('face_wave/streaming_5','','komentar')>Upload </td>
</tr>
</table></div>

<div style='height:2px'><script language=javascript> menu('face_wave/streaming','".md5("id_data")."=0','player')</script></div>
<div id='player'></div>
<div id='komentar'></div>
";


?>

