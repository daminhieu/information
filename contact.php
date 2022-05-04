<?php
require_once "./db.php";
extract($_REQUEST);
if (empty($_POST) === false) {
    echo'<script>
        alert("Bạn chưa điền nội dung vào form liên hệ !");
        window.location.href = "index.html";
        </script>';
        die;
} else {
    if (array_key_exists('submit',$_REQUEST)) {
        $sql = "INSERT INTO contact(fullName,email,title,description) VALUES(?,?,?,?)";
        if (empty($fullName) == true || empty($email) == true || empty($title) == true || empty($description) == true ) {
            $_SESSION['error_check'] = 'ĐIỀN THIẾU THÔNG TIN !';
            header("Location: /du_an_mau/admin/loai_hang/new.php");
            die;
        }
        pdo_query($sql,$ten_loai,$mo_ta);
        header("location: \du_an_mau\admin\loai_hang\list.php");
    }
    die;
}
?>