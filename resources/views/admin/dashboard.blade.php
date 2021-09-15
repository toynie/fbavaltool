@extends('layouts.masterAdmin')

@section('page-title')
Dashboard
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">

    <div class="card card-primary card-outline">
      <div class="card-body">
        <h5 class="card-title">Questions</h5>

        <p class="card-text">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          You are logged in!
        </p>
        <a href="#" class="card-link">All Questions</a>
        <a href="#" class="card-link">Sets</a>
      </div>
    </div><!-- /.card -->
  </div>
  <!-- /.col-md-6 -->
</div>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection
