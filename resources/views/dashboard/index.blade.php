@extends('layouts.dashboard.main')

@section('content')
<div class="col-lg-8 pdy-30">

<div class="icon-set">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 pdt-20">
            <div class="visitweb">
                <ul>
                    <li><i class="fa fa-globe" aria-hidden="true"></i>
                    </li>
                    <li><a href="{{route('home')}}">visit website</a></li>
                </ul>

            </div>

        </div>
        <div class="col-lg-3 col-md-6 pdt-20">
            <div class="visitweb">
                <ul>
                    <li><i class="fa fa-user" aria-hidden="true"></i>
                    </li>
                    {{-- <li><a href="{{route('dashboard.editProfile')}}">Edit Profile</a></li> --}}
                </ul>

            </div>

        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 pdt-20">
            <div class="visitweb">
                <ul>
                    <li><i class="far fa-lock-alt"></i>
                    </li>
                    <li><a href="{{route('dashboard.passwordChange')}}">Password Change</a></li>
                </ul>

            </div>

        </div>
        <div class="col-lg-3 col-md-6 pdt-20">
            <div class="visitweb">
                <ul>
                    <li><i class="fa fa-sign-out" aria-hidden="true"></i>
                    </li>
                    <li><a href="{{route('signout')}}">Logout</a></li>
                </ul>

            </div>

        </div>
    </div>

    @if (isset(Auth::user()['type']))
    @if(Auth::user()['type']==2 || Auth::user()['type']==1)
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 pdt-20">
            <div class="visitweb">
                <ul>
                    <li><i class="fa fa-plus" aria-hidden="true"></i>
                    </li>
                    <li><a href="{{route('post.event')}}">Post An Event</a></li>
                </ul>

            </div>

        </div>
        <div class="col-lg-3 col-md-6 pdt-20">
            <div class="visitweb">
                <ul>
                    <li><i class="fa fa-plus" aria-hidden="true"></i>
                    </li>
                    <li><a href="{{route('post.product')}}">Post A Product</a></li>
                </ul>

            </div>
        </div>
    </div>
    @endif
    @endif

</div>
</div>
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
