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
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <?php
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="text-alert">' . $message . '</span>';
                            Session::get('message',null);
                        }
                    ?>
                    <div class="panel-body">
                        <form action="{{URL::to('/admin/admin-dashboard')}}" method="POST">

                            <fieldset>
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" required type="email" >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
