@extends('layouts.masterAdmin')

{{-- @section('page-title')
Free Questions
@endsection --}}

@section('content')

{{-- {{dd($freeQuestions)}} --}}
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Transactions</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table class="table table-hover table-bordered table-striped">
      <thead>
        <tr>

          <th style="max-width: 30px">#</th>
          <th >Name</th>
          <th >Email</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $key=>$transaction)
        <tr>
          <td>{{$transaction->id}}</td>



          <td onclick="window.location='{{route('cms.analysis.getOutputAll',['transactionId'=>$transaction->id])}}';" class="link-hover" >
            <i class="fas fa-align-justify">&nbsp &nbsp
            </i>{{ucfirst($transaction->name)}}
          </td>
          <td>{{$transaction->email}}</td>



        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
      <li class="page-item"><a class="page-link" href="#">«</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">»</a></li>
    </ul>
  </div>
</div>

<div class="row">



</div>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Dashboard</a></li>
@endsection



@section('page-custom-css')
<style>.link-hover { cursor: pointer; }
</style>
@endsection


@section('page-custom-js')
<script>

  $(document).on('click', '.button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
      title: "Are you sure!",
      type: "error",
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes!",
      showCancelButton: true,
    },
    function() {
      $.ajax({
        type: "POST",
        url: "{{route('cms.sets.destroy',['qsetSlug'=>'$qset->slug'])}}",
        data: {id:id},
        success: function (data) {
          //
        }
      });
    });
  });
</script>
@endsection
