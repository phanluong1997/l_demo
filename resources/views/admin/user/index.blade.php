<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <base href="http://localhost/l_demo/">
	<title>Xem Danh Sach User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" /> -->
	<style>
		tr,th,td{
			boder: 1px solid black;
			padding: 20px;

		}
        .nhu nav ul li{
           display:inline-block;
        }
	</style>
</head>
<body>
    <h2>Danh Sach user</h2>
    <a href="public/admin/user/add" class="btn btn-success waves-effect waves-light"><i class="icon-plus"></i>Thêm mới</a>
    <form action="public/admin/user/search" method="GET" role="search">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
        <div class="input-group">
            <span class="input-group-addon">Search</span>
            @if(isset($search))
            <input type="text" name = "search" id="search" class="form-control" value="{{$search}}"></input>
            <input type="submit">
            @endif
        </div>
    </form>

    <div class= "container">
	<!-- test lenh laay du lieu -->
		<div id="result">
			<table >
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Name</th>
						<th>Email </th>
						<th>PassWord</th>
						<th>Date</th>
						<th>Delete</th>
						<th>Edit</th>
					</tr>
				</thead>
				<tbody >
                    @foreach($users as $user)
                        <tr >
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->created_at}}</td>
                            <td><a href="public/admin/user/del/{{$user->id}}">Delete</a></td>
                            <td><a href="public/admin/user/edit/{{$user->id}}">Edit</a></td>
                        </tr>
                    @endforeach
				</tbody>
			</table>
		</div>
        <div class="nhu">{!!$users->links()!!}</div>
        <!-- //->appends(request()->query()) -->
	</div>
</body>
</html>
