@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit products</h4><br><br>


                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                @endforeach

                            @endif


                            <form method="post" action="{{route('product.update')}}"  id="myForm">
                                @csrf

                                <input type="hidden" name="id" value="{{$product->id}}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label ">product Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="name" value="{{$product->name}}" class="form-control" type="text"  id="name">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="supplier_id" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($supplier as $supp)
                                                <option value="{{$supp->id}}" {{ $supp->id == $product->supplier_id ? 'selected' : '' }}>{{$supp->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Unit Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="unit_id" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($unit as $uni)
                                                <option value="{{$uni->id}}" {{ $uni->id == $product->unit_id ? 'selected' : '' }}>{{$uni->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="category_id" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            @foreach($category as $cate)
                                                <option value="{{$cate->id}}" {{ $cate->id == $product->category_id ? 'selected' : '' }}>{{$cate->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add products">
                            </form>



                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name : {
                        required : true,
                    },
                    supplier_id : {
                        required : true,
                    },
                    unit_id : {
                        required : true,
                    },
                    category_id : {
                        required : true,
                    },
                },
                messages :{
                    name : {
                        required : 'Please Enter Your Name',
                    },
                    supplier_id : {
                        required : 'Please Enter Your Supplier',
                    },
                    unit_id : {
                        required : 'Please Enter Unit',
                    },
                    category_id : {
                        required : 'Please Enter Category',
                    },
                },

                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>
@endsection
