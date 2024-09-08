@extends('layouts.dashboard.main')

@section('content')


<div class="col-lg-8 pdy-30">
                <div class="row justify-content-center">
                    <div class="profile">
                        <div class="col-lg-12">
                            <div class="e-profile pdy-30">
                                <h3>Click the button below to complete your stripe profile! </h3>
                                <h6 class="note">Note: This page will be shown until you complete your stripe profile!</h6>
                            </div>

                        <div class="contact-form2">
                                <div class="row ">
                                    <div class="col-lg-12 text-center">
                                    <a href="{{url($stripe->url)}}"><button class="tc-image-effect-circle btn-submit" type="submit">Click Here</button></a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
  .btn-submit{
        font-size: 16px;
        background: #0147fe;
        padding: 10px 11px;
        color: #fff;
        font-weight: 400;
        margin: 0 auto;
        text-shadow: none;
        text-align: center;
        border: 0;
        outline: none;
        display: block;
        width: 20%;
        border-radius: 5px;
        margin-bottom: 50px;
      }
      .note{
        color: red;
      }
</style>
@endsection
@section('js')
<script type="text/javascript">
 
(()=>{
  /*in page css here*/
  
  
})()
</script>
@endsection
