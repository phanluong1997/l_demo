<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\DB;
use Image;

class ProductController extends Controller
{
    var $path_dir = '/l_demo/public/upload/product/image/';
    var	$path_dir_thumb = '/l_demo/public/upload/logo/image/thumb/';

    public function getIndex(){
        // $product = Product::all();
        $product = Product::paginate(5);
        return view('admin.product.index',['product'=>$product]);
    }
    public function add(Request $request){

        if($request->isMethod('post')){
            //start get data in form..
            if($request->hasFile('image')){
                $this->validate($request,[

                     'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

                    ],
                    [
                        'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]);

                //upload img
                $image  =$request->file('image');
                //upload
                $image_name = $image->getClientOriginalExtension();
                $image_name = time().'.'.$image_name;

                $thumb =  $image->getClientOriginalExtension();
                $thumb = time().'_thumb.'.$thumb;

                Image::make($image)->fit(400,200)
                ->save(public_path('/upload/product/image/thumb/').$thumb);

                $image->move(public_path('/upload/product/image'),$image_name);


            $title = $request->input('title');
            $des    = $request->input('des');
            //start add
            // $product = new Product();
            // $product->title = $title;
            // $product->des = $des;
            // $product->image = $image_name;
            // $product->thumb = $thumb;
            // $product->save();

            for($i=1; $i<1000;$i++){
                $product = new Product();
                $product->title = $title.'--'.$i;
                $product->des = $des.'--'.$i;
                $product->image = $image_name.'--'.$i;
            $product->thumb = $thumb.'--'.$i;
                $product->save();
            }

        }
        return Redirect::to("/admin/product/index");


        }
        //lấy ra get..
        return view('admin.product.add')->with('thongbao','Them thanh cong');
    }
    public function edit(Request $request,$id){
        //get
        $data_view = array();
        $product = Product::find($id);
        $data_view['product'] = $product;
        //post
        if($request->isMethod('post')){

            if($request->hasFile('image')){
                //start delete image old
                $file_image = 'upload/product/image/'.$product['image'];
                $file_thumb = 'upload/product/image/thumb/'.$product['thumb'];
                if($product['image']!= ''){unlink($file_image);}
                if($product['thumb']!= ''){unlink($file_thumb);}

                $this->validate($request,[
                    'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

                    ],
                    [
                        'image.mimes' => 'Chỉ chấp nhận hình thẻ với đuôi .jpg .jpeg .png .gif',
                        'image.max' => 'Hình thẻ giới hạn dung lượng không quá 2M',
                    ]);

                //upload img
                $image  =$request->file('image');
                //upload
                $image_name = $image->getClientOriginalExtension();
                $image_name = time().'.'.$image_name;

                $thumb =  $image->getClientOriginalExtension();
                $thumb = time().'_thumb.'.$thumb;

                Image::make($image)->fit(400,200)
                ->save(public_path('/upload/product/image/thumb/').$thumb);

                $image->move(public_path('/upload/product/image'),$image_name);

            }
            $title = $request->input('title');
            $des    = $request->input('des');

            $product->title = $title;
            $product->des = $des;
            $product->image = $image_name;
            $product->thumb = $thumb;
            $product->save();
        return Redirect::to("/admin/product/index");
        }
        //lấy ra get..
        return view('admin.product.edit',$data_view);
    }
    public function delete(Request $request){
        $id = isset($_POST["id"])? $_POST["id"]:0;
        if($id > 0){
            $product = Product::find($id);
            $file_image = 'upload/product/image/'.$product['image'];
            $file_thumb = 'upload/product/image/thumb/'.$product['thumb'];
            if($product['image']!= ''){unlink($file_image);}
            if($product['thumb']!= ''){unlink($file_thumb);}
            $product->delete();
            echo "XÓA THÀNH CÔNG";
            exit();
        }

    }
    public function search(Request $request){
        // $product = Product::all();
        $query = $request->get('search');
        $product = Product::query()->where('title','like','%' .$query. '%')->orwhere('des','like','%' .$query. '%')->paginate(5);
        // $A = 'http://localhost/l_demo/public/upload/product/image/thumb/1602066457_thumb.jpg';
        // $test = 'link';
        // // var_dump($product);
        // // convert json->array
        // $product = json_decode(json_encode($product), true);
        //  foreach($product as $key => $value){
        //      //thêm link_img vô mảng
        //      $product[$key]['link_img'] = $test;
        //  }
        // var_dump($product);
        // die;

        $output = '';
        // <td><img src="'.$row->thumb.'" width="60"></td>
        foreach($product as $row){
            $output.='
              <tr >
                <td>'.$row->id.'</td>
                <td>'.$row->title.'</td>
                <td><img src="public/upload/product/image/thumb/'.$row->thumb.'" width="60"></td>
                <td>'.$row->des.'</td>
                <td>'.$row->created_at.'</td>
                <td><a onclick="deleteProduct('.$row->id.')" id= "delete'.$row->id.'" class="btn btn-danger">Delete</a></td>
                <td><a href="public/admin/product/edit/'.$row->id.'">Edit</a></td>
            </tr>';

        }
        return $output;


    }

}
