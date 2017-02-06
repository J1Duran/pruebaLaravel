<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productline;
use App\employees;
use App\customer;
use App\order;
use App\orderdetail;
use App\product;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection as Collection;

class ProductlinesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function index(Request $request)
 {
     $var_pl= productline::all();
// $collection = Collection::make($var_pl);
//       dd($collection);
   // dd($var_pl);
     return view('productLine.index',compact('var_pl'));
 }

 /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
 public function create()
 {
     return view('productLine.create');
 }

 /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
 public function store(Request $request)
 {
     $this->validate($request, [
         'productLine' => 'required',
         'textDescription' => 'required',
     ]);

     $var = productline::create($request->all());
    // $var = new productLine();
    // $var->productLine = $request->input('productLine');
    //   $var->textDescription = $request->input('textDescription');
    //   $var->htmlDescription = $request->input('htmlDescription');
    //   // $file =$request->file('image');
    //   $file = $request->file('image')->getClientOriginalName();
    //   $contents = $file->openFile()->fread($file->getSize());
    //   $var->image=$contents;
    //
    //  $var->save();
     return redirect()->route('productLines.index')
                     ->with('success','productline created successfully');
 }

 /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function show($id)
 {
     $product = productline::find($id);
     return view('productLine.show',compact('product'));
 }

 /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function edit($id)
 {
     $productline = productline::find($id);
     return view('productLine.edit',compact('productline'));
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
     $this->validate($request, [
       'productLine' => 'required',
       'textDescription' => 'required',
     ]);

     productline::find($id)->update($request->all());
     return redirect()->route('productLines.index')
                     ->with('success','productline updated successfully');
 }

 /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
 public function destroy($id)
 {
     productline::find($id)->delete();
     return redirect()->route('productLines.index')
                     ->with('success','productline deleted successfully');
 }

 public function reportProductLine(Request $request)
 {
   $office=$request->input('office');
   $employee = DB::table('employees')->where('officeCode', $office)->get();
   $line='';
    $info = array();
    $info = array_add($info, 'num_sales',0);
   for($i= 0; $i < count($employee); $i++){
     $sales=0;
      $customer =DB::select('select * from customers where salesRepEmployeeNumber= ?',[$employee[$i]->reportsTo]);
       for($j= 0; $j < count($customer); $j++){
         $orders = DB::table('orders')->where('customerNumber','=',$customer[$j]->customerNumber)->get();

             for($k= 0; $k < count($orders); $k++){
               $ordersdetail = DB::table('orderdetails')->where('orderNumber', $orders[$k]->orderNumber)->get();

                for ($h=0; $h < count($ordersdetail); $h++) {
                   $product = DB::table('products')->where('productCode', $ordersdetail[$h]->productCode)->get();

                    for ($l=0; $l <  count($product); $l++) {
                      $sales++;
                      $lineproduct = DB::table('productlines')->where('productLine', $product[$l]->productLine)->get();
                      if (in_array($lineproduct[$l]->textDescription, $info)) {

                      $info['num_sales']= $info['num_sales']+1;
                      }else {

                        $info = array_add($info, 'productlines',$lineproduct[$l]->textDescription );
                      }

                      }
                }
             }

       }


      //  return response()->json( $sales);
   }

    return response()->json($info);


 }
}
