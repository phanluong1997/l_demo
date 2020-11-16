<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Add User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
     <!-- Page Content -->
     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Title: </label>
                                <input class="form-control" name="title"  id= "title" type="text"  value ="{{$product->title}}"/>
                            </div>
                            <br/>
                            <div class="form-group">
                                <label for="input-file-now">Image: (width: 400 x height: 240)</label>
                                <br/>
                                <input type="file"  name="image" id="image" /><br/>
                                <img src="{{ asset('upload/product/image/thumb/'.$product->thumb) }}" width="400" height="240">
						    </div>
                            <br/>
                            <div class="form-group">
                                <label>Description: </label>
                                <input class="form-control" type="text"  id="des" name="des"   value = "{{$product->des}}"/>
                            </div>
                            <br/>
                            <button type="submit" name ="product" id="product" class="btn btn-default" >edit Product</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
</body>
</html>
<script>
</script>
