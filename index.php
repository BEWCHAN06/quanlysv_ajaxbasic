<!doctype html>
<html lang="en">
<head>
    <title>Quản Lý Sinh Viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <h3>Insert dữ liệu trong FORM</h3>
            <form id="inset_data_hoten" method="POST">
                <div class="form-group">
                <label for="">Họ và Tên</label>
                <input type="text"
                    class="form-control" name="" id="hovaten" aria-describedby="helpId" placeholder="Điền họ và Tên">
                </div>
                <div class="form-group">
                <label for="">Số phone</label>
                <input type="text"
                    class="form-control" name="" id="sophone" aria-describedby="helpId" placeholder="Số phone">
                </div>
                <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text"
                    class="form-control" name="" id="diachi" aria-describedby="helpId" placeholder="Địa chỉ">
                </div>
                <div class="form-group">
                <label for="">Email</label>
                <input type="text"
                    class="form-control" name="" id="email" aria-describedby="helpId" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="">Ghi chú</label>
                <input type="text"
                    class="form-control" name="" id="ghichu" aria-describedby="helpId" placeholder="Ghi chú">
                </div>
                <br>
                <input name="" id="button_insert" class="btn btn-primary" type="button" value="Insert">
            </form>
            <h3>Load dữ liệu bằng Ajax</h3>
            <div id="load_data">

            </div>
        </div>
    </div>
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
</body>
</html>