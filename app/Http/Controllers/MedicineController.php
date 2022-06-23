<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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

        return view('medicine.create', compact('category'));  
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

        $file = $request->file('image');
        $imgFolder = 'medicines_img';
        $imgFile = time()."_".$file->getClientOriginalName();
        $file->move($imgFolder, $imgFile);
        $data->image = $imgFile;
        // dd($imgFile);

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

        return redirect()->route('listmedicine')->with('status','Medicine is added');
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
        return view('medicine.edit', compact('data', 'category','allcategory'));
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
        $file = $request->file('image');
        if($file != null){
            $imgFolder = 'medicines_img';
            $imgFile = time()."_".$file->getClientOriginalName();
            $file->move($imgFolder, $imgFile);
            $medicine->image=$imgFile;    
        }
        
        $medicine->generic_name = $request->get('name');
        $medicine->form = $request->get('form');
        $medicine->restriction_formula = $request->get('restriction');
        $medicine->price = $request->get('price');
        $medicine->description = $request->get('description');
        $medicine->faskes1 = $request->get('faskes1');
        $medicine->faskes2 = $request->get('faskes2');
        $medicine->faskes3 = $request->get('faskes3');
        $medicine->category_id = $request->get('category');

        
        $medicine->save();
        return redirect()->route('listmedicine')->with('status', 'Medicine successfully updated');
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
        try {
            $medicine->delete();
            return redirect()->route('listmedicine')->with('status', 'Medicine is Deleted');
        } catch (\PDOException $e) {
            return redirect()->route('listmedicine')->with('status', "Can't delete this medicine");
        }
    }
    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Medicine::find($id);
        $data_category = $data->category;
        $dataCategory = Category::all();
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('medicine.getEditForm', compact('data','data_category', 'dataCategory'))->render()
        ), 200);
    }
    public function showAllData()
    {
        $alldata = Medicine::all();
        return view('medicine.shop', compact('alldata'));
    }
    public function showAllDataAdmin()
    {
        $alldata = Medicine::all();
        $med_cat = [];

        foreach($alldata as $ad){
            array_push($med_cat,Category::find($ad->category_id));
        }

        $category = Category::all();
        return view('medicine.listmedicine', compact('alldata','category','med_cat'));
    }
    public function showSomeData()
    {
        $data = Medicine::all()->take(3);
        return view('welcome', compact('data'));
    }

    public function showTopFiveSold()
    {
        $data = Medicine::join('detail_transactions', 'medicines.id', '=', 'detail_transactions.medicine_id')
        ->select('medicines.id','medicines.generic_name','medicines.form','medicines.restriction_formula',
                'medicines.price','medicines.description','medicines.faskes1','medicines.faskes2','medicines.image', 'medicines.category_id', 
                DB::raw('sum(detail_transactions.quantity) as sold'))
        ->groupBy('medicines.id','medicines.generic_name','medicines.form','medicines.restriction_formula',
        'medicines.price','medicines.description','medicines.faskes1','medicines.faskes2','medicines.image', 'medicines.category_id')
        ->orderBy('sold', 'desc')
        ->limit(5)
        ->get();
        
        return view('report.topMedicine', compact('data'));
    }

    // public function showData_byId($medicine_id)
    // {
    //     $data = Medicine::find($medicine_id);

    //     // return view('', compact('data'));
    // }

    public function detail($id){
        $data = Medicine::find($id);
        
        return view('medicine.detail',['data'=>$data]);
    }

    public function front_index()
    {
        $medicine = Medicine::all();
        return view('',compact('medicine'));
    }

    public function addToCart($id)
    {
        $user = Auth::user();

        if($user != null){
            $med = Medicine::find($id);
            $cart = session()->get('cart');
            if(!isset($cart[$id])){
                $cart[$id]=[
                    "id"=>$med->id,
                    "generic_name"=>$med->generic_name,
                    "quantity"=>1,
                    "price"=>$med->price,
                    "photo"=>$med->image
                ];
            }else{
                $cart[$id]['quantity']++;
            }
            session()->put('cart',$cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }         
    }

    public function cart()
    {
        $this->authorize('checkbuyer');
        return view('cart.cart');
    }


}
