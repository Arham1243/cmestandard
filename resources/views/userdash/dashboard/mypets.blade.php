@extends('layouts.dashboard.main')

@section('content')
<section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-pets-sec">
            <form id="bookapt" method="GET" action="{{route('dashboard.appointmentBook')}}"> 
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="primary-heading color-dark">
                            <h2>My Pets</h2>
                        </div>
                    </div>
                   
                    <div class="col-lg-7 col-md-7 col-12">
                        <div class="text-lg-right text-md-right">
                        <a href="javascript:void(0)" id="book-btn" class="primary-btn primary-bg ">Book Appointment</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive dashboard-table">
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Pet Name</th>
                                <th>Breed</th>
                                <th>Species</th>
                                <th>Age</th>
                                <th>Color</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        @foreach($mypets as $pets)
                            <tr>
                                <td>
                               
                                    <div class="checkbox">
                                        <input type="checkbox" name="check_pets[]" class="check-pets" id="pet-check-{{$pets->id}}" value="{{$pets->id}}" >
                                        <label for="pet-check-{{$pets->id}}"><span></span> Select</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="pet-info">
                                    @if(null !== $pets->picture)
                                    <figure><img src="{{asset($pets->picture)}}" alt="dashboard-pet-img"></figure>
                                    @else
                                    <figure><img src="{{asset('images/dashboard-pet-1.jpg')}}" alt="dashboard-pet-img"></figure>
                                    @endif
                                    <h4>{{$pets->pet_name}}</h4>
                                    </div>
                                </td>
                                <td>{{$pets->breed}}</td>
                                <td>{{$pets->pet_type}}</td>
                                <td>{{$pets->pet_age}}</td>
                                <td>{{$pets->color}}</td>
                            <td>
                                <div class="dropdown show action-dropdown">
                                <a  href="#" role="button" id="action-dropdown" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                <?php $decrypt = Crypt::encryptString($pets->id);?>
                                    <a href="{{route('dashboard.editPets',$decrypt)}}" class="dropdown-item" href=""><i class="fa fa-pencil-square-o"
                                        aria-hidden="true"></i>
                                    Edit</a>
                                    <a href="{{route('dashboard.deletepets',$pets->id)}}" class="dropdown-item" href=""><i class="fa fa-trash"
                                        aria-hidden="true"></i>
                                    Delete</a>
                                    <a href="{{route('dashboard.viewPets',$decrypt)}}" class="dropdown-item" href=""><i class="fa fa-eye"
                                        aria-hidden="true"></i>
                                    View</a>
                                    
                                </div>
                                </div>
                            </td>
                            </tr>
                           @endforeach

                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        </div>
    </section>


    <!-- DASHBOARD END -->

    <!-- APPOINTMENT-MODAL START -->

    <div class="modal fade" id="appointment-modal" tabindex="-1" role="dialog" aria-labelledby="appointment-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div id="datepicker" class="mc-b-2"></div>
                     <a href="javascript:void(0)" id="book-apt-btn" class="primary-btn primary-bg lg-btn">Book Your Appointment</a>
                </div>
            </div>
        </div>
    </div>

    <!-- APPOINTMENT-MODAL END -->
@endsection
@section('css')
<style type="text/css">
  /*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
 function readURL(input) {
        if (input.files && input.files[0]) {
           // console.log('sad');
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#logo_img_my')
                    .attr('src', e.target.result);
                    console.log(e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
(()=>{
  /*in page css here*/
  var dateObject = null;
    $("#datepicker").datepicker({
    onSelect: function(dateText, inst) { 
       
        var today = new Date();
            today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
           // console.log('today' + today);
            //Get the selected date (also at midnight)
            var selDate = Date.parse(dateText);
           // console.log('today' + selDate);
            if(selDate < today) {
                //If the selected date was before today, continue to show the datepicker
                 $.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  'Cannot Select A Date Before Today',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 4000,
						stack: 6
					});
					dateObject = null;
                $('#datepicker').val('');
                $(inst).datepicker('show');
                //dateObject = null;
            }
            else{
                   dateObject = $(this).datepicker('getDate'); 
            console.log(dateObject);
            }
            
           
    }
});


  var checkedpets = [];
    $('#book-btn').click(function(){
      checkedpets = [];
        $( 'input[name="check_pets[]"]:checked' ).each(function( index, element ) {
            console.log(element);
        checkedpets.push(this.value);
      });
      

            if(checkedpets.length > 0)
            {
                $('#bookapt').submit();

                //  $('#appointment-modal').modal('show');
            }
           else{
               
           
            $.toast({
					heading: 'Error!',
					position: 'bottom-right',
					text:  'Please Select A Pet!',
					loaderBg: '#ff6849',
					icon: 'error',
					hideAfter: 4000,
					stack: 6
				});
           }
           
});


$('#book-apt-btn').click(function(){
    if(dateObject != null)
    {
   console.log(dateObject); 
   var strDateTime =  dateObject.getDate() + "/" + (dateObject.getMonth()+1) + "/" + dateObject.getFullYear();
//   console.log(strDateTime); 
//   return 0;
   $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
    
      $.ajax({
          

            type: "POST",

            url: "{{route('dashboard.book_appointment')}}",

            data: {pet_ids: checkedpets, appointment_date: strDateTime },
            dataType: "json",


            success: function (msg) {
                
                // console.log(msg);
                // console.log(msg.statusa);
               
                if(msg.statusa == 1)
                {
                   $.toast({
              heading: 'Success!',
              position: 'bottom-right',
              text:  'Appointment Submitted! Confirmation Will Be Recieved Soon!',
              loaderBg: '#ff6849',
              icon: 'success',
              hideAfter: 4000,
              stack: 6
            });
            setInterval(() => {
                window.location.href ="{{route('dashboard.myBookings')}}" ;
              }, 4000); 
                }
                else if(msg.statusa == 2)
                {
                    $.toast({
            			heading: 'Error!',
            			position: 'bottom-right',
            			text:  'You Have Already Booked For This Date!',
            			loaderBg: '#ff6849',
            			icon: 'error',
            			hideAfter: 4000,
            			stack: 6
            		});
                }
                else{
                    $.toast({
            			heading: 'Error!',
            			position: 'bottom-right',
            			text:  'Some Thing Went Wrong!',
            			loaderBg: '#ff6849',
            			icon: 'error',
            			hideAfter: 4000,
            			stack: 6
            		});
                }
               
               
            },
            beforeSend: function () {
                
            }
        });
   
    }
   else{
       
   
    $.toast({
			heading: 'Error!',
			position: 'bottom-right',
			text:  'Please Select A Date For Booking!',
			loaderBg: '#ff6849',
			icon: 'error',
			hideAfter: 4000,
			stack: 6
		});
   }
   
});
})()
</script>
@endsection
