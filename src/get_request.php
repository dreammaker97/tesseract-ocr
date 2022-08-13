<?php
// Update 7/7/2022

function get_request($url, $headers=[], $isheaders=0, $followlocation=0) {
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, $isheaders);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $followlocation);

$resp = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($resp, 0, $header_size);
$body = substr($resp, $header_size);

curl_close($ch);
$text = $headers.$body;
return $text;
}

function get_homeproxy($url, $headers=[], $isheaders=0, $followlocation=0) {
$proxy = 'txmihome2612.ddns.net:10000';
$passw = 'aaaaaaaa:aaaaaaaa';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $passw);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, $isheaders);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $followlocation);

$resp = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($resp, 0, $header_size);
$body = substr($resp, $header_size);

curl_close($ch);
$text = $headers.$body;
return $text;
}

function post_request($url, $data, $headers=[], $isheaders=0, $followlocation=0){
$ch = curl_init($url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, $isheaders);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $followlocation);

$resp = curl_exec($ch);
$header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
$headers = substr($resp, 0, $header_size);
$body = substr($resp, $header_size);

curl_close($ch);
$text = $headers.$body;
return $text;
}

function tag_contents($string, $tag_open, $tag_close){
   foreach (explode($tag_open, $string) as $key => $value) {
       if(strpos($value, $tag_close) !== FALSE){
            $result[] = substr($value, 0, strpos($value, $tag_close));;
       }
   }
   return $result;
}

function write($txt,$filename) {
    $handle = fopen($filename, "w");
    fwrite($handle, $txt);
    fclose($handle);
}

// Nhập vào đường dẫn
// Trả về array file name
function scanfolder($path="") {
    $path = urldecode($path);
    $dir = "./" . $path;
    $list = scandir($dir);
    return $list;
}

// Nhập array file name
// Trả về array a <link>
function folderui($path) {
  $path = urldecode($path);
  $dir = "./" . $path;
  $list = scandir($dir);
  $lista = "";
  foreach($list as $key => $filename) {
      if ($filename == "." or $filename == ".." or $filename == "old" or $filename == "~$!A.xlsx" ) {continue;}
      if (strpos($filename,".")){
        $lista = $lista . "<a href='.".$path.'/'.$filename."'>".$filename."</a><br>";
      }
      else {
        $lista = $lista . "<a href='?".$path.'/'.$filename."'>".$filename."</a><br>";
      }
      
    }
  return $lista;
}


?>