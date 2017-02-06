<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use App\product;
use App\order;
use App\orderdetail;
use Carbon\Carbon;
class SaleController extends Controller
{
    //
    public function RegisterSale(Request $request)
    {
      $this->validate($request, [
          'id' => 'required',
          'products' => 'required',
      ]);

      try {
      $customernumber=$request->input('id');
      $product=$request->input('products');
      $date = Carbon::now();
      $date = $date->format('Y-m-d');
      $order= new order();
      $order->orderDate=  $date;
      $order->requiredDate=  $date;
      $order->shippedDate=  $date;
      $order->status='ok';
      $order->customerNumber=  $customernumber;
      $order->save();
      for($i= 0; $i < count($product); $i++){
          $order_details= new orderdetail();
          $order_details->orderNumber=$order->orderNumber;
          $order_details->productCode=$product[$i]['productCode'];
          $order_details->quantityOrdered=$product[$i]['quantityOrdered'];
          $order_details->priceEach=2689.25;
          $order_details->orderLineNumber=18;
          $order_details->save();
      }
      return response()->json($order_details);
      } catch (\Exception $e) {
            // Si algo sale mal devolvemos un error.
            return response()->json(['registerSale' => false], 500);
        }
    }
}
