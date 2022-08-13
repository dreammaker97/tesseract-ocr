<?php
$lang = $_GET["lang"];
$img = $_GET["img"];

if (empty($img)) {
    $img = $_SERVER["QUERY_STRING"];
    $lang = "eng";
}

if($img){
shell_exec("wget ".$img." -O /var/www/html/images/img.png");
shell_exec('tesseract /var/www/html/images/img.png /var/www/html/out -l '.$lang);
$txt = file_get_contents("out.txt");
$js = array("language"=>$lang,"img"=>$img,"text"=>$txt);
echo(json_encode($js));
}
else {
    echo "error";
}