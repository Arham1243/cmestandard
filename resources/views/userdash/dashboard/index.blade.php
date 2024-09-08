@extends('userdash.layouts.dashboard.main')
@section('content')
    <section class="dashboard-sec">
        <?php
        // $notification = App\Models\Notifications::where('user_id', Auth::id())->latest()->get();
        ?>
        {{-- <li class="dashboard-header__dropdown notify">
            <a href="#">
                <i class="bx bxs-bell"></i>
            </a>
            <ul class="dashboard-header__dropdownMenu">
                @forelse($notification as $n)
                    <li>
                        <a href="#" class="notification">
                            <div>
                                <div class="notification__title">{{ $n->title }}</div>
                                <div class="notification__subtitle">{{ date('h:i:sa', strtotime($n->created_at)) }}</div>
                            </div>
                        </a>
                    </li>
                @empty
                    <li>
                        <a href="javascript:void" class="notification">
                            <div>
                                <div class="notification__title">No notification</div>
                            </div>
                        </a>
                    </li>
                @endforelse
            </ul>
        </li> --}}
        <div class="wrapper-container">
            <div class="dashboard-visit-sec">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="visit-thumbnail visit-thumbnail-first mc-b-3">
                            <div class="visit-content">
                                <h3>Welcome To Dashboard</h3>
                                <p>Dear {{ $user->full_name }} !</p>
                            </div>
                            <figure class="mb-0">
                                <span><i class="fa fa-user"></i></span>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- DASHBOARD END -->
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .ui-state-active {
            background: #212529 !important;
            color: #f8f9fa !important;
        }
        .dashboard-header__dropdown {
            width: fit-content;
            position: relative;
            cursor: pointer;
            padding: 0.5rem 0;
            margin-left: auto;
        }

        .dashboard-header__dropdown>a {
            width: 48px;
            height: 48px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.5rem;
            line-height: 1;
            background: #ca7c8a;
            border-radius: 50%;
            padding: 0.5rem;
        }

        .dashboard-header__dropdown>a .badge {
            width: 20px;
            height: 20px;
            position: absolute;
            top: -4%;
            right: -4%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ca7c8a;
            font-size: 10px;
            font-weight: 600;
            background: #fff;
            border-radius: 50%;
        }

        .dashboard-header__dropdown.notify>a::before {
            content: "";
            position: absolute;
            top: 2%;
            right: 2%;
            width: 12px;
            height: 12px;
            background: #ca7c8a;
            border: 2px solid #fff;
            border-radius: 50%;
        }

        .dashboard-header__dropdown:hover>a {
            color: #ca7c8a;
            background: #ca7c8a20;
        }

        .dashboard-header__dropdownMenu {
            width: 280px;
            max-height: 350px;
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            border-radius: 0.25rem;
            box-shadow: 0px 0px 10px 1px #00000020;
            overflow-x: hidden;
            overflow-y: auto;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 300ms ease-in-out;
            z-index: 10;
        }

        .dashboard-header__dropdownMenu::-webkit-scrollbar {
            width: 4px;
            background: #ca7c8a20;
            border-radius: 1rem;
        }

        .dashboard-header__dropdownMenu::-webkit-scrollbar-thumb {
            background: #ca7c8a;
            border-radius: 1rem;
        }

        .dashboard-header__dropdownMenu .notification {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            color: var(--color-text-dark);
            padding: 0.75rem 0.5rem;
        }

        .dashboard-header__dropdownMenu .notification:hover {
            color: #ca7c8a;
            background: #ca7c8a20;
        }

        .dashboard-header__dropdownMenu .notification__icon {
            width: 45px;
            min-width: 45px;
            height: 45px;
            display: block;
            object-fit: cover;
            border-radius: 50%;
            overflow: hidden;
        }

        .dashboard-header__dropdownMenu .notification__title {
            font-size: 14px;
            font-weight: 500;
            line-height: 1.2;
            margin-bottom: 0.25rem;
        }

        .dashboard-header__dropdownMenu .notification__subtitle {
            font-size: 12px;
        }

        .dashboard-header__dropdown:hover>.dashboard-header__dropdownMenu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0px);
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                // console.log('sad');
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#logo_img_my')
                        .attr('src', e.target.result);
                    console.log(e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        (() => {

            //     var dateObject = null;
            //     $("#datepicker").datepicker({
            //     onSelect: function(dateText, inst) { 

            //         var today = new Date();
            //             today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
            //            // console.log('today' + today);
            //             //Get the selected date (also at midnight)
            //             var selDate = Date.parse(dateText);
            //            // console.log('today' + selDate);
            //             if(selDate < today) {
            //                 //If the selected date was before today, continue to show the datepicker
            //                  $.toast({
            // 						heading: 'Error!',
            // 						position: 'bottom-right',
            // 						text:  'Cannot Select A Date Before Today',
            // 						loaderBg: '#ff6849',
            // 						icon: 'error',
            // 						hideAfter: 4000,
            // 						stack: 6
            // 					});
            // 					dateObject = null;
            //                 $('#datepicker').val('');
            //                 $(inst).datepicker('show');
            //                 //dateObject = null;
            //             }
            //             else{
            //                    dateObject = $(this).datepicker('getDate'); 
            //             console.log(dateObject);
            //             }


            //     }
            // });



            // $('#book-apt-btn').click(function(){
            //     if(dateObject != null)
            //     {
            //    console.log(dateObject); 
            //     }
            //    else{


            //     $.toast({
            // 						heading: 'Error!',
            // 						position: 'bottom-right',
            // 						text:  'Please Select A Date For Booking!',
            // 						loaderBg: '#ff6849',
            // 						icon: 'error',
            // 						hideAfter: 4000,
            // 						stack: 6
            // 					});
            //    }

            // });

            // $('#datepicker').datepicker({ minDate: 0 });

            //  $('#Date').datepicker({
            //     onSelect: function(dateText, inst) {
            //         //Get today's date at midnight
            //         var today = new Date();
            //         today = Date.parse(today.getMonth()+1+'/'+today.getDate()+'/'+today.getFullYear());
            //         //Get the selected date (also at midnight)
            //         var selDate = Date.parse(dateText);

            //         if(selDate < today) {
            //             //If the selected date was before today, continue to show the datepicker
            //             $('#Date').val('');
            //             $(inst).datepicker('show');
            //         }
            //     }
            // });
            /*in page css here*/
        })()
    </script>
@endsection
