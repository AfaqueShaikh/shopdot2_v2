<?php

namespace App\Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryList()
    {
        return view("Category::list");
    }
    public function categoryData()
    {
        $categories = Category::where('user_id',Auth::user()->id)->get();
        return Datatables::of($categories)
            ->addColumn('status', function($category) {
                if($category->status){
                    return '<label class="label label-success">Active</label>';
                } else {
                    return '<label class="label label-danger">Inactive</label>';
                }

            })
            ->rawColumns(['status'])
            ->make(true);
    }
    public function categoryCreate(Request $request)
    {
        if($request->method() == 'GET') {
            return view("Category::create");
        } else {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]);
            if ($validator->fails()) {
                return redirect('brand/category/create')
                    ->withErrors($validator)
                    ->withInput();
            }
            $category = new Category();
            $category->user_id = Auth::user()->id;
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            return redirect('brand/category/list')->with('success','Category added successfully');
        }
    }
    public function categoryEdit(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->method() == 'GET') {
            return view("Category::edit", compact('category'));
        } else {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
            ]);
            if ($validator->fails()) {
                return redirect('brand/category/edit')
                    ->withErrors($validator)
                    ->withInput();
            }
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            return redirect('brand/category/list')->with('success','Category updated successfully');
        }
    }
    public function categoryDelete($id){
        Category::destroy($id);
        return redirect('brand/category/list')->with('success','Category deleted successfully');
    }
}
