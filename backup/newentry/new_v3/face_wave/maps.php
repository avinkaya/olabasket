<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA33ilUdqqcLtY9a-HP5DOZRSD_QCAcUfRoUVbu8ZbK6JaS5gAjBSq0nmzHNM7gsOO5qZpCubPlFN9PQ" type="text/javascript" charset="utf-8"></script><script type="text/javascript" charset="utf-8">
//<![CDATA[
/*************************************************
 * Created with GoogleMapAPI 2.0
 * Author: Monte Ohrt <monte AT ohrt DOT com>
 * Copyright 2005-2006 New Digital Group
 * http://www.phpinsider.com/php/code/GoogleMapAPI/
 *************************************************/
var points = [];
var markers = [];
var counter = 0;
var map = null;
function onLoad() {
if (GBrowserIsCompatible()) {
var mapObj = document.getElementById("map_id_indo");
if (mapObj != "undefined" && mapObj != null) {
map = new GMap2(document.getElementById("map_id_indo"));
map.setCenter(new GLatLng(-7.12805555556, 110.405555556), 6, G_SATELLITE_MAP);
map.addControl(new GLargeMapControl());
map.addControl(new GMapTypeControl());
var point = new GLatLng(-7.12805555556,110.405555556);
var marker = createMarker(point,"Ungaran","<div id=\"gmapmarker\" style=\"white-space: nowrap;\"><b>Ungaran</b><br><br>province : Jawa Tengah<br>location type : kabupate / kotamadya</div>", 0);
map.addOverlay(marker);
}
} else {
alert("Sorry, the Google Maps API is not compatible with this browser.");
}
}
function createMarker(point, title, html, n) {
if(n >= 0) { n = -1; }
var marker = new GMarker(point);
GEvent.addListener(marker, "mouseover", function() { marker.openInfoWindowHtml(html); });
points[counter] = point;
markers[counter] = marker;
counter++;
return marker;
}
function showInfoWindow(idx,html) {
map.centerAtLatLng(points[idx]);
markers[idx].openInfoWindowHtml(html);
}
//]]>
</script>

<?php
echo"
<script type=text/javascript charset=utf-8>
//<![CDATA[
if (GBrowserIsCompatible()) {
document.write('<div id=map_id_indo style=width:720px;height:400px></div>');
} else {
document.write('<b>Javascript must be enabled in order to use Google Maps.</b>');
}
//]]>
</script>

<script type=text/javascript><!--
google_ad_client = pub-7029918181213123;
google_alternate_ad_url = http://www.nusaland.com/ads/728_alt.php;
google_alternate_color = FFFFFF;
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = 728x90_as;
google_ad_type = text_image;
google_ad_channel =3856359994;
google_color_border = FFFFFF;
google_color_bg = FFFFFF;
google_color_link = 003366;
google_color_text = 000000;
google_color_url = 666666;
//--></script>
<script type=text/javascript
src=http://pagead2.googlesyndication.com/pagead/show_ads.js>
</script>
";
?>

<script type="text/javascript"><!--
(function(){function a(){this.t={};this.tick=function(c){this.t[c]=(new Date).getTime()};this.tick("start")}var b=new a;window.jstiming={Timer:a,load:b};if(window.external&&window.external.pageT)window.jstiming.pt=window.external.pageT;})();

var _tocPath_ = '/html/apis/maps/documentation/flash/_toc.ezt';
var codesite_token = null;
var logged_in_user_email = null;
//--></script>
<link href="codesite.css" type="text/css" rel="stylesheet">
<script src="Gcodesite.js" type="text/javascript"></script>
<script type="text/javascript">CODESITE_CSITimer['load'].tick('bhs');</script>
<link rel="search" type="application/opensearchdescription+xml" title="Google Code" href="/osd.xml">

    <script type="text/javascript" charset="utf-8">
     
    
    window._apiGadgetData_ = {
      blogFeedName: 'Google Geo Developers Blog',
      blogFeedUrl: 'http://googlegeodevelopers.blogspot.com/atom.xml',
      groupLink: 'http://groups.google.com/group/google-maps-api-for-flash',
      featureFeedUrl: 'http://google-code-featured.blogspot.com/feeds/posts/default/-/flashmaps',
      groupFeedUrl: 'http://groups.google.com/group/google-maps-api-for-flash/feed/atom_v1_0_topics.xml',
      articleLink: '/apis/maps/documentation/flash/articles.html',
      articleFeedUrl: '',
      labs: false
    };
    
</script>

<link href="local_ex.css" type="text/css" rel="stylesheet"/>
<object
      classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
      codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0"
      width="400px"
      height="300px">
      <param name="movie" value="swf/LandingPage.swf">

      <param name="quality" value="high">
      <param name="flashVars" value="key=ABQIAAAA7QUChpcnvnmXxsjC7s1fCxQGj0PqsCtxKvarsoS-iqLdqZSKfxTd7Xf-2rEc_PC9o8IsJde80Wnj4g">
      <embed
        width="400px"
        height="300px"
        src="LandingP.swf"
        quality="high"
        flashVars="key=ABQIAAAA7QUChpcnvnmXxsjC7s1fCxQGj0PqsCtxKvarsoS-iqLdqZSKfxTd7Xf-2rEc_PC9o8IsJde80Wnj4g"
        pluginspage="http://www.macromedia.com/go/getflashplayer"
        type="application/x-shockwave-flash">
      </embed>
    </object>
