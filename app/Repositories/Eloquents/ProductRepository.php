<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\ProductInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use Session;

class ProductRepository extends BaseRepository implements ProductInterface
{
	public function model()			
	{
		return Product::class;
	}

    public function pageindex($request)
    {
    	$request->session()->put('search', $request
              ->has('search') ? $request->get('search') : ($request->session()
              ->has('search') ? $request->session()->get('search') : ''));
            $product = Product::where('name', 'like', '%' . $request->session()->get('search') . '%')->paginate(4);

            if ($request->ajax()) {
              return view('admin.product.ajax', compact('product'));
          
            } else { 
                return view('admin.product.index', compact('product'));
            }
    }

	public function pagecreate()
	{
		$category = Category::pluck('name','id');
        return view('admin.product.add',compact('category'));
	}

	public function pagestore($request)
	{
		$pro = new Product();
        $pro->category_id = $request->category;
        // database = name text
        $pro->name = $request->name;
        $pro->packet = $request->packet;

        $pro->promo = $request->promo;
        $pro->price = $request->price;

        $pro->status = '1';
        //$pro->images = $request->txtimg;
        $pro->images = request()->images->getClientOriginalName();
        request()->images->move(public_path('uploads/products'),$pro->images);
        //dd($pro);
        $pro->save();     

        $product_id =$pro->id;
        $detail = new ProductDetail();
        $detail->cpu = $request->txtcpu;
        $detail->ram = $request->txtcpu;
        $detail->screen = $request->txtscreen;
        //$detail->vga = $request->txtvga;
        $detail->storage = $request->txtstorage;
        $detail->exten_memmory =$request->txtextend;
        $detail->cam1 = $request->txtcam1;
        $detail->cam2 = $request->txtcam2;
        $detail->sim = $request->txtsim;
        // $detail->connect = $request->txtconnect;
        $detail->pin = $request->txtpin;
        $detail->os = $request->txtos;
        $detail->product_id = $product_id;
        if ($request->txtcam1=='') {
            $detail->cam1='không có';
        }
        if ($request->txtcam2=='') {
            $detail->cam2='không có';
        }
        if ($request->txtextend=='') {
            $detail->exten_memmory='không có';
        }
        //dd($pro);
        $detail->save();   


        //$pro->save(); 
        Session::flash('ketqua','Thêm sản phẩm thành công');
        return redirect('admin/product');
	}

	public function pageedit($id)
	{
		$product_edit = Product::where('id',$id)->first();
        $category_edit = Category::pluck('name', 'id');
        Category::where('id', '=', $product_edit->cat_id)->pluck('name', 'id');
        $product_detail_edit = ProductDetail::findOrFail($id);
        
        return view('admin.product.edit',compact('product_edit', 'category_edit','product_detail_edit'));
	}

	public function pageupdate($request, $id)
	{
		$pro = Product::findOrFail($id);
        $pro->category_id = $request->category;
        $pro->name = $request->name;
        // $pro->images = $request->txtimg;
        //$pro->intro = $request->txtintro;
        $pro->price = $request->price;
        $pro->promo = $request->promo;
        $pro->packet = $request->packet;
        $pro->status = '1';
        //$pro->images = $request->txtimg;
        $file_path = public_path('uploads/products/').$pro->images;        
        if ($request->hasFile('txtimg')) {
            if (file_exists($file_path))
                {
                    unlink($file_path);
                }
            
            $f = $request->file('images')->getClientOriginalName();
            $filename = time().'_'.$f;
            $pro->images = $filename;       
            $request->file('images')->move('uploads/products/',$filename);
        }     
        
        //$file_path = public_path('uploads/products/').$pro->images;   
        $pro->save();
        // product_detail => model product
        $pro->product_detail->cpu = $request->cpu;
        $pro->product_detail->ram = $request->ram;
        $pro->product_detail->screen = $request->screen;
         // $pro->product_detail->vga = $request->txtvga;
        $pro->product_detail->storage = $request->storage;
        // $pro->product_detail->connect = $request->txtconnect;
         $pro->product_detail->pin = $request->pin;
        $pro->product_detail->os = $request->os;
          $pro->product_detail->sim = $request->sim;
        if ($request->txtcam1=='') {
             $pro->product_detail->cam1 ='không có';
        }
        else {
            $pro->product_detail->cam1 = $request->txtcam1;
        }
        if ($request->txtcam2=='') {
            $pro->product_detail->cam2 ='không có';
        }
        else {
            $pro->product_detail->cam2 = $request->txtcam2;
        }
        if ($request->txtextend=='') {
            $pro->product_detail->exten_memmory='không có';
        }
        else {
            $pro->product_detail->exten_memmory =$request->extend;
        }
 
        $pro->product_detail->save();

    

        //4. Hiển thị view cùng với thông báo
          Session::flash('ketqua','Lưu dữ liệu thành công');
        return redirect('admin/product');
	}
	
	public function pagedestroy($id)
	{
		 $data = Product::findOrFail($id);
        $data->delete();
        Session::flash('ketqua', 'Xóa dữ liệu '.$data->name.' thành công!!!');
        return redirect('admin/product');
	}
}
