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
        '$email','$diachi','$ghichu')");
    }
    
    //lay du lieu
    $output = '';
    $sql_select = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC");
    $output .= '
        <div class = "table table-responsive">
            <table class = "table table-bordered">
                <tr>
                    <td>Ho va Ten</td>
                    <td>phone</td>
                    <td>Email</td>
                    <td>Dia chi</td>
                    <td>Ghi chu</td>
                </tr>
    ';
    if(mysqli_num_rows($sql_select) > 0){
        while($row = mysqli_fetch_array($sql_select)){
            $output .= '
            <tr>
                <td contenteditable>'.$row['hovaten'].'</td>
                <td contenteditable>'.$row['phone'].'</td>
                <td contenteditable>'.$row['email'].'</td>
                <td contenteditable>'.$row['diachi'].'</td>
                <td contenteditable>'.$row['ghichu'].'</td>
            </tr>
        ';
        }
    }else{
        $output .= '
            <tr>
                <td colspan="5">Dữ liệu chưa có</td>
            </tr>
        ';
    }
    $output .= '
        </table></div>
    ';
    echo $output;
?>