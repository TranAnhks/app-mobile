<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\CategoryInterface;
use App\Repositories\Eloquents\BaseRepository;
use App\Models\Category;
use Session;

class CategoryRepository extends BaseRepository implements CategoryInterface
{
    //
    public function model()			
	{
		return Category::class;
	}

	public function pageindex($request)
	{
		// $category = Category::all();
        $category = Category::paginate(4);
            
        if ($request->ajax()) {
          return view('admin.category.ajax', compact('category'));
      
        } else {
            return view('admin.category.index', compact('category'));
        }
	}

    public function pagecreate()
    {
        $category = Category::pluck('name');

        return view('admin.category.add',compact('category'));
    }

    public function pagestore($request)
    {
        $category = $request ->only('name');
        Category::create($category);

        return redirect('admin/category');
    }

    public function pageedit($id)
    {
        $category_edit = Category::findOrFail($id);

        return view('admin.category.edit', compact('category_edit'));
    }

    public function pageupdate($request, $id)
    {
         //0. Check Id có tồn tại không
        $data = Category::findOrFail($id);

        //1. lay du liệu view
        $update_data= $request->all();
        //2. xác định từng field trong CSDL cần cập nhật - theo view
        $data->name=$update_data['name']; 
        //3. Lưu
        $data->save();
        //4. Hiển thị view cùng với thông báo
        Session::flash('ketqua','Cập nhật dữ liệu thành công');
        return redirect('admin/category');
    }
    
    public function pagedestroy($id)
    {
        $data = Category::findOrFail($id);
        
        $data->delete();
        Session::flash('ketqua', 'Xóa dữ liệu '.$data->name.' thành công!!!');
        return redirect('admin/category');
    }

}
