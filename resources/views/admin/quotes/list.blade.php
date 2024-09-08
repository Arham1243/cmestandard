@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">


            <div class="user-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Quote Inquiries</h2>
                        </div>
                    </div>

                </div>



                <div class="table-responsive">
                    <table id="user-table" class="table table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Full Name</th>
                                <th>Company Name</th>
                                <th>Address</th>
                                {{-- <th>Other Address</th> --}}
                                {{-- <th>City</th> --}}
                                {{-- <th>State</th> --}}
                                {{-- <th>Zip Code</th> --}}
                                <th>Email</th>
                                <th>Home Phone No</th>
                                {{-- <th>Cell Phone No</th> --}}
                                <th>Message</th>
                                {{-- <th>Contact Method</th> --}}
                                {{-- <th>Event Date</th> --}}
                                {{-- <th>Event Location</th>
                                <th>About US</th>
                                <th>Event Planning</th> --}}
                                {{-- <th>No Of Persons</th> --}}
                                <th>Delivery Date</th>
                                <th>Delivery Time</th>
                                {{-- <th>Pickup Day</th>
                                <th>Pickup Time</th> --}}
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($quotes as $quote)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $quote->name }}</td>
                                    <td>{{ $quote->company_name }}</td>
                                    <td>{{ $quote->address }}</td>
                                    {{-- <td>{{ $quote->other_address }}</td> --}}
                                    {{-- <td>{{ $quote->city }}</td> --}}
                                    {{-- <td>{{ $quote->state }}</td> --}}
                                    {{-- <td>{{ $quote->zip }}</td> --}}
                                    <td>{{ $quote->email }}</td>
                                    <td>{{ $quote->h_phone }}</td>
                                    {{-- <td>{{ $quote->phone }}</td> --}}
                                    <td><div class="limit-text">{{ $quote->message }}</div></td>
                                    {{-- <td>{{ $quote->contact_method }}</td> --}}
                                    {{-- <td>{{ $quote->e_date }}</td> --}}
                                    {{-- <td>{{ $quote->e_location }}</td>
                                    <td>{{ $quote->about_us }}</td>
                                    <td>{{ $quote->e_planning }}</td> --}}
                                    {{-- <td>{{ $quote->persons }}</td> --}}
                                    <td>{{ $quote->d_date }}</td>
                                    <td>{{ $quote->d_time }}</td>
                                    {{-- <td>{{ $quote->pickup }}</td>
                                    <td>{{ $quote->p_time }}</td> --}}
                                    <td>{{ date('d-M-Y', strtotime($quote->created_at)) }}</td>
                                    <td>
                                        <div class="dropdown show action-dropdown">
                                            <a class=" dropdown-toggle" href="#" role="button" id="action-dropdown"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="action-dropdown">
                                                <a class="dropdown-item"
                                                    href="{{ route('admin.quotes_listing_view', $quote->id) }}"><i
                                                        class="fa fa-file-text" aria-hidden="true"></i> View Quote Inquiry</a>

                                                <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this Inquiry')"
                                                    href="{{ route('admin.quotes_listing_delete', $quote->id) }}"><i
                                                        class="fa fa-ban" aria-hidden="true"></i> Delete Quote Inquiry</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
         
    </script>
@endsection
