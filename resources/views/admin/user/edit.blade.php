<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title>Edit User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>



     <!-- Page Content -->
     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" >
                        <input type="hidden" name="" value=""/>
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="form-control" name="fullname"  id= "fullname" type="text"  value = "" placeholder="Please Enter Name"/>
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input class="form-control" type="email"  id="email" name="email"  placeholder="Please Enter Email Address" value = ""/>
                            </div>
                            <div class="form-group">
                                <label>PassWord</label>
                                <input type="" class="form-control"  name="password" name="password"  placeholder="Please Enter User password" value = ""/>
                            </div>
                            <button type="submit" name ="user" id="user" class="btn btn-default" >Add User</button>
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
// $(document).ready(function(){

// 	$('#search_text').keyup(function(){
// 		var search = $(this).val();
// 		$.post('<?php echo base_url(); ?>user/fetch',
// 		{query:search},
// 		function(data){
// 			$('#result').html(data);
// 		});

// 	});
// });

</script>
