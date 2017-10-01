<?

ob_end_flush();     
function ob_gzip($content){  
if(!headers_sent()&&extension_loaded("zlib")&&strstr($_SERVER["HTTP_ACCEPT_ENCODING"],"gzip")){  
$content = gzencode($content,9);  
header("Content-Encoding: gzip");  
header("Vary: Accept-Encoding");  
header("Content-Length: ".strlen($content));  
}  
return $content;  
} 

?>