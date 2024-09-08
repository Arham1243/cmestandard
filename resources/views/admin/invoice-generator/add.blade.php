@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>Fill this Information</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form action="{{ route('admin.save_invoice') }}" enctype="multipart/form-data"
                    method="POST" class="main-form mc-b-3">

                    @csrf
                    <div class="row justify-content-center">

                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Invoice Number:</label>
                                <input type="number" name="invoice_id"  class="form-control"
                                    value="{{ old('invoice_id') }}">
                                @if ($errors->has('invoice_id'))
                                    <span class="error">{{ $errors->first('invoice_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Select Date:</label>
                                <input type="date" name="date"  class="form-control"
                                    value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    <span class="error">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="primary-subtitle">Bill To</div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" name="full_name"  class="form-control"
                                    value="{{ old('full_name') }}">
                                @if ($errors->has('full_name'))
                                    <span class="error">{{ $errors->first('full_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email"  class="form-control"
                                    value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Phone:</label>
                                <input type="text" name="phone"  class="form-control"
                                    value="{{ old('phone') }}">
                                @if ($errors->has('phone'))
                                    <span class="error">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-6">
                            <div class="form-group">
                                <label>Address:</label>
                                <input type="text" name="address"  class="form-control"
                                    value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="error">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="primary-subtitle">Inventory Information</div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Vin #:</label>
                                <input type="text" name="vin"  class="form-control"
                                    value="{{ old('vin') }}">
                                @if ($errors->has('vin'))
                                    <span class="error">{{ $errors->first('vin') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Year:</label>
                                <input type="text" class="form-control" id="yearInput" name="year" autocomplete="off" value="{{ old('year') }}">
                                <div id="calendarContainer"></div>
                                @if ($errors->has('year'))
                                    <span class="error">{{ $errors->first('year') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Make/Model:</label>
                                <input type="text" name="model"  class="form-control"
                                    value="{{ old('model') }}">
                                @if ($errors->has('model'))
                                    <span class="error">{{ $errors->first('model') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Mileage:</label>
                                <input type="number" name="mileage"  class="form-control"
                                    value="{{ old('mileage') }}">
                                @if ($errors->has('mileage'))
                                    <span class="error">{{ $errors->first('mileage') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Color:</label>
                                <input type="text" name="color"  class="form-control"
                                    value="{{ old('color') }}">
                                @if ($errors->has('color'))
                                    <span class="error">{{ $errors->first('color') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="form-group">
                                <label>Unit #:</label>
                                <input type="number" name="unit"  class="form-control"
                                    value="{{ old('unit') }}">
                                @if ($errors->has('unit'))
                                    <span class="error">{{ $errors->first('unit') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="primary-subtitle">Product Details</div>
                        </div>
                        <div class="col-md-12">
                            <div class="tabular-data">
                                <ul class="tabular-data-wrapper tabular-data__header">
                                    <li class="heading">Product</li>
                                    <li class="heading">Quantity/Hours</li>
                                    <li class="heading">Price/Rate</li>
                                    <li class="heading">Tax</li>
                                    <li class="heading">Amount</li>
                                </ul>

                                <div class="tabular-data__body tabular-data__body--data">
                                    <ul class="tabular-data-wrapper data-row">
                                        <a href="javasrcript:void(0)" class="delete-row"><i class='bx bx-x-circle'></i></a>
                                        <li>
                                            <div class="form-group">
                                                <select name="product_name[]" class="product-name">
                                                    <option value="" selected disabled>Select Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->title }}" product-price="{{ $product->price }}">{{ $product->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                         @if ($errors->has('product_name[]'))
                                                <span class="error">{{ $errors->first('product_name[]') }}</span>
                                              @endif
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <input type="number" name="quantity[]" class="product-quantity"
                                                    class="form-control" value="{{ old('quantity[]') }}"
                                                    min="0">
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-group">
                                                <input type="text" name="price[]" class="product-price"
                                                    value="{{ old('price[]') }}">
                                            </div>
                                             @if ($errors->has('price[]'))
                                                <span class="error">{{ $errors->first('price[]') }}</span>
                                              @endif
                                        </li>
                                        <li>
                                            <div class="d-flex tax-wrapper">
                                            <div class="input-field--check">
                                                <input type="checkbox" id="tax"
                                                    class="form-control tax-check" value="1">
                                                <label for="tax" class="toggle"></label>
                                            </div>
                                            <div class="form-group tax-input">
                                                <input type="number" name="tax[]" 
                                                    class="form-control" value="{{ old('tax[]') }}"
                                                    min="0">
                                            </div>
                                            </div>
                                             @if ($errors->has('tax[]'))
                                                <span class="error">{{ $errors->first('tax[]') }}</span>
                                              @endif
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                <input type="text" name="total_amount[]" class="total-amount"
                                                    class="form-control" value="{{ old('total_amount[]') }}">
                                            </div>
                                              @if ($errors->has('total_amount[]'))
                                                <span class="error">{{ $errors->first('total_amount[]') }}</span>
                                              @endif
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <a href="javascript:void(0)" class="primary-btn primary-bg ml-auto d-block"
                                id="add-product">Add More</a>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Amount Paid:</label>
                                <input type="number" name="amount_paid"  class="form-control"
                                    value="{{ old('amount_paid') }}">
                                @if ($errors->has('amount_paid'))
                                    <span class="error">{{ $errors->first('amount_paid') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Amount Due:</label>
                                <input type="number" name="amount_due"  class="form-control"
                                    value="{{ old('amount_due') }}">
                                @if ($errors->has('amount_due'))
                                    <span class="error">{{ $errors->first('amount_due') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tabular-data">
                                <ul class="tabular-data-wrapper tabular-data__header">
                                    <li class="heading">0 - 30 days</li>
                                    <li class="heading">31 - 60 days</li>
                                    <li class="heading">61 - 90 days</li>
                                    <li class="heading">> 90 days</li>
                                </ul>

                                <div class="tabular-data__body">
                                    <ul class="tabular-data-wrapper">
                                        <li>
                                            <div class="form-group">
                                              <input type="number" name="1_month" 
                                                    class="form-control" value="{{ old('1_month') }}"
                                                    min="0">
                                              @if ($errors->has('1_month'))
                                                <span class="error">{{ $errors->first('1_month') }}</span>
                                              @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                              <input type="number" name="2_month" 
                                                    class="form-control" value="{{ old('2_month') }}"
                                                    min="0">
                                              @if ($errors->has('2_month'))
                                                <span class="error">{{ $errors->first('2_month') }}</span>
                                              @endif
                                            </div>
                                        </li>

                                        <li>
                                            <div class="form-group">
                                                 <input type="number" name="3_month" 
                                                    class="form-control" value="{{ old('3_month') }}"
                                                    min="0">
                                              @if ($errors->has('3_month'))
                                                <span class="error">{{ $errors->first('3_month') }}</span>
                                              @endif
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-group">
                                                 <input type="number" name="4_month" 
                                                    class="form-control" value="{{ old('4_month') }}"
                                                    min="0">
                                              @if ($errors->has('4_month'))
                                                <span class="error">{{ $errors->first('4_month') }}</span>
                                              @endif
                                            </div>
                                        </li>
                                      
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12 mt-4">
                            <div class="text-center">
                                <button class="primary-btn primary-bg" id="">generate</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style type="text/css">
        /*in page css here*/
        .main-form .form-group {
            position: relative;
        }

        .datepicker-inline {
            position: absolute;
            left: 0;
            top: 100%;
            z-index: 100;
            background: #fff;
            width: 100%;
            margin: auto;
            box-shadow: 0 0 15px 5px #00000020;
            padding: 1rem;
        }

        .table-condensed {
            width: 100%;
        }

        .thumbnail-img {
            max-width: 288px;
            height: 113px;

        }

        .picture {
            max-width: 288px;
            height: 113px;

        }

        .recommend {
            color: #D75DB2;
        }
.tax-input {
  opacity: 0;
  visibility: hidden;
}
.tax-input.show {
  opacity: 1;
  visibility: visible;
}

.delete-row {
    position: absolute;
    top: 50%;
    left: 100%;
  transform: translate(19%, -50%);
    font-size: 1.75rem;
    color: red !important;
}
    </style>
@endsection
@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        (() => {

            $(document).ready(function() {
                var calendarVisible = false;

                $("#calendarContainer").datepicker({
                    minViewMode: "years", // Change to years for year input
                    format: "yyyy", // Use 'yyyy' format for year
                    autoclose: true,
                });

                $("#calendarContainer").hide();

                $("#yearInput").click(function() { // Change to 'yearInput'
                    if (calendarVisible) {
                        $("#calendarContainer").hide();
                        calendarVisible = false;
                    } else {
                        $("#calendarContainer").show();
                        calendarVisible = true;
                    }
                });

                $(document).click(function(event) {
                    if (!$(event.target).closest("#calendarContainer, #yearInput").length) {
                        $("#calendarContainer").hide();
                        calendarVisible = false;
                    }
                });

                $("#calendarContainer")
                    .datepicker()
                    .on("changeDate", function(event) {
                        var selectedYear = event.date.getFullYear();
                        $("#yearInput").val(selectedYear); // Change to 'yearInput'
                        $("#calendarContainer").hide();
                        calendarVisible = false;
                    });
            });
            
            
$(document).ready(function() {
    $("#add-product").click(function() {
        var newRow = $(".data-row:first").clone();
        var uniqueId = Date.now(); // Generate a unique ID for the new row
        newRow.find("input[type=checkbox]").attr("id", "tax-" + uniqueId);
        newRow.find("label[for^=tax]").attr("for", "tax-" + uniqueId);
        newRow.find("input, select").val('');
        newRow.appendTo(".tabular-data__body--data");
        updateDeleteButtonVisibility();
    });

    // Handle product selection change for existing and cloned rows
    $('.tabular-data__body--data').on('change', '.product-name', function() {
        var $row = $(this).closest('.data-row');
        var productPrice = parseFloat($(this).find(":selected").attr("product-price")) || 0;
        $row.find('.product-price').val(productPrice.toFixed(2));
        updateTotalAmount($row);
    });

    // Handle quantity and tax change
    $('.tabular-data__body--data').on('input', '.product-quantity, .tax-check, .form-group.tax-input input', function() {
        var $row = $(this).closest('.data-row');
        updateTotalAmount($row);
    });

    // Handle tax checkbox change
    $('.tabular-data__body--data').on('change', '.tax-check', function() {
        var $row = $(this).closest('.data-row');
        var isChecked = $(this).prop('checked');
        $row.find('.form-group.tax-input').prop('disabled', !isChecked).toggleClass('show', isChecked);
        updateTotalAmount($row);
    });

    // Handle click event for the delete button
    $('.tabular-data__body--data').on('click', '.delete-row', function() {
        var $row = $(this).closest('.data-row');
        if ($('.data-row').length > 1) {
            $row.remove();
        }
        updateDeleteButtonVisibility();
    });

    function updateTotalAmount($row) {
        var productPrice = parseFloat($row.find('.product-price').val()) || 0;
        var quantity = parseFloat($row.find('.product-quantity').val()) || 0;
        var tax = $row.find('.tax-check').prop('checked') ? (parseFloat($row.find('.form-group.tax-input input').val()) || 0) : 0;

        var totalAmount = (productPrice * quantity) + tax;
        $row.find('.total-amount').val(totalAmount.toFixed(2));
    }

    function updateDeleteButtonVisibility() {
        
    var $deleteButtons = $('.delete-row');
    if ($deleteButtons.length > 1) {
        ($deleteButtons).show(); // Show delete button if more than one row
    } else {
        $deleteButtons.hide(); // Hide delete button if only one row
    }
}

});



        })()
    </script>
@endsection
