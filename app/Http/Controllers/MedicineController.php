<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        // return view('medicine.create', compact('category'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Medicine(); 

        $data->generic_name = $request->get('generic_name');
        $data->form = $request->get('form');
        $data->restriction_formula = $request->get('restriction_form');
        $data->price = $request->get('price');
        $data->description = $request->get('description');
        $data->category_id = $request->get('category_id');
        $data->faskes1 = $request->get('faskes1');
        $data->faskes2 = $request->get('faskes2');
        $data->faskes3 = $request->get('faskes3');

        $data->save();

        // return redirect()->route('reportShowAllDataNFP')->with('status','Medicine is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $data = $medicine;
        $category = $data->category;
        $allcategory = Category::all();
        // return view('medicine.edit', compact('data', 'category','allcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $medicine->generic_name = $request->get('name');
        $medicine->form = $request->get('form');
        $medicine->restriction_formula = $request->get('restriction');
        $medicine->price = $request->get('price');
        $medicine->description = $request->get('description');
        $medicine->faskes1 = $request->get('faskes1');
        $medicine->faskes2 = $request->get('faskes2');
        $medicine->faskes3 = $request->get('faskes3');
        $medicine->category_id = $request->get('category');

        $file = $request->file('img');
        $imgFolder = 'images';
        $imgFile = time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $medicine->image=$imgFile;
        $medicine->save();
        // return redirect()->route('reportAllMed')->with('status', 'Medicine berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $this->authorize('delete-permission', $medicine);
        // $data = Medicine::find($medicine);
        try {
            $medicine->delete();
            // return redirect()->route('reportAllMed')->with('status', 'Kategori berhasil di hapus');
        } catch (\PDOException $e) {
            $msg = "Data gagal dihapus. Pastikan data child sudah hilang atau tidak berhubungan";

            // return redirect()->route('reportAllMed')->with('error', $msg);
        }
    }

    public function showAllData()
    {
        $alldata = Medicine::all();
        return view('medicine.shop', compact('alldata'));
    }
    public function showSomeData()
    {
        $data = Medicine::all()->take(3);
        return view('layouts.index', compact('data'));
    }

    public function showTopFiveSold()
    {
        $data = Medicine::join('detail_transactions', 'medicines.id', '=', 'detail_transactions.medicine_id')
        ->select('medicines.id','medicines.generic_name','medicines.form','medicines.restriction_formula',
                'medicines.price','medicines.description','medicines.faskes1','medicines.faskes2','medicines.image', 'medicines.category_id', 
                DB::raw('detail_transactions.quantity as sold'))
        ->groupBy('medicines.id','medicines.generic_name','medicines.form','medicines.restriction_formula',
        'medicines.price','medicines.description','medicines.faskes1','medicines.faskes2','medicines.image', 'medicines.category_id', 'detail_transactions.quantity')
        ->orderBy('sold', 'desc')
        ->limit(5)
        ->get();
        
        return view('report.topMedicine', compact('data'));
    }

    public function showData_byId($medicine_id)
    {
        $data = Medicine::find($medicine_id);

        // return view('', compact('data'));

    }

    public function detail($id){
        $data = Medicine::find($id);
        // $product = $data->medicines;
        // dd($product);
        return view('medicine.detail',['data'=>$data]);
    }
}
