@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="container">
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto ">Check Out   </h4>
            </div>
        </div>
    </div>

<form action="{{ url('place-order')}}" method="POST">
    @csrf
    <div class="row" >
        <div class="col-md-7">
            <div class="card shadow ">
                <div class="card-body">
                    <h5 style="color: blueviolet">Basic Details</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                          <label style="font-size: large;width:150px">First Name</label>
                          <input type="text" name="fname"
                          placeholder="Enter First Name">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                          <label  style="font-size: large;width:150px">Last Name</label>
                          <input type="text" name="lname"
                          placeholder="Enter Last Name">
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                          <label  style="font-size: large;width:150px">Email     </label>
                          <input type="text" name="email"
                          placeholder="Enter Email">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                          <label  style="font-size: large;width:150px">Phone No</label>
                          <input type="text" name="phone"
                          placeholder="Enter Phone No">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                          <label  style="font-size: large;width:150px">Address   </label>
                          <input type="text" name="address"
                          placeholder="Enter Address">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                          <label style="font-size: large;width:80px">City   </label>
                          <input type="text" name="city"
                          placeholder="Enter City">
                          <label style="font-size: large;width:80px">Country   </label>
                          <input type="text" name="country"
                          placeholder="Enter Country">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-11">
                          <label style="font-size: large;width:80px">State   </label>
                          <input type="text" name="state"
                          placeholder="Enter State">
                          <label style="font-size: large;width:80px">Pin Code   </label>
                          <input type="text" name="pincode"
                          placeholder="Enter Pin Code">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow ">
                <div class="card-body">
                    <h5 style="color: blueviolet">Order Details</h5>
                    <hr>
                    <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)
                            <tr>
                                <td>{{$item-> product-> name}}</td>
                                <td>{{$item-> prod_qty}}</td>
                                <td>{{$item-> product-> selling_price}}</td>
                              </tr>
                              @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary float-end"> Place Order </button>
                </div>
            </div>
        </div>

    </div>
</form>



 @endsection



@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script>
        $('.addToCart').click(function(event){

            event.preventDefault();
            var product_id=$(this).closest('.product_data').find('.prod_id').val();
            var product_qty=$(this).closest('.product_data').find('.qty-input').val();
            $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                method:"post",
                url:"/addToCart",
                data:{'product_id':product_id , 'product_qty':product_qty,},
                success:function(response){
                    alert(response.status);
                }
            });

        });
    </script>
    <script>
        $('.addtoWishlist').click(function(){
                alert('welcome wishlist');
        });
    </script>
    <script>
        $('.increment-btn').click(function(event){
            event.preventDefault();
            //var inc_value=$('.qty-input').val();
            var inc_value = $(this).closest('.product_data').find('.qty-input').val();
            var value=parseInt(inc_value , 10);
            if (value < 10) {
                value ++;
               // $('.qty-input').val(value);
               $(this).closest('.product_data').find('.qty-input').val(value);
            }

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        alert(prod_id);
        alert (qty);

        $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });


            data = {'prod_id':prod_id , 'prod_qty':qty ,}

            $.ajax({
                method: "post",
                url: "update-cart",
                data: data,
                success:function(response){
                    alert(response.status);
                }
            });
        });
    </script>
    <script>
        $('.decrement-btn').click(function(event){
            event.preventDefault();
            var inc_value = $(this).closest('.product_data').find('.qty-input').val();

            var value=parseInt(inc_value , 10);
            if (value > 1) {
                value --;
                var inc_value = $(this).closest('.product_data').find('.qty-input').val(value);
            }

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();
        alert(prod_id);
        alert (qty);

        $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });


            data = {'prod_id':prod_id , 'prod_qty':qty ,}

            $.ajax({
                method: "post",
                url: "update-cart",
                data: data,
                success:function(response){
                    alert(response.status);
                }
            });
        });
</script>

<script>
    $('.delete-cart-item').click(function(event){
        event.preventDefault();
        var prod_id=$(this).closest('.product_data').find('.prod_id').val();
        // alert(prod_id);
            $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
                method:"post",
                url:"delete-cart-item",
                data:{'prod_id':prod_id ,},
                success:function(response){
                    alert(response.status);
                }
            });


    });
</script>

<script>
    $('.changeQty-btn').click(function(event){
        event.preventDefault();
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            data = {'prod_id':prod_id , 'prod_qty':qty ,}

            $.ajax({
                method: "post",
                url: "update-cart",
                data: data,
                success:function(response){
                    alert(response.status);
                }
            });
    });
</script>

@endsection
