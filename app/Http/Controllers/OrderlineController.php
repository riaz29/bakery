<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Orderline;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;
use Exception;
class OrderlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderline_view=Orderline::with('order')->get();
        // $order_sum=Orderline::sum('price');
        return view('orderline.index',compact('orderline_view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order=Order::all();
        return view('orderline.create',compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $orderline=$request->all();
        // Orderline::create($orderline);
        
        $request->validate(
            [
                'menu_name'=>'required',
                'menu_type'=>'required',
                'price'=>'required',
                'unit'=>'required'
            ]
        );

        $count=count($request->menu_name);

        for($i=0;$i<$count;$i++){
            $orderline = new Orderline();
            $orderline->menu_name=$request->menu_name[$i];
            $orderline->menu_type=$request->menu_type[$i];
            $orderline->price=$request->price[$i];
            $orderline->unit=$request->unit[$i];
            $orderline->amount=$request->unit[$i]*$request->price[$i];
            $orderline->order_id=$request->order_id;
            $orderline->save();
        }
        $totaldata = Orderline::where('order_id', '=', $request->order_id)->sum('amount');
        $value=$totaldata;
        DB::table('orders')
              ->where('id', $request->order_id)
              ->update(['order_amount' => $value]);
        try{      
                if(Bill::where('order_id', $request->order_id)->exists()) 
                {
                    $order_total=Order::where('id', '=', $request->order_id)->sum('order_amount');          
                    $remaining = Bill::where('order_id', '=', $request->order_id)->firstOrFail();
                    $remain_amout= ($order_total + $remaining->service_amount + $remaining->fare_amount) - $remaining->advance_amount ;
                    $bill_total = $value + $remaining->service_amount + $remaining->fare_amount;
                    DB::table('bills')
                        ->where('order_id', $request->order_id)
                        ->update(['total_amount' => $bill_total ,'remaining_amount'=>$remain_amout]);
                }
                else
                {
                    return redirect()->route('orderline.index');
                }
            }
        catch (exception $e) 
            {
            return $e->getMessage();
            }
        return redirect()->route('orderline.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Orderline $orderline)
    {
        return view('orderline.edit',compact('orderline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orderline $orderline)
    {
        $request->validate([
            'menu_name'=>'required',
            'menu_type'=>'required',
            'price'=>'required',
            'unit'=>'required',
        ]);
        $orderline->menu_name = $request -> menu_name;
        $orderline->menu_type = $request -> menu_type;
        $orderline->price = $request -> price;
        $orderline->unit = $request -> unit;
        $orderline->amount=$request -> price * $request -> unit;
        $orderline-> save();
        $order_id=$orderline->order_id;
        $totaldata = Orderline::where('order_id', '=', $order_id)->sum('amount');
        $value=$totaldata;
        // dd($value);
        DB::table('orders')
              ->where('id', $order_id)
              ->update(['order_amount' => $value]);
        try{      
            if(Bill::where('order_id', $order_id)->exists()) 
            {
                $order_total=Order::where('id', '=',$order_id)->sum('order_amount');          
                $remaining = Bill::where('order_id', '=', $order_id)->firstOrFail();
                $remain_amout=($order_total + $remaining->service_amount + $remaining->fare_amount) - $remaining->advance_amount;
                $bill_total = $value + $remaining->service_amount + $remaining->fare_amount;
                DB::table('bills')
                    ->where('order_id', $order_id)
                    ->update(['total_amount' => $bill_total ,'remaining_amount'=>$remain_amout]);
            }
            else
            {
                return redirect()->route('orderline.index');
            }
        }
        catch (exception $e) 
            {
            return $e->getMessage();
            }      


     return redirect()->route('orderline.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data_id=$id;
        $orderline=Orderline::find($data_id);
        $order_id=$orderline->order_id;
        $totaldata = Order::find($order_id);
        $value=$totaldata->order_amount - $orderline->price * $orderline->unit;
        
    try {
        //dd($value);
        DB::table('orders')
              ->where('id', $orderline->order_id)
              ->update(['order_amount' => $value]);    
        // $sub_order = Order::find($data_id);
        // $sub_total = $sub_order->order_amount;
        // DB::table('bills')
        //     ->where('order_id', $orderline->order_id)
        //     ->update(['total_amount' => $value]);    
        
        $orderline->delete();

        $order=Order::where('id', '=',$order_id)->firstOrFail(); 
        $order_total=$order->order_amount;
        $order_id=$orderline->order_id;      
        $remaining = Bill::where('order_id', '=', $order_id)->firstOrFail();
        $bill_total = $value + $remaining->service_amount + $remaining->fare_amount;
        $remain_amout= ($order_total + $remaining->service_amount + $remaining->fare_amount) - $remaining->advance_amount;

        DB::table('bills')
            ->where('order_id', $orderline->order_id)
            ->update(['total_amount' => $bill_total ,'remaining_amount'=>$remain_amout]);
        return redirect()->route('orderline.index');
        
            
    }

        catch (exception $e) {
            return $e->getMessage();
        }
    }

}
