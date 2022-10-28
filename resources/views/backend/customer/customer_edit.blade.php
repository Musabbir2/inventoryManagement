@extends('admin.admin_master')
@section('admin')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Customer</h4><br><br>


                            @if(count($errors))
                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                                @endforeach
                            @endif


                            <form method="post" action="{{route('customer.update')}}"  id="myForm" enctype="multipart/form-data">
                                @csrf

                                //by this we can request our specific requested id
                                <input type="hidden" name="id" value="{{$customers->id}}">

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label ">Customer Name</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="name" class="form-control" type="text" value="{{$customers->name}}"  id="name">
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label ">Customer Mobile</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="mobile_no" class="form-control" type="text" value="{{$customers->mobile_no}}"  id="mobile_no">
                                    </div>
                                </div>
                                <!-- end row -->



                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label ">Customer Email</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="email" class="form-control" type="email" value="{{$customers->email}}"  id="email">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label ">Customer Address</label>
                                    <div class="col-sm-10 form-group">
                                        <input name="address" class="form-control" type="text" value="{{$customers->address}}"  id="address">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image </label>
                                    <div class="col-sm-10 form-group">
                                        <input name="customer_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{asset($customers->customer_image)}}" alt="Card image cap">
                                    </div>
                                </div>



                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Customer">
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
                    mobile_no : {
                        required : true,
                    },
                    email : {
                        required : true,
                    },
                    address : {
                        required : true,
                    },
                    customer_image :{
                        required  : false,
                    },
                },
                messages :{
                    name : {
                        required : 'Please Enter Your Name',
                    },
                    mobile_no : {
                        required : 'Please Enter Your Mobile Number',
                    },
                    email : {
                        required : 'Please Enter Your Email',
                    },
                    address : {
                        required : 'Please Enter Your Address',
                    },
                    customer_image :{
                        required : 'Please Enter your Image'
                    }
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

    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>
@endsection
