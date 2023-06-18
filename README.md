# quanlysv_ajaxbasic
ứng dụng ajax vào phần quản lý sinh viên 

### ngôn ngữ sử dụng
- php
- jquery
- bootstrap

### phần mềm hổ trợ 
- xampp

### file connect với mysql bằng php

``` php
<?php
$con = mysqli_connect("localhost","root","","ajax lesson");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}else{
    echo 'Connected Successfully';
}
?>
```
### dữ liệu ghi vào và đọc lên table
``` php
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
```
### input đầu vào bằng jquery
``` javascript
<script>
        $(document).ready(function () {
            function fetch_data(){
                $.ajax({
                    url: "ajax_action.php",
                    method :"POST",
                    success: function (data) {

                        $('#load_data').html(data);
                        fetch_data();
                    }
                });
            }
            fetch_data();

            
            $('#button_insert').click(function (e) { 
            var hovaten = $('#hovaten').val()
            var sophone = $('#sophone').val()
            var diachi = $('#diachi').val()
            var email = $('#email').val()
            var ghichu = $('#ghichu').val()
            if(hovaten == '' || sophone == ''|| diachi == ''|| email == ''){
                alert('không được bỏ tróng các trường')
            }else{
                $.ajax({
                    url: "ajax_action.php",
                    method :"POST",
                    data:{hovaten:hovaten,sophone:sophone,email:email,diachi:diachi,ghichu:ghichu},
                    success: function (data) {
                        alert("insert du lieu thanh cong");
                        $('#insert_data_hoten')[0].reset();
                    }
                });
            }
            });
        });
    </script>
```
### Screenshot
- input
<img src="/Screenshot/Screenshot 2023-06-18.png" alt="">
</br>
<img src="/Screenshot/Screenshot 2023-06-18 1.png" alt="">

### Update Note
- [17-06-2023] jdbc mysql with form QLSV