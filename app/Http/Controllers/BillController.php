<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Orderline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills=Bill::with('order')->get();
        return view('bill.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=Order::all();
        return view('bill.create',compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'order_id'=>'required',
                'advance_amount'=>'required',
            ]
        );
        if (Bill::where('order_id', $request->order_id)->exists()) {
           return view('bill.duplicate');
        }
        else{
            $totalamount = Order::where('id', '=', $request->order_id)->sum('order_amount');
            $bill = new Bill();
            $bill->order_id=$request->order_id;
            $bill->service_amount=$request->service_amount;
            $bill->fare_amount=$request->fare_amount;
            $bill->advance_amount=$request->advance_amount;
            $total= $totalamount + $request->service_amount + $request->fare_amount;
            $bill->remaining_amount = $total - $request->advance_amount;
            $bill->total_amount=$total;
            $bill->save();
        
            return redirect()->route('bill.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_id = $id;
        $bill = Bill::find($data_id);
        $orderdata = Orderline::where('order_id','=', $bill->order_id)->get();
        // dd($orderdata);
         return view('bill.show', compact('bill','orderdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return view('bill.edit',compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //  dd($bill->all());
        $request->validate([
            'service_amount'=>'required',
            'fare_amount'=>'required',
            'advance_amount'=>'required',
            'adjust_amount'=>'required',
        ]);
        try{
        $bill->service_amount = $request->service_amount;
        $bill->fare_amount = $request->fare_amount;
        $bill->advance_amount = $request->advance_amount;
        $bill->adjust_amount = $request->adjust_amount;
        $bill-> save();
        $order_total=Order::where('id', '=',$bill->order_id)->sum('order_amount');
        $bill_total=$order_total + $request->service_amount + $request->fare_amount;
        $remain_amout = $bill_total - $request->advance_amount;
        DB::table('bills')
                    ->where('order_id', $bill->order_id)
                    ->update(['total_amount' => $bill_total ,'remaining_amount'=>$remain_amout]);
        return redirect()->route('bill.index');
        }
        catch (exception $e) 
            {
            return $e->getMessage();
            }
        
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
