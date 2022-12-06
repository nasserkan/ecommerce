@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->

<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">

@endsection
@section('content')
				<!-- row opened -->
			<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<h4 class="card-title mg-b-0">Nasser Table</h4>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
								<p class="tx-12 tx-gray-500 mb-2">Test Table. <a href="">Learn more</a></p>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table key-buttons text-md-nowrap" id="example">
										<thead>
											<tr>
												<th class="wd-15p border-bottom-0">First name</th>
												<th class="wd-15p border-bottom-0">Last name</th>
												<th class="wd-20p border-bottom-0">Position</th>
												<th class="wd-15p border-bottom-0">Start date</th>
												<th class="wd-10p border-bottom-0">Salary</th>
												<th class="wd-25p border-bottom-0">E-mail</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Nasser</td>
												<td>Mohamed</td>
												<td>Web Developer</td>
												<td>2022/03/12</td>
												<td>$654,765</td>
												<td>nasser.mohamedkan@gmail.com</td>
											</tr>
											<tr>
												<td>Doha</td>
												<td>Nasser</td>
												<td>Account Manager</td>
												<td>2021/02/21</td>
												<td>$543,654</td>
												<td>dohaNasser@gmail.com</td>
											</tr>
											<tr>
												<td>Ahmed</td>
												<td>Nasser</td>
												<td>Engineer</td>
												<td>2021/02/87</td>
												<td>$86,000</td>
												<td>ahmedNasser@gmail.com</td>
											</tr>
											<tr>
												<td>Mahmoud</td>
												<td>Nasser</td>
												<td>Lawyer</td>
												<td>2021/06/87</td>
												<td>$76,000</td>
												<td>mahmoudNasser@gmail.com</td>
											</tr>

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

			</div>

		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
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
@endsection

