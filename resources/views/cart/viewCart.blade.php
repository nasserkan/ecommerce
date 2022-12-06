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
                <h4 class="content-title mb-0 my-auto ">My Cart   </h4>
            </div>
        </div>
    </div>
    <div class="card shadow ">
      @if ($cartitems-> count() > 0)

        <div class="card-body">
            @php $total = 0; @endphp

            @foreach ($cartitems as $item)
            <div class="row product_data" >
                    <div class="col-md-2">
                        <img src=" {{ asset('assets/uploads/product/'.$item->product-> image)}}"
                        class="img-responsive" width="70px" height="70px" alt=" ">
                    </div>
                    <div class="col-md-3">
                        <h5> {{ $item-> product-> name  }} </h5>
                        <h5 style="color: brown"> Price : {{ $item-> product-> selling_price  }} </h5>
                    </div>
                    <div class="col-md-5">
                            <input type="hidden"  class="prod_id" value="{{ $item-> prod_id }}">
                        @if( $item->product->qty >=  $item->prod_qty )
                            <label for="Quantity">Quantity</label>

                            <button class=" decrement-btn">-</button>
                            <input type="text" name="quantity"  class="text-center qty-input" width="50px"
                            value="{{$item->prod_qty}}"/>
                            <button class=" increment-btn">+</button>

                        @else
                            <h6>Out of Stock</h6>
                        @endif
                    </div>
                    <div class="col-md-2">

                            <button class="btn btn-danger deleteCart">

                            <i class="fa fa-trash"></i>
                            Remove
                        </button>
                    </div>
                </div>
                @php $total += $item-> product->selling_price * $item-> prod_qty  ; @endphp
                    @endforeach

                    <div class="card-footer">
                       <h3> Total Price: {{ $total }}</h3>
                       <a href="{{ url('viewCheckout') }}" class="btn btn-outline-success float-end">
                        <i class="fa fa-shopping-cart"></i>
                        Check Out
                       </a>
                    </div>


                @else

                    <div class="card-body text-center">
                        <h2> Your <i class="fa fa-shopping-cart"></i> Cart is Empty </h2>
    <a href="{{ url('allCategory') }}" class="btn btn-outline-primary float-right">
    Continue  Shopping   </a>
                    </div>


                @endif
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
        $('.deleteCart').click(function(event){

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
                url:"/deleteCart",
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
       // alert(prod_id);
       // alert (qty);

        $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });


            data = {'prod_id':prod_id , 'prod_qty':qty ,}

            $.ajax({
                method: "POST",
                url: "updateCart",
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
        //alert(prod_id);
        //alert (qty);

        $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });


            data = {'prod_id':prod_id , 'prod_qty':qty ,}

            $.ajax({
                method: "POST",
                url: "updateCart",
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
       // {!! csrf_field() !!}
        var prod_id=$(this).closest('.product_data').find('.prod_id').val();

        var product_id=$(this).closest('.product_data').find('.prod_id').val();
        var product_qty=$(this).closest('.product_data').find('.qty-input').val();
        var token = $("meta[name='csrf-token']").attr("content");
       //  alert(prod_id);
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }});

            $.ajax({
                method: "POST",
                url: "deleteCartItem" ,
               // data:{_token: token,'prod_id':prod_id ,},
                //data:{'prod_id':prod_id ,},
                data:{'product_id':product_id , 'product_qty':product_qty,},
               success: function( data ) {
                $("#ajaxResponse").append(data.msg);
                console.log(data);
            },error:function(){
        alert("error!!!!");
        console.log(this.response);
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
