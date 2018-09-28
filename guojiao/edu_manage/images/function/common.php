<!--网站中用到的函数集合-->
<?php
//学期截取，过长的用…代替
function cleanString($str,$start,$len) {
$tmpstr = "";
$strlen = $start + $len;
for($i = 0; $i < $strlen; $i++) {
if(ord(substr($str, $i, 1)) > 0xa0) {
$tmpstr .= substr($str, $i, 2);
	$i++;
} else
$tmpstr .= substr($str, $i, 1);
}
if(strlen($str)>$len){
	return $tmpstr;
}
else {
	return $tmpstr;
}
}
//html字符串过滤，删除掉字符串中的html代码
function deletehtmlandjs($str) {
    $str= trim($str);
     if (strlen($str) <= 0) {
     return $str;
}
    $search = array ("'<script[^>]*?>.*?</script>'si",      // 去掉 javascript
        "'<[\/\!]*?[^<>]*?>'si",          // 去掉 HTML 标记
        "'([\r\n])[\s]+'",            // 去掉空白字符
        "'&(quot|#34);'i",            // 替换 HTML 实体
        "'&(amp|#38);'i",
        "'&(lt|#60);'i",
        "'&(gt|#62);'i",
        "'&(nbsp|#160);'i"
    );                  // 作为 PHP 代码运行

    $replace = array ("",
        "",
        "\\1",
        "\"",
        "&",
         "<",
        ">",
        " "
   );

   return @preg_replace ($search, $replace, $str);
}
//输出swf格式的flash，$fname为视频名称，不用后缀名
function outFlash($fname)
{
	$ret="";
	$ret .= "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\" width=\"698\" height=\"600\">";
	$ret .= "<param name=\"movie\" value=\"file/gzzd/" . $fname . ".swf\" />";
	$ret .= "<param name=\"quality\" value=\"high\" />";
	$ret .= "<embed src=\"file/gzzd/" . $fname . ".swf\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"698\" height=\"600\"></embed>";
	$ret .= "</object>";
	return $ret;
}

function OutFlv($name)
        {
            $ret="";
            $ret .= "<div align=\"center\"><object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0\"width=\"450\" height=\"450\">";
            $ret .= "<param name=\"movie\" value=\"flash/Flvplayer.swf\" />";
            $ret .= "<param name=\"quality\" value=\"high\" />";
            $ret .= "<param name=\"allowFullScreen\" value=\"true\" />";
            $ret .= "<param name=\"FlashVars\" value=\"vcastr_file=" . $name . ".flv\" />";
            $ret .= " <embed src=\"flash/Flvplayer.swf\" allowfullscreen=\"true\" flashvars=\"vcastr_file=" . $name . ".flv\"quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"450\" height=\"450\"></embed>";
            $ret .= "</object></div>";
            return $ret;
        }
?>