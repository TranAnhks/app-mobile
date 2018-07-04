<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Session;
use DateTime;
use App\Repositories\Contracts\CategoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->middleware('auth:admin');
        $this->categoryRepository = $categoryRepository;
    }
  
 
    public function index(Request $request)
    {   
        $pages = $this->categoryRepository->pageindex($request);

        return $pages;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = $this->categoryRepository->pagecreate();

        return $pages;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    { 
        $validated = $request->validated();

        $pages = $this->categoryRepository->pagestore($request);

        return $pages;
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = $this->categoryRepository->pageedit($id);

        return $pages;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $validated = $request->validated();

        $pages = $this->categoryRepository->pageupdate($request,$id);

        return $pages;
 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = $this->categoryRepository->pagedestroy($id);

        return $pages;
    }
}
