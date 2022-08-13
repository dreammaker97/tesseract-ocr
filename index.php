<html>
<body>

<h1 style="text-align:center">Bài kiểm tra giữa kỳ</h3>
<p>Họ và tên: Phạm Tuấn Anh. MSSV:20150171</p>
<p>Chủ đề: Nhận dạng text từ file ảnh.</p>
<fieldset>
<legend>Upload file ảnh:</legend>
<form action="" method="POST" enctype="multipart/form-data">
<p>Ngôn ngữ:</p>
<input type="radio" id="html" name="language" value="eng" checked="checked" />
<label for="html">English</label>
<input type="radio" id="html" name="language" value="vie" />
<label for="html">Vietnamese</label><br><br>
<label for="image">Upload file ảnh:</label>
<input type="file" name="image" /><br><br>
<label for="url">Hoặc nhập vào địa chỉ URL:</label>
<input type="" name="url" /><br><br>
<input type="submit"/>
</fieldset>
</form>


<?php
$lang = $_POST["language"];
$url = $_POST["url"];
if($url) {
shell_exec("wget ".$img." -O /var/www/html/images/img.png");
echo "<h3>Upload ảnh thành công:</h3>";
echo '<img src="'.$url.'" style="max-width:100%;max-height:300px">';
shell_exec('tesseract /var/www/html/images/img.png /var/www/html/out -l '.$lang);
text();
}
elseif($_FILES['image']){
$file_name = $_FILES['image']['name'];
$file_tmp =$_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp,"images/".$file_name);
echo "<h3>Ảnh:</h3>";
echo '<img src="./images/'.$file_name.'" style="max-width:100%;max-height:300px">';
shell_exec('tesseract /var/www/html/images/'.$file_name.' /var/www/html/out -l '.$lang);
text();
}

function text() {
 echo "<br><h3>Text:</h3><br><pre>
<p style='color:red;font-weight:bold;font-size:22px'>"
.trim(file_get_contents("http://awsmihome2612.tk/out.txt"))
."</p>";
}

?>

</body>
</html>
