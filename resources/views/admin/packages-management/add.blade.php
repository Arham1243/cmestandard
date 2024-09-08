@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="primary-heading color-dark mb-4">
                <h2>Add Package</h2>
            </div>

        </div>
        <div class="user-wrapper">
            <form class="main-form mc-b-3" action="{{ route('admin.save_packages') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="form-group">
                            <label>Title*:</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="form-control" placeholder="Enter Title">
                            @if ($errors->has('title'))
                                <span class="error">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="form-group">
                            <label>Sub Title*:</label>
                            <input type="text" name="sub_title" id="sub_title" value="{{ old('sub_title') }}"
                                class="form-control" placeholder="Enter Sub Title">
                            @if ($errors->has('sub_title'))
                                <span class="error">{{ $errors->first('sub_title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="form-group">
                            <label>Price*:</label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" min="1"
                                class="form-control" placeholder="Enter Price">
                            @if ($errors->has('price'))
                                <span class="error">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="form-group">
                            <label>Type*:</label>
                            <select name="type">
                                <option disabled selected>Select Type</option>
                                <option value="year" {{ old('type') == 'year' ? 'selected' : '' }}>Year</option>
                                <option value="month" {{ old('type') == 'month' ? 'selected' : '' }}>Month</option>
                            </select>
                            @if ($errors->has('type'))
                                <span class="error">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="form-group">
                            <label>Short Description*:</label>
                            <textarea rows="5" class="form-control" name="short_desc" placeholder="Enter Short Description">{{ old('short_desc') }}</textarea>
                            @if ($errors->has('short_desc'))
                                <span class="error">{{ $errors->first('short_desc') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="perk-wrapper form-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-12">
                                    <label>Perks:</label>
                                    <div class="perk-fields-wrapper">
                                        <div class="perk-fields">

                                            <input type="text" name="perks[]" value="{{ old('perks[]') }}"
                                                class="form-control perk-input" placeholder="Enter Perk">
                                            <a href="javasrcript:void(0)" class="delete-perk"><i
                                                    class='bx bx-x-circle'></i></a>
                                        </div>
                                    </div>
                                    @if ($errors->has('perks'))
                                        <span class="error">{{ $errors->first('perks') }}</span>
                                    @endif
                                    <a href="javascript:void(0)" class="primary-btn primary-bg text-right"
                                        id="add-perk">Add Perk</a>
                                </div>
                            </div>
                        </div>
                    </div>  

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="form-group">
                                <label>For Limited Period?:</label>
                                <div class="fields-wrapper">
                                    <div class="input-field--check">
                                        <input type="radio" name="is_limited" value="1" id="yes_limited">
                                        <label for="yes_limited" class="toggle">Yes</label>
                                    </div>
                                    <div class="input-field--check">
                                        <input type="radio" name="is_limited" value="0" id="no_limited">
                                        <label for="no_limited" class="toggle">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">
                                <button class="primary-btn primary-bg">Add New</button>
                            </div>
                        </div>
            </form>

        </div>
    </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.2.3/css/fileinput.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/css/file-upload.css') }}" />
    <style type="text/css">
        /*in page css here*/
        .thumbnail-img {
            max-width: 288px;
            height: 113px;

        }

        .picture {
            max-width: 288px;
            height: 113px;

        }

        .fields-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 1rem;
        }

        .perk-wrapper {
            border: 1px solid #666666;
            padding: 2rem;
        }

        .perk-wrapper .primary-btn {
            margin: 2rem 0 0 auto;
            display: block;
        }

        .perk-fields-wrapper>.perk-fields:not(:last-child) {
            margin-bottom: 1rem;
        }

        .perk-fields {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .delete-perk {
            font-size: 1.5rem;
            color: red !important;
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
    // Function to add a new perk field
    $('#add-perk').on('click', function(){
        var newPerkField = $('.perk-fields').first().clone(); // Duplicate the first .perk-fields
        newPerkField.find('input').val(''); // Clear the value
        newPerkField.appendTo('.perk-fields-wrapper'); // Append the new field
        $('.delete-perk').show(); // Show delete button for all fields
        updateDeleteButtonVisibility(); // Update delete button visibility
    });

    // Function to delete a perk field
    $(document).on('click', '.delete-perk', function(){
        $(this).parent().remove(); // Remove the clicked .perk-fields
        updateDeleteButtonVisibility(); // Update delete button visibility
    });

    // Function to update delete button visibility
    function updateDeleteButtonVisibility(){
        var perkFields = $('.perk-fields');
        if(perkFields.length === 1){
            $('.delete-perk').hide(); // Hide delete button if only one field left
        } else {
            $('.delete-perk').show(); // Show delete button otherwise
        }
    }
});

    </script>
@endsection
