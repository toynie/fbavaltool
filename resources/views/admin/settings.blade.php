@extends('layouts.masterAdmin')

@section('page-title')
Update Settings
@endsection
{{-- {{dd($settings)}} --}}
@section('content')
 {{--<form action="{{route('cms.settings.edit')}}">--}}
 <form action="{{ action('SettingController@updateSettings') }}">
<div class="row">
        <div class="col-md-4">
            {{-- <div class="form-group">
                <label for="text">Buss Model Acronym</label>
                <input type="text" name="project_aronym"  class="form-control" value="{{$settings->where('name', 'project_aronym')[0]->value}}" id="project_aronym" required>
            </div> --}}
            <div class="form-group">
                <label for="text">12 Months Revenue Question ID</label>
            <input type="number" name="total_revenue_12_months"  class="form-control" value="{{$settings->where('name', 'total_revenue_12_months')[1]->value}}" id="total_revenue_12_months" required>
            </div>
            <div class="form-group">
                <label for="text">Total Cost of Goods Question ID</label>
                <input type="number" name="total_cost_goods_sold_12_months"  class="form-control" value="{{$settings->where('name', 'total_cost_goods_sold_12_months')[2]->value}}" id="total_cost_goods_sold_12_months" required>
            </div>
            <div class="form-group">
                <label for="text">Total Operationg Expense 12 months</label>
                <input type="number" name="total_operating_expense_12_months"  class="form-control" value="{{$settings->where('name', 'total_operating_expense_12_months')[3]->value}}" id="total_operating_expense_12_months" required>
            </div>
            <div class="form-group">
                <label for="text">Traffic Source</label>
                <input type="number" name="traffic_source"  class="form-control" value="{{$settings->where('name', 'traffic_source')[10]->value}}" id="traffic_source" required>
            </div>
            <div class="form-group">
                <label for="text">Valuation Range</label>
                <div class="input-group mb-3">

                <input type="number" name="valuation_range"  class="form-control" value="{{$settings->where('name', 'valuation_range')[7]->value}}" id="valuation_range" required>
                <div class="input-group-append">
                  <span class="input-group-text">%</span>
                </div>
              </div>

            </div>
            {{-- <div class="form-group">
                <label for="text">Buss. Type Question ID</label>
                <input type="number" name="business_type_question" class="form-control" value="{{$settings->where('name', 'business_type_question')[5]->value}}" id="business_type_question">
            </div> --}}
            <div class="form-group">
                <label for="text">Buss. Type Question ID</label>



                <input type="number" step="any" name="confidenceBase" class="form-control" value="{{FbaHelpers::confidenceBase()}}" id="business_type_question">
            </div>
        </div>

</div>
<button type="submit" class="btn btn-info">Update</button>
</form>



@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">CMS</a></li>
<li class="breadcrumb-item active"><a href="#">Settings</a></li>
@endsection



@section('page-custom-css')
<style>
/* .link-hover { cursor: pointer; } */
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
