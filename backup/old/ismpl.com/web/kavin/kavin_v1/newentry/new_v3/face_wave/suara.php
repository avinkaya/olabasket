<?php
$suara=$_GET['suara'];
echo"
                <object type='application/x-shockwave-flash' data='tag/Video/mp3player.swf' id='audioplayer1' height='2' width='2'>
                        <param name='FlashVars' value='autostart=yes&amp;playerID=1&amp;bg=0xCDDFF3&amp;leftbg=0x357DCE&amp;lefticon=0xF2F2F2&amp;rightbg=0x357DCE&amp;rightbghover=0x6797CC&amp;righticon=0xF2F2F2&amp;righticonhover=0xF2F2F2&amp;text=0x357DCE&amp;slider=0x357DCE&amp;track=0xFFFFFF&amp;loader=0x72A4DD&amp;border=0xFFFFFF&amp;soundFile=$suara'>
                        <param name='quality' value='high'>
                        <param name='menu' value='true'>
                        <param name='wmode' value='transparent'>
                </object>&nbsp;
";
?>
