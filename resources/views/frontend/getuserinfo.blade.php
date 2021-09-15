

@extends('layouts.masterFrontend')

@section('page-title')

Paid Output
@endsection

@section('custom-style')
   input{
    border: 2px solid #8097fe !important;
    border-radius: 0px;
   }

@endsection

@section('content')
<div class="container-fluid px-0">
    <div class="  getuser p-5" style="background-color: #182b62; color:white">
        <div class="container p-5  " style="background-color: #00000021;">
            
            <div class="row ">
                <div class="col-md-8 offset-md-2 col-lg-12 offset-lg-0">
                <h5>Are you looking to...</h5>
                    <form role="form" action="/freequestions" method="get"  enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="number" name="busstype" class="form-control  " id="busstype" placeholder="busstype" value="{{$busstype_id}}" hidden>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input name="website" type="text" class="form-control  " id="inputFirstname" placeholder="Website">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input name="name" type="text" class="form-control" id="inputFirstname" placeholder="Name" required>
                        </div>
                        <div class="col-sm-6">
                            <input name="email" type="email" class="form-control" id="inputLastname" placeholder="Email"  required>
                        </div>
                    </div>
                    <div class="form-group form-check text-center">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">I have read and accept the <span style="color:#5cd0a1">Terms & Conditions</span></label>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary .mx-auto " style="background-color:#5cd0a1">KNOW MY BUSINESS VALUATION</button>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
@include('includes.frontend_footer')
</div>


</style>
<div id="app">
    {{-- <freevaluation></freevaluation> --}}
    <app></app>
</div>

@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
