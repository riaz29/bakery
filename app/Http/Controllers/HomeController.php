<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total=Bill::sum('total_amount');
        $total_received=Bill::sum('advance_amount');
        $total_remaining=Bill::sum('remaining_amount');
        $total_discount=Bill::sum('adjust_amount');
        $total_order=Order::all();
        // $monthly_total=Bill::selectRaw('year(created_at) as year, monthname(created_at) as month, sum(total_amount) as total_amount')
        // ->groupBy('year','month')
        // ->orderByRaw('min(created_at) desc')
        // ->get();
        //  $monthly=$monthly_total;
        // dd($monthly_total);
        
    //          @foreach ( $monthly as $data )
    //           <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data['month'];}} : {{$data['total_amount'];}}</div>
    //           @endforeach 
        return view('home',compact('total','total_received','total_remaining','total_discount','total_order'));
    }
}
