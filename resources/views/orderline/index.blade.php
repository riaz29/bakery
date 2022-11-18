@extends('layouts.app')
@section('content')
<style>
    #page-top{
  margin-top: -25px;
  margin-bottom: -25px;
}
</style>

<div id="page-top">
    <div id="wrapper">
        @if (session('status'))
         {{ session('status') }}
         @endif
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3">Dashboard <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/home" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>My Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/order" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cubes"></i>
                    <span>All Order</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/bill" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money-bill-alt"></i>
                    <span>Billing Area</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/customer" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-users"></i>
                    <span>All Customer</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/account" 
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Accounts</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
     </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <br>
                <br>
                <div class="container-fluid">
                     <h1 class="h3 mb-2 text-etrading">All Order Menu Record</h1>
                     <p class="mb-4 text-etrading">Below tables shown all of order menu's records.</p>
                     <div class="row">
                         <div class="col-xl-10">

                         </div>
                         <div class="col-xl-2">
                            <a class="btn btn-success btn-user btn-block" href="{{ route('orderline.create') }}">Make Orderline</a>
                        </div>
                     </div>
                     <br>
                     <div class="row">
                         <div class="col-xl-12 col-lg-10">
                             <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                     <h6 class="m-0 font-weight-bold text-etrading">Menu Records</h6>
                                 </div>
                                 <div class="card-body">
                                     <div class="table-responsive">
                                         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                             <thead>
                                                 <tr>
                                                    <th scope="col">Menu ID</th>
                                                    <th scope="col">Menu Name</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Unit</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">Delete</th>
                                                    <th scope="col">Edit</th>
                                                 </tr>
                                             </thead>
                                             <tfoot>
                                                 <tr>
                                                    <th scope="col">Menu ID</th>
                                                    <th scope="col">Menu Name</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Unit</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Order ID</th>
                                                    <th scope="col">Delete</th>
                                                    <th scope="col">Edit</th>
                                                 </tr>
                                            </tfoot>
                                            <tbody>
                                                @foreach($orderline_view as $orderline)
                                                    <tr>
                                                        <td>{{$orderline->id}}</th>
                                                        <td>{{$orderline->menu_name}}</td>   
                                                        <td>{{$orderline->menu_type}}</td>
                                                        <td>{{$orderline->price}}</td>
                                                        <td>{{$orderline->unit}}</td>
                                                        <td>{{$orderline->amount}}</td>
                                                        <td>{{$orderline->order->id}}</td>    
                                                        <td>
                                                            <form action="{{route('orderline.destroy', $orderline->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                    <input type="submit" class="btn btn-danger btn-user btn-block" value="Delete"/> 
                                                            </form>
                                                        </td>	
                                                        <td>
                                                            <a class="btn btn-warning btn-user btn-block" href="{{route('orderline.edit', $orderline->id)}}">Edit</a>
                                                        </td>
                                                    </tr>	
                                                @endforeach
                                            </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
         
                         </div>
 
                     </div>
                </div>
             </div>
            </div>
    </div>
</div>

@endsection