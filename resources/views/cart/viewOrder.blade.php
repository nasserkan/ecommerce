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
                <h4 class="content-title mb-0 my-auto ">My Orders   </h4>
            </div>
        </div>
    </div>


        <div class="row ">
            <div class="col-md-12">

            <table class="table table-bordered">
            <thead>
             <tr>
                <th>create date </th>
                 <th>Tracking Number </th>
                 <th>Total Price </th>
                 <th>Status </th>
                 <th>Action</th>
             </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                <tr>
                    <td> {{ date('d-m-y',strtotime($item-> created_at))}}    </td>
                    <td> {{ $item-> tracking_no}}    </td>
                    <td> {{ $item-> total_price}}    </td>
                    <td> {{ $item-> status == '0' ? 'Pending' : 'Completed'}}    </td>
                    <td> <a href="{{url('viewOrderDetails/'.$item->id)}}" class="btn btn-primary">View</a>  </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
        </div>


</div>
 @endsection
