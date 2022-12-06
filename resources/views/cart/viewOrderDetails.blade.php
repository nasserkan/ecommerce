@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
<div class="container py-2">
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto ">Order View   </h4>
            </div>
        </div>
    </div>

    <div class="card shadow ">
        <div class="card-body">
          <div class="row ">
            <div class="col-md-4">
             <label>First Name / Last Name</label>
             <div class="border p-2">{{ $orders-> fname }}  {{ $orders-> lname }}</div>

             <label>Email</label>
             <div class="border p-2">{{ $orders-> email }}</div>
             <label>Phone</label>
             <div class="border p-2">{{ $orders-> phone }}</div>
             <label>Address></label>
             <div class="border p-2">{{ $orders-> address }}</div>
             <label>City</label>
             <div class="border p-2">{{ $orders-> city }}</div>
             <label>State</label>
             <div class="border p-2">{{ $orders-> state }}</div>
             <label>Country</label>
             <div class="border p-2">{{ $orders-> country }}</div>
             <label>>Pin Code</label>
             <div class="border p-2">{{ $orders-> pincode }}</div>

            </div>




            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                     <tr>
                         <th>Name </th>
                         <th>Quantity </th>
                         <th>Price </th>
                         <th>Image</th>
                     </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders->orderitems as $item)
                        <tr>
                            <td> {{ $item-> product-> name}}    </td>
                            <td> {{ $item-> product-> qty}}    </td>
                            <td> {{ $item-> product-> selling_price}}    </td>
                            <td> <img src=" {{ asset('assets/uploads/product/'.$item->product-> image)}}"
                                class="img-responsive" width="70px" height="70px" alt=" "></td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>

            </div>
          </div>
        </div>
    </div>


</div>
 @endsection
