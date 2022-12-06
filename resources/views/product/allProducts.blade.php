@extends('layouts.master')
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h5 class="content-title mb-0 my-auto">All Products </h5><span class="content-title mb-0 my-auto">/ Ecommerce</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">

					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12 col-md-12">
    <div class="card custom-card">
        <div class="card-body">
            <div class="row row-sm">
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <a class="modal-effect btn btn-outline-primary btn-block"
                    data-effect="effect-scale" data-toggle="modal"
                    href="#modaldemo8">Add Product</a>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card mg-b-20">

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table key-buttons text-md-nowrap">
                        <thead>
                            <tr>
                                <th class="border-bottom-0">Category</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Description</th>
                                <th class="border-bottom-0">Price</th>
                                <th class="border-bottom-0">Qty</th>
                                <th class="border-bottom-0">Tax</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allproducts as $item)
                            <tr>
                                <td>{{$item-> category->name}}</td>
                                <td>{{$item-> name}}</td>
                                <td>{{$item-> description}}</td>
                                <td>{{$item-> selling_price}}</td>
                                <td>{{$item-> qty}}</td>
                                <td>{{$item-> tax}}</td>
                                <td>
                                 <img src="{{ asset('assets/uploads/product/'.$item->image) }}"
                                 class="img-responsive" width="70px" height="70px" alt=" ">
                                </td>
                                <td>
                                        <a class="modal-effect btn btn-primary "
                                        data-effect="effect-scale" data-toggle="modal"
                                        data-id = {{ $item-> id }}
                                        data-cate_id = {{ $item-> cate_id }}
                                        data-name = {{ $item-> name }}
                                        data-selling_price = {{ $item-> selling_price }}
                                        data-description = {{ $item-> description }}
                                        data-qty = {{ $item-> qty }}
                                        data-tax = {{ $item-> tax }}
                                        href="#modaldemo90">
                                        <i class="fa fa-cog" aria-hidden="true"> </i> </a>

                                        <a href="{{ url('delete-product/'.$item->id)}}" class="btn btn-danger">
                                            <i class="fa fa-trash fa-fw" aria-hidden="true"> </i>  </a>

                                        <a href="{{ url('show-product/'.$item->id)}}" class="btn btn-success">Show</a>

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
<!-- Modal effects -->

<div class="modal" id="modaldemo8" >
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
        <div class="modal-header">
            <h6 class="modal-title">Add Product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
<form action="{{ url('insert-product') }}"  method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <select class="form-select" name="cate_id">
            <option selected>Select Category</option>
            @foreach ($allcategory as $item)
            <option value="{{ $item -> id}}"> {{ $item -> name}} </option>
            @endforeach
          </select>
    </div>

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label>Small Description</label>
            <input type="text" class="form-control" id="small_description" name="small_description">
        </div>
        <div class="form-group">
            <label>Desciption</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label>Original Price</label>
            <input type="text" class="form-control" id="original_price" name="original_price">
        </div>
        <div class="form-group">
            <label>Selling Price</label>
            <input type="text" class="form-control" id="selling_price" name="selling_price">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" class="form-control" id="qty" name="qty">
        </div>
        <div class="form-group">
            <label>Tax</label>
            <input type="text" class="form-control" id="tax" name="tax">
        </div>
        <div class="form-group">
            <label>Status</label>
            <input type="checkbox"  id="status" name="status">
        </div>
        <div class="form-group">
            <label>Trending</label>
            <input type="checkbox"  id="trending" name="trending">
        </div>
        <div class="form-group">
            <label>Meta title</label>
            <input type="text" class="form-control" id="meta_title" name="meta_title">
        </div>
        <div class="form-group">
            <label>Meta Keywords</label>
            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords">
        </div>
        <div class="form-group">
            <label>Meta Description</label>
            <input type="text" class="form-control" id="meta_description" name="meta_description">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="modal-footer">
            <button class="btn ripple btn-primary"
            type="submit" >Save changes</button>
            <button class="btn ripple btn-secondary" data-dismiss="modal"
            type="button" >Close</button>

        </div>
</form>
</div>

<div class="modal" id="modaldemo90" >
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-content-demo">
        <div class="modal-header">
            <h6 class="modal-title">Update Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
<form action="{{ url('update-product') }}"  method="PUT" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label>Small Description</label>
        <input type="text" class="form-control" id="small_description" name="small_description">
    </div>
    <div class="form-group">
        <label>Desciption</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label>Original Price</label>
        <input type="text" class="form-control" id="original_price" name="original_price">
    </div>
    <div class="form-group">
        <label>Selling Price</label>
        <input type="text" class="form-control" id="selling_price" name="selling_price">
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <input type="text" class="form-control" id="qty" name="qty">
    </div>
    <div class="form-group">
        <label>Tax</label>
        <input type="text" class="form-control" id="tax" name="tax">
    </div>
    <div class="form-group">
        <label>Status</label>
        <input type="checkbox"  id="status" name="status">
    </div>
    <div class="form-group">
        <label>Trending</label>
        <input type="checkbox"  id="trending" name="trending">
    </div>
    <div class="form-group">
        <label>Meta title</label>
        <input type="text" class="form-control" id="meta_title" name="meta_title">
    </div>
    <div class="form-group">
        <label>Meta Keywords</label>
        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords">
    </div>
    <div class="form-group">
        <label>Meta Description</label>
        <input type="text" class="form-control" id="meta_descrip" name="meta_descrip">
    </div>
    <div class="form-group">
        <input type="file" class="form-control" id="image" name="image">
    </div>
        <div class="modal-footer">
            <button class="btn ripple btn-primary"
            type="submit" >Save changes</button>
            <button class="btn ripple btn-secondary" data-dismiss="modal"
            type="button" >Close</button>

        </div>
</form>
</div>

    </div>
    </div>
    </div>
				<!-- row -->


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
    $('#modaldemo90').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var cate_id = button.data('cate_id')
    var name = button.data('name')
    var selling_price = button.data('selling_price')
    var qty = button.data('qty')
    var tax = button.data('tax')
    var description = button.data('description')
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #cate_id').val(cate_id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #selling_price').val(selling_price);
    modal.find('.modal-body #qty').val(qty);
    modal.find('.modal-body #tax').val(tax);
    modal.find('.modal-body #description').val(description);
    })
</script>
@endsection
