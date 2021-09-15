

<div class="container-fluid row-client-response p-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                        <div class="card-deck d-flex justify-content-center" >

                           @if ($result["transactionInfo"]["whyValuate"]== 1)   {{-- I want to sell now --}}
                                @include('includes.frontend_output_cta_freeValuationAuditReport')
                                @include('includes.frontend_output_cta_startPlanningMyExit')

                            @elseif ($result["transactionInfo"]["whyValuate"]== 2) {{-- I want to sell in 6 months --}}
                                @include('includes.frontend_output_cta_startPlanningMyExit')
                                @include('includes.frontend_output_cta_freeValuationAuditReport')

                            @elseif ($result["transactionInfo"]["whyValuate"]== 3) {{-- I want to sell eventually --}}
                                @include('includes.frontend_output_cta_startPlanningMyExit')
                                @include('includes.frontend_output_cta_freeValuationAuditReport')

                            @elseif ($result["transactionInfo"]["whyValuate"]== 4) {{-- Just curious --}}
                                @include('includes.frontend_output_cta_freeValuationAuditReport')
                                @include('includes.frontend_output_cta_startPlanningMyExit')

                            @elseif ($result["transactionInfo"]["whyValuate"]== 5){{-- I'm buying a business--}}
                                @include('includes.frontend_output_cta_freeValuationAuditReport')
                                @include('includes.frontend_output_cta_startPlanningMyExit')

                           @else

                           @endif
                        </div>

                </div>
            </div>

        </div>

    </div>
