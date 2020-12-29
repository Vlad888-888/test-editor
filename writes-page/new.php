<?php
$din_obj_count=100;
$wl=' style="width:1200px;height:800px;border-width:0px;border-style:dashed;overflow: auto;position: absolute;left:50%;top: 50%;transform: translate(-50%, -50%);"';
$page_info.='<div id="objinfo0" name="objinfo0" class="objinfo" style="position:absolute;top:1px;left:1px;height:20px;width:100px;z-index:1000;display:none;background-color: transparent;"></div>';
$i=1;
for($x=1;$x<=10;$x++){
  for($y=1;$y<=10;$y++){
$page_info.='
<div id="objinfo'.$i.'" name="objinfo'.$i.'" style="position:absolute;top:'.(1+($y*60)).'px;left:'.(1+($x*100)).'px;height:20px;width:100px;z-index:'.(1000+$i).';display:none;">
'.$i.'
</div>
';
$i++;
}
}
$page_info.='
<!-- end -->
<input type=image id="ugollt" name="" value="" src="writes-page/image/ugollt.png" alt="close" style="position:absolute;top:25px;left:25px;display:none;z-index:5000;">
<input type=image id="ugolrb" name="" value="" src="writes-page/image/ugolrb.png" alt="close" style="position:absolute;top:25px;left:25px;display:none;z-index:5000;">
';
$page_info.='</div>';
?>