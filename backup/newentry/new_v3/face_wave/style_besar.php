<?php 
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"<script type='text/javascript' src='tiny_mce/tiny_mce.js'></script>
<script type='text/javascript'>
tinyMCE.init({
	mode : 'textareas',
	theme : 'advanced',
	skin : 'o2k7',
	skin_variant : 'silver',

      // plugin asli
      plugins : 'imagemanager,safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
	
	//plugins : 'xhtmlxtras,imagemanager,style,table,save,emotions,media,searchreplace,paste,',

	theme_advanced_buttons1 : 'forecolor,backcolor,insertlayer,|,charmap,media,advhr,moveforward,movebackward,|,undo,redo,preview,absolute,|,sub,sup,bold,italic,underline,strikethrough, ',
	theme_advanced_buttons2 : 'copy,paste,pastetext,pasteword,|,bullist,numlist,|,link,unlink,anchor,image,cleanup,code,|,outdent,indent,blockquote,hr,attribs,visualchars,nonbreaking,',
	theme_advanced_buttons3 : 'justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect,|,styleprops,removeformat,',
<!--	theme_advanced_buttons4 : 'cite,abbr,acronym,del,ins,template,pagebreak,', -->
	theme_advanced_buttons4 : 'tablecontrols,|,visualaid,',
	
	theme_advanced_toolbar_location : 'top',
	theme_advanced_toolbar_align : 'center',
	theme_advanced_statusbar_location : 'bottom',
	theme_advanced_resizing : false



	});
</script>
";
//
?>
