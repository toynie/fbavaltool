@extends('layouts.masterFrontend')

@section('page-title')

Paid Output
@endsection

@section('custom-style')
.divbtn .img-thumbnail {
    {{-- background-color: #081b53; --}}
    {{-- background-color: #f8fafc; --}}
    border: 6px solid #5bd0a0;
    padding: 0;
    border: unset;
    box-shadow:unset;
}

.divbtn .img-thumbnail:hover {
background-color: #65d6a8;
{{-- border: 8px solid #399b73; --}}
width: 250;

padding: 0;
{{-- box-shadow: 1px 1px 9px 0px; --}}
}
.divbtn{
cursor: pointer;
}
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*/
.nav-pills-custom .nav-link {
color: #5bd1a1;
background: #393ba3;
position: relative;
}

.nav-pills-custom .nav-link.active {
color: #393ba3;
background: #5bd1a1;
}


/* Add indicator arrow for the active tab */
@media (min-width: 992px) {
.nav-pills-custom .nav-link::before {
content: '';
display: block;
border-top: 23px solid transparent;
border-left: 10px solid #5bd1a1;
border-bottom: 23px solid transparent;
position: absolute;
top: 50%;
right: -10px;
transform: translateY(-50%);
opacity: 0;
z-index: 99;
}
}

.nav-pills-custom .nav-link.active::before {
opacity: 1;
}


@endsection

@section('content')
<style>
    .thumbnail {
        background: #000;
    }

    .tooltip-inner {

    margin-left:0px;
    }


</style>

<div id="app">
    {{-- <freevaluation></freevaluation> --}}
    {{-- <app></app> --}}
</div>


<div class="container py-5">


        <h1 class="text-center text-uppercase mt-5"><strong>SELECT YOUR BUSINESS</strong></h1>
        <!---->
        <h3 class="text-center">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </h3>
        <div class="row pb-5 justify-content-center">

            @foreach($data["buss"] as $dat)
            <div class="col-lg-4 col-sm-6 col-xs-6 tofadeinscroll">

                <div class="business-services mx-auto" data-toggle="tooltip" data-placement="bottom" title="{{ $dat['info'] }}">
                    {{-- <a href="/userdetails?busstype={{$dat['id']}}"> --}}
                    <a href="/tool/free/{{$dat['id']}}-{{ \Illuminate\Support\Str::slug($dat['name']) }}" class=" d-flex align-items-center justify-content-center">
                        @if(str_contains($dat['featured'], '.svg'))
                            {!! file_get_contents(public_path($dat['featured'])) !!}
                        @else
                            <img src="{{$dat['featured']}}" id="{{$dat['id']}}" class="img-fluid">
                        @endif
                    </a>
                    <h6 class="text-center">{{$dat['name']}}</h6>
                </div>
            </div>
            @endforeach
        </div>
        {{-- @include('includes.frontend_footer') --}}

</div>

<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

@endsection

@push('stack-styles')
    <style type="text/css">
        .business-services img,
        .business-services svg {
            width: 90px !important;
            height: auto;
        }

        .business-services svg {
            fill: rgb(66,81,123);
        }

        .business-services:hover {
            background: #5BD0A0;
            color: #fff;
        }

        .business-services {
            border-radius: 150px;
            height: 180px;
            width: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            transition: background-color, border-radius 300ms;
        }

        .business-services h6 {
            font-size: 16px;
        }

        .business-services:hover svg {
            fill: #fff;
        }
        .business-services:hover img {
            filter: brightness(0) invert(1);
        }
    </style>
@endpush

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
