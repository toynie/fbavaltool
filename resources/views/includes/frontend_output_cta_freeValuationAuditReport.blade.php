<div class="card bg-primary">
    <div class="card-header text-center mt-4"><b><h2 class="card-title">FREE VALUATION<br>AUDIT REPORT</h2></b></div>
  <div class="card-body text-center">
    <p>Learn about the specific factors that determine the value of your business and what you can change to increase your valuation</p>
    <img class="img-responsive pt-5" src="/img/Vector Smart Object.png" alt="Chania">
  </div>
  <div class="card-footer">

    <form action="freequestions" class="mb-0">
        {{-- {{dd($result['transactionInfo']['transactionId'])}} --}}
          <input type="text" class="form-control" id="input-part" name="part"  value="2" hidden>
          <input type="text" class="form-control" id="input-part" name="busstype"  value="{{$result['transactionInfo']['businessType']['id']}}" hidden>
          <input type="text" class="form-control" id="input-part" name="transactionId"  value="{{$result['transactionInfo']['transactionId']}}" hidden>

        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
        <button type="submit" class="btn btn-primary btn-block">GET FREE REPORT</button>
      </form>
  </div>
</div>
