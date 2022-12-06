@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<meta name="csrf-token" content="{{ csrf_token() }}">
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto ">Product Details </h4>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
                <div class="container">
                    <div class="card shadow product_data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 border-right">
                                    <img src=" {{ asset('assets/uploads/product/'.$product-> image)}}"
                                       alt="" >
                                </div>

                            <div class="col-md-8">
                                <h2 class="mb-0 float-end">{{ $product-> name}}
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag">
                                Trending </label>
                                </h2>
                                <hr>
                                <label class="me-3">
                                    Original Price :
                                    <s> Rs {{ $product-> original_price}}</s>
                                </label>
                                <label class="me-3">
                                    Selling Price :
                                     Rs {{ $product-> selling_price}}
                                </label>
                                <p class="mt-3"> {{!! $product-> description !!}} </p>
                                <hr>
                                @if($product->qty > 0)
                                <label class="badge bg-success>In Stock</label>
                                @else
                                <label class="badge bg-danger>Out of Stock</label>
                                @endif

                            <div class="row mt-2">
                                <div class="col-md-2">
                                    <div class="input-group text-center mb-3">
                                        <input type="hidden" value="{{$product-> id}}"  class="prod_id"/>
                                        <label>Quantity</label>
                                        <span class="input-group-text decrement-btn">-</span>
                                        <input type="text" name="quantity"  class="qty-input"  value="1"/>
                                        <span class="input-group-text increment-btn">+</span>
                                    </div>

                                </div>

                            <div class="col-md-10">
                                @if($product->qty > 0)
                                <button type="button" class="btn btn-success me-3 float-start addtoWishlist">Add To Wishlist</button>
                                <button type="button" class="btn btn-success me-3 float-start addToCart">Add To Cart</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

@endsection
@section('content')
				<!-- row -->
				<div class="row">

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
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
           // alert(product_id);
           // alert(product_qty);
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
            var inc_value=$('.qty-input').val();
            var value=parseInt(inc_value , 10);
            if (value < 10) {
                value ++;
                $('.qty-input').val(value);
            }

        });
    </script>
    <script>
        $('.decrement-btn').click(function(event){
            event.preventDefault();
            var inc_value=$('.qty-input').val();
            var value=parseInt(inc_value , 10);
            if (value > 1) {
                value --;
                $('.qty-input').val(value);
            }
        });
</script>
@endsection
