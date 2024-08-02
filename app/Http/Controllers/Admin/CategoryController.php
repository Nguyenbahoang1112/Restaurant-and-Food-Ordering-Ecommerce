<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Str;

class CategoryController extends Controller
{
    public function Index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.product.category.index');
    }

    public function create() :View
    {
        return view('admin.product.category.create');
    }
    public function store(CategoryRequest $request) : RedirectResponse
    {
        $category= new Category();
        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->show_at_home=$request->show_at_home;
        $category->status=$request->status;
        $category->save();

        toastr('Create successfully!','success');

        return to_route('admin.category.index');
    }
    public function edit(string $id)
    {
        $category= Category::findOrFail($id);
        return view('admin.product.category.edit',compact('category'));
    }
    public function update(CategoryUpdateRequest $request,$id)
    {
        $category= Category::findOrFail($id);

        $category->name=$request->name;
        $category->slug=Str::slug($request->name);
        $category->show_at_home=$request->show_at_home;
        $category->status=$request->status;
        $category->save();

        toastr('Update successfully!','success');

        return to_route('admin.category.index');
    }
    public function destroy($id)
    {
        try{
            $category= Category::findOrFail($id);
            $category->delete();
            return response(['status'=>'success','message'=> 'Deleted Successfully!']);
        }catch(\Exception $e){
            return response(['status'=> 'error','message'=> $e->getMessage()]);
        }
    }
}
