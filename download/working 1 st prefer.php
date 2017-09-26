<?php
$filename = "file.rar";
$myFile = "http://domain.com/file.rar";

$mm_type="application/force-download";

function httpStreamSize($fd) 
{ 
  $meta_data = stream_get_meta_data($fd); 
  foreach($meta_data['wrapper_data'] as $response)  
    if (preg_match('#^Content-Length\s*:\s*(\d+)$#i', $response,$m))  
      return (int)$m[1]; 
  return null; 
} 

$fd=fopen($myFile,'r');
$size = httpStreamSize($fd); 

header("Cache-Control: public, must-revalidate");
header("Pragma: hack"); // WTF? oh well, it works...
header("Content-Type: " . $mm_type);
header("Accept-Ranges: bytes");  // Resumable?: YES! - It will tell that to download managers!
if(isset($_SERVER['HTTP_RANGE']))
{
// Resume requested
list($a, $range)=explode("=",$_SERVER['HTTP_RANGE']);
$range = str_replace("-", "", $range);
$data_left = $size - $range; // Will try to find out the piece left
header("HTTP/1.1 206 Partial Content");
header("Content-Length: $data_left");
} else {
// Normal download!
header("Content-Length: ".$size);
}
header('Content-Disposition: attachment; filename="'.$filename.'"');     
header("Content-Transfer-Encoding: binary\n");

readfile($myFile);
?>