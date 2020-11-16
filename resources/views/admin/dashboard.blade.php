<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
        <base href="http://localhost/l_demo/">
        <title>Xem Danh Sach Product</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
        <style>
            table, th, td {
                border: 1px solid black;
                padding: 3px;
            }
            .pagination li{
                list-style: none;
                float: left;
                margin-left: 5px;
            }
        </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">TEST LARAVEL</h3>
                        <h2 class="panel-title">Chào mừng bạn đến với Admin</h2>
                        <li><a href="public/admin/product/index" class="btn btn-success waves-effect waves-light"><i class="icon-plus"></i>Danh sách Sản Phẩm</a></li><br />
                        <li><a href="public/admin/product/index" class="btn btn-success waves-effect waves-light"><i class="icon-plus"></i>Danh sách User</a></li>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
