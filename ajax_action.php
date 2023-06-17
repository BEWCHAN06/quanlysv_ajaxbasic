<?php
    include('db.php');
    //chen du lieu
    if(isset($_POST['hovaten'])){
        $hovaten = $_POST['hovaten'];
        $sophone = $_POST['sophone'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $ghichu = $_POST['ghichu'];
        $result = mysqli_query($con,"INSERT INTO tbl_khachhang (hovaten,phone,email,diachi,ghichu) VALUES ('$hovaten','$sophone',
        '$diachi','$email','$ghichu')");
    }
?>