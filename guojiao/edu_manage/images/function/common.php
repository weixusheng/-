<!--��վ���õ��ĺ�������-->
<?php
//ѧ�ڽ�ȡ���������á�����
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
//html�ַ������ˣ�ɾ�����ַ����е�html����
function deletehtmlandjs($str) {
    $str= trim($str);
     if (strlen($str) <= 0) {
     return $str;
}
    $search = array ("'<script[^>]*?>.*?</script>'si",      // ȥ�� javascript
        "'<[\/\!]*?[^<>]*?>'si",          // ȥ�� HTML ���
        "'([\r\n])[\s]+'",            // ȥ���հ��ַ�
        "'&(quot|#34);'i",            // �滻 HTML ʵ��
        "'&(amp|#38);'i",
        "'&(lt|#60);'i",
        "'&(gt|#62);'i",
        "'&(nbsp|#160);'i"
    );                  // ��Ϊ PHP ��������

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
//���swf��ʽ��flash��$fnameΪ��Ƶ���ƣ����ú�׺��
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