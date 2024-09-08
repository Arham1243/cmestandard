@extends('layouts.dashboard.main')

@section('content')

<div class="col-lg-8 pdy-30">
				<div class="row justify-content-center">
					<div class="profile">
						<div class="col-lg-12">
							<div class="e-profile pdy-30">
								<h2>Password Change</h2>
								<p>Change your password</p>

							</div>

							<div class="contact-form1">
								<div class="row m-0">
									<div class="col-lg-3">
										<div class="email-pass">
												<label>Email</label>
												<label>Password</label>
												<label>Retype Password</label>
										</div>
									</div>
									<div class="col-lg-9">

										<form action="{{ route('dashboard.update.password') }}" method="post"  id="accountForm">
                                        @csrf
											<input type="email"  name="email" disabled value="{{ Auth::user()->email }}" placeholder="Your Name"
												class=" form-control">
                                               


											<input type="password" name="password" placeholder="Enter New Password Here" required id="myInput" class=" form-control">
                                          

											<input type="password" name="password_confirmation" placeholder="Retype Password Here" required id="myInput" class=" form-control">
                                         
                                            <div class="save-info">
												<button type="submit">Save</button> 

											</div>


										</form>
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

</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
  
})()
</script>
@endsection
