<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::whenSearch(request()->search)->paginate(5);
        return view('admin.categories.index',compact('categories'));
    }


    public function create()
    {
        return view('admin.categories.edit');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:categories',
            'slug' => 'required|min:3|unique:categories',
        ]);
        Category::create($request->all());
        session()->flash('success', __('site.added_successfully'));
        return redirect()->route('admin.categories.index');
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required',Rule::unique('categories')->ignore($category->id),],
            'slug' => ['required',Rule::unique('categories')->ignore($category->id),],
        ]);
        $category->update($request->all());
        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('admin.categories.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', __('site.deleted_successfully'));
        return redirect()->route('admin.categories.index');

    }
}
