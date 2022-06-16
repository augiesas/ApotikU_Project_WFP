<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
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
        // return redirect()->route('kategori.index')->with('status', 'Kategori berhasil di tambah');
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
        $data = $category;
        // return view('category.edit', compact('data'));
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

        // return redirect()->route('reportShowCategory')->with('status','Category data is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('delete-permission', $category);
        try {
            $category->delete();
            // return redirect()->route('kategori.index')->with('status', 'Kategori berhasil di hapus');
        } catch (\PDOException $e) {
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";

            // return redirect()->route('kategori.index')->with('error', $msg);
        }
    }

    public function showAllData()
    {
        $alldata = Category::all();

        return view('', compact('alldata'));
    }
}
