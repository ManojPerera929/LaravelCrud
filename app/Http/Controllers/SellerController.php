<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::all();
        return view('seller',compact('sellers'))->with('i', (request()->input('page', 1) - 1) * 5);

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->sellerid)
        {
            Seller::where('id',$request->sellerid)->update(['name'=>$request->name,'email'=>$request->email,'status'=>$request->updatestatus]);
            return response()->json(['success'=>'Record saved Updated.']);

        }
        else {
            $seller = new Seller();
            $seller->name = $request->name;
            $seller->email = $request->email;
            $seller->status = $request->status;
            $seller->save();
        }

        return redirect()->route('sellers.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller=Seller::find($id);
         $products=$seller->Products;
        return view('product',compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);

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
        $seller=Seller::find($id);
        return $seller;
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $request->id;
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
