<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = Category::all();

        return view('categories.index', compact('alldata'));
    }
    public function deleteData(Request $request)
    {

        try {
            $id = $request->get('id');
            $category = Category::find($id);
            $category->delete();
            return response()->json(array(
                'status' => 'ok',
                'msg' => 'Category successfully deleted'
            ), 200);
        } catch (\PDOException $e) {
            return response()->json(array(
                'status' => 'no',
                'msg' => 'You Cannot Delete'
            ), 200);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->get('name');
        $data->description = $request->get('description');
        $data->save();
        return redirect()->route('category.index')->with('status','Category successfully added');
    }
    public function getEditForm(Request $request)
    {
        $id = $request->post('id');
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('categories.getEditForm',compact('data'))->render()
        ), 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->save();

        return redirect()->route('category.index')->with('status','Category successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $this->authorize('delete-permission', $user);

        $category = Category::find($id);
        try {
            $category->delete();
            return redirect()->route('category.index')->with('status','Category successfully deleted');
        } catch (\PDOException $e) {
            return redirect()->route('category.index')->with('status','You Cannot ');
        }
    }

    public function showAllData()
    {
        $alldata = Category::all();

        return view('categories.index', compact('alldata'));
    }
}
