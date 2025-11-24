<?php
$db = mysqli_connect('localhost', 'root', '', 'dbjabar');
if (!$db){
    echo 'gagal';
}else {
    echo 'allhamdulilah berhasil';
}
?>