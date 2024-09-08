@extends('layouts.dashboard.main')

@section('content')
<section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-pets-sec">
         
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Merchant Coming Soon</h2>
                        </div>
                    </div>
                   
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-lg-right text-md-right">
                        <a href="{{route('dashboard.myPets')}}"  class="primary-btn primary-bg ">Back</a>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">

(()=>{

})()
</script>
@endsection
