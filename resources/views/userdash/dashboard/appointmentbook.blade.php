@extends('layouts.dashboard.main')

@section('content')
<section class="dashboard-sec">
        <div class="wrapper-container">
            <div class="dashboard-appointment-sec">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="primary-heading color-dark text-center">
                            <h2>Book An Appointment</h2>
                        </div>
                    </div>
                </div>
                <div class="appointment-calendar-wrapper mc-b-3">
                    <form method="post" action="{{route('dashboard.book_appointment')}}" id="book_apt_form" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-lg-7 col-md-10 col-12 col-center">
                            <div id="datepicker" class="mc-b-3"></div>
                            <input type="hidden" name="appointment_date" id="appointment_date">
                            @foreach($check_pets as $ck)
                            <input type="hidden" name="pet_id[]" value="{{$ck}}">
                            @endforeach
                            <div class="time-avaiable mc-b-3">
                                <h4>Time Avaiable</h4>
                                <ul class="list-inline">
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-1" value="9:00 AM" checked>
                                        <label for="time-slot-1">9:00 AM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-2" value="9:30 AM">
                                        <label for="time-slot-2">9:30 AM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-3" value="10:00 AM">
                                        <label for="time-slot-3">10:00 AM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-4" value="10:30 AM">
                                        <label for="time-slot-4">10:30 AM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-5" value="11:00 AM">
                                        <label for="time-slot-5">11:00 AM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-6" value="11:30 AM">
                                        <label for="time-slot-6">11:30 AM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-7" value="12:00 PM">
                                        <label for="time-slot-7">12:00 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-8" value="12:30 PM">
                                        <label for="time-slot-8">12:30 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-9" value="1:00 PM">
                                        <label for="time-slot-9">1:00 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-10" value="1:30 PM">
                                        <label for="time-slot-10">1:30 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-11" value="2:00 PM">
                                        <label for="time-slot-11">2:00 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-12" value="2:30 PM">
                                        <label for="time-slot-12">2:30 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-13" value="3:00 PM">
                                        <label for="time-slot-13">3:00 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-14" value="3:30 PM">
                                        <label for="time-slot-14">3:30 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-15" value="4:00 PM">
                                        <label for="time-slot-15">4:00 PM</label>
                                    </li>
                                    <li class="list-inline-item checkbox">
                                        <input type="radio" name="time_slot" id="time-slot-16" value="4:30 PM">
                                        <label for="time-slot-16">4:30 PM</label>
                                    </li>
                                </ul>
                            </div>
                            <div class="appointment-select-wrapper mc-b-3">
                                <h4>Booking Type For Each Pet</h4>
                                <form class="main-form">
                                    <div class="row">
                                        @foreach($check_pets as $cp)
                                       
                                        <?php $pet_name = App\Models\Pets::where('id',$cp)->first();?>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>{{$pet_name->pet_name}}</label>
                                                <select name="booking_type-{{$pet_name->id}}" class="form-control" required>
                                                <option disabled>Select One</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Play Care">Play Care</option>
                                                    <option value="Grooming">Grooming</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="appointment-file-wrapper mc-b-3">
                                <label for="multifile-picker">
                                    <i class="fa fa-download"></i>
                                    <h3>Click To Download</h3>
                                </label>
                                <input type="file" name="files[]" id="multifile-picker" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                            </div>
                            <a  href="javascript:void(0)" class="primary-btn primary-bg book-btn">Book Your Appointment</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->

   

   
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

            else
            {
                   dateObject = $(this).datepicker('getDate'); 
            console.log(dateObject);
            var strDateTime =  dateObject.getDate() + "/" + (dateObject.getMonth()+1) + "/" + dateObject.getFullYear();
            $('#appointment_date').val(strDateTime);

            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
    
      $.ajax({
          

            type: "POST",

            url: "{{route('dashboard.dateCheck')}}",

            data: {date: strDateTime },
            dataType: "json",


            success: function (msg) {
                
                if(msg.status == 1)
                {
              
                    $.toast({
                    heading: 'Success!',
                    position: 'bottom-right',
                    text:  'To book appointment on this date, you have to pay! $'+ msg.param.price + ' Or select any other date!',
                    loaderBg: '#ff6849',
                    icon: 'success',
                    hideAfter: 5000,
                    stack: 6
                    });

                //     setInterval(() => {
                //     window.location.href ="{{route('dashboard.merchantComingSoon')}}" ;
                // }, 4000); 

                }
              
                                                
                },
                beforeSend: function () {
                    
                }
            });


           
            }
           
           
            
           
    }
});

