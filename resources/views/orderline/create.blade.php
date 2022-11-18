@extends('layouts.app')
@section('content')
<div class="container ">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">Generate Order</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="justify-content-center">
            <form class="user p-10" action="{{route('orderline.store')}}" method="post">
                @csrf
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>Menu Name</th>
                            <th>Menu Type</th>
                            <th>Menu Price</th>
                            <th>Menu Unit</th>
                            <th>Order ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            {{-- <td><input type="text" name="menu_name[]" class="form-control " placeholder="Menu Name"/></td> --}}
                            <td>
                                <select class="form-select" name="menu_name[]" aria-label="Menu">
                                    <option selected>Select Menu</option>
                                    <option value="Tandoori Bakra">Tandoori Bakra</option>
                                    <option value="Tandoori Chicken">Tandoori Chicken</option>
                                    <option value="Tandoori Ran">Tandoori Ran</option>
                                    <option value="Tandoori Dasti">Tandoori Dasti</option>
                                    <option value="Rice">Rice</option>
                                    <option value="Pulao">Pulao</option>
                                    <option value="Caramel">Caramel</option>
                                  </select>
                            </td>
                            <td>
                                <select class="form-select" name="menu_type[]" aria-label="Menu">
                                    <option selected>Select Type</option>
                                    <option value="Complete">Complete</option>
                                    <option value="Making">Making</option>
                                  </select>
                            </td>
                            <td><input type="number" name="price[]" class="form-control " placeholder="Price"/></td>
                            <td><input type="number" name="unit[]" class="form-control " placeholder="Unit/Kg"/></td>
                            <td>
                                <select name="order_id" class="form-select" aria-label="Order ID">
                                    <option selected>Select Order</option>
                                    @foreach ($order as $order)
                                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                                    @endforeach  
                                </select>
                            </td>
                            <td><button type="button" class=" btn btn-primary form-control" id="add_more">Add More</button></td>   
                        </tr>
                    </tbody>
                </table>
                    
                <div class="row g-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
    </div>
</div>  
<script type="text/javascript">
    $(document).ready(function(){
        $('#add_more').on('click',function(){
            var html='';
            html+='<tr>';
            html+='<td><select class="form-select" name="menu_name[]" aria-label="Menu"><option selected>Select Menu</option><option value="Tandoori Bakra">Tandoori Bakra</option><option value="Tandoori Chicken">Tandoori Chicken</option><option value="Tandoori Ran">Tandoori Ran</option><option value="Tandoori Dasti">Tandoori Dasti</option><option value="Rice">Rice</option><option value="Pulao">Pulao</option><option value="Caramel">Caramel</option></select>';
            html+='<td><select class="form-select" name="menu_type[]" aria-label="Menu"><option selected>Select Type</option><option value="Complete">Complete</option><option value="Making">Making</option></select></td>';
            html+='<td><input type="number" name="price[]" class="form-control " placeholder="Menu"/></td>';
            html+='<td><input type="number" name="unit[]" class="form-control " placeholder="Menu"/></td>';
            html+='<td><button type="button" class=" btn btn-danger form-control " id="remove">Remove</button></td>';
            html+='</tr>';
            $('tbody').append(html);
        })
            
    });
    $(document).on('click','#remove',function(){
       $(this).closest('tr').remove(); 
    });

</script>
@endsection