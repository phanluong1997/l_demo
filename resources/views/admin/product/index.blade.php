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
<body >
    <h2>Danh Sach Product</h2>

    <a href="public/admin/product/add" class="btn btn-success waves-effect waves-light"><i class="icon-plus"></i>Thêm mới</a>
    <br>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            <input type="text" name = "search_text" id="search_text" class="form-control">
        </div>
    </div>
    <div class= "container">
	<!-- test lenh laay du lieu -->
		<div id="result">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{$err}}<br>
                    @endforeach
                </div>
            @endif
            @if(session('thongbao'))
                    {{session('thongbao')}}
            @endif
			<table style="" >
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Title</th>
                        <th>image</th>
						<th>Description</th>
						<th>Date</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody id="test" >
                    @foreach($product as $val)
                        <tr >
                            <td>{{$val->id}}</td>
                            <td>{{$val->title}}</td>
                            <td><img src="{{ asset('upload/product/image/thumb/'.$val->thumb) }}" width="60"></td>
                            <td>{{$val->des}}</td>
                            <td>{{$val->created_at}}</td>
                            <td><a onclick="deleteProduct({{$val->id}})" id= "delete{{$val->id}}" class="btn btn-danger">Delete</a></td>
                            <td><a href="public/admin/product/edit/{{$val->id}}">Edit</a></td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
        {!!$product->links()!!}
	</div>
</body>
</html>
<script type="text/javascript">
    function deleteProduct(id){
        // alert("1321");
        var link = "{{url('/admin/product/delete')}}";
        if(confirm("Do you want Delete")){
            $.ajax({
                url: link,
                data:{'id':id,'_token':'{{csrf_token()}}'},
                type: "POST",
                    error:function(xhr,status,error){
                        alert(errorThrown);
                    },
                    success:function(data){
                        alert(data);
                        location.reload();
                    }

            });
        }
    }
    $(document).ready(function(){
	// alert(1);
	$('#search_text').keyup(function(){
		var search = $(this).val();
        // console.log(search);
        if(search != ""){
            $.post("{{url('/admin/product/search')}}", {"_token":"{{csrf_token()}}",search:search}, function(data){
                console.log(data);
                $('#test').html(data);
            });
        }
        else
        {
            location.reload(true);
        }
    });
});
</script>