$('.book-btn').click(function()
{
    var apt_date = $('#appointment_date').val();
    if(apt_date != '')
    {
        $('#book_apt_form').submit();

    }
    else{
        $.toast({
					heading: 'Error!',
					position: 'bottom-right',
					text:  'Please Select A Date!',
					loaderBg: '#ff6849',
					icon: 'error',
					hideAfter: 4000,
					stack: 6
				});
    }
});

//   var checkedpets = [];
//     $('#book-btn').click(function(){
//       checkedpets = [];
//         $( 'input[name="check-pets"]:checked' ).each(function( index, element ) {
//         checkedpets.push(this.value);
//       });
      
//             if(checkedpets.length > 0)
//             {
//                   $('#appointment-modal').modal('show');
//             }
//            else{
               
           
//             $.toast({
// 					heading: 'Error!',
// 					position: 'bottom-right',
// 					text:  'Please Select A Pet!',
// 					loaderBg: '#ff6849',
// 					icon: 'error',
// 					hideAfter: 4000,
// 					stack: 6
// 				});
//            }
           
// });


// $('#book-apt-btn').click(function(){
//     if(dateObject != null)
//     {
//    console.log(dateObject); 
//    var strDateTime =  dateObject.getDate() + "/" + (dateObject.getMonth()+1) + "/" + dateObject.getFullYear();
// //   console.log(strDateTime); 
// //   return 0;
//    $.ajaxSetup({
//             headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//           });
    
//       $.ajax({
          

//             type: "POST",

//             url: "{{route('dashboard.book_appointment')}}",

//             data: {pet_ids: checkedpets, appointment_date: strDateTime },
//             dataType: "json",


//             success: function (msg) {
                
//                 // console.log(msg);
//                 // console.log(msg.statusa);
               
//                 if(msg.statusa == 1)
//                 {
//                    $.toast({
//               heading: 'Success!',
//               position: 'bottom-right',
//               text:  'Appointment Submitted! Confirmation Will Be Recieved Soon!',
//               loaderBg: '#ff6849',
//               icon: 'success',
//               hideAfter: 4000,
//               stack: 6
//             });
//             setInterval(() => {
//                 window.location.href ="{{route('dashboard.myBookings')}}" ;
//               }, 4000); 
//                 }
//                 else if(msg.statusa == 2)
//                 {
//                     $.toast({
//             			heading: 'Error!',
//             			position: 'bottom-right',
//             			text:  'You Have Already Booked For This Date!',
//             			loaderBg: '#ff6849',
//             			icon: 'error',
//             			hideAfter: 4000,
//             			stack: 6
//             		});
//                 }
//                 else{
//                     $.toast({
//             			heading: 'Error!',
//             			position: 'bottom-right',
//             			text:  'Some Thing Went Wrong!',
//             			loaderBg: '#ff6849',
//             			icon: 'error',
//             			hideAfter: 4000,
//             			stack: 6
//             		});
//                 }
               
               
//             },
//             beforeSend: function () {
                
//             }
//         });
   
//     }
//    else{
       
   
//     $.toast({
// 			heading: 'Error!',
// 			position: 'bottom-right',
// 			text:  'Please Select A Date For Booking!',
// 			loaderBg: '#ff6849',
// 			icon: 'error',
// 			hideAfter: 4000,
// 			stack: 6
// 		});
//    }
   
// });
})()
</script>
@endsection
