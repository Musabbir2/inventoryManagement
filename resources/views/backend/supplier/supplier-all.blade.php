@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Supplier All</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <a href="{{route('supplier.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light float-end"><i class="fas fa-plus-circle">Add Supplier</i></a> <br> <br>
                            <h4 class="card-title">Supplier All Data </h4>


                            <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </thead>


                                <tbody>
                                @php($i = 1)
                                @foreach($suppliers as $key => $item)
                                    <tr>
                                        <td> {{ $i++}} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->mobile_no }} </td>
                                        <td>{{ $item->email }} </td>
                                        <td> {{ $item->address }} </td>
                                        <td>
                                            <a href="{{route('supplier.edit',$item->id)}}" class="btn btn-info btn-sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            <a href="{{route('supplier.delete',$item->id)}}" class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fas fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>



@endsection
