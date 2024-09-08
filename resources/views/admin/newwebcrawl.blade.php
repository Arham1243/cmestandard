@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center mc-b-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="primary-heading color-dark">
                        <h2>New Web Crawl</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="crawlform" class="main-form mc-b-3">
                    <!-- <div class="row align-items-end">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Web Crawl Saved Name*:</label>
                                        <input type="text" class="form-control" placeholder="Enter Title">
                                    </div>
                                </div> -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form-group">
                            <label>Filter by these words*:</label>
                            <textarea rows="5" class="form-control" id="keywords" name="keywords" required
                                placeholder="Enter Keywords (Separate by comma)"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12 col-12">
                        <div class="form-group">
                            <label>Search Engine*:</label>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <div class="checkbox">
                                        <input type="radio" id="filter1" class="domain_name" name="domain_name"
                                            value="1" checked>
                                        <label for="filter1">Google</label>
                                    </div>
                                </li>
                                <!-- <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="radio" id="filter2" name="Filter-1">
                                                    <label for="filter2">Phrase</label>
                                                </div>
                                            </li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Filter by any of these words*:</label>
                                        <textarea rows="5" class="form-control" placeholder="Enter two Keywords (Separated by comma)"></textarea>
                                    </div>
                                </div> -->
                    <!-- <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Exclude these words:</label>
                                        <textarea rows="5" class="form-control" placeholder="Enter words (Separate by comma)"></textarea>
                                    </div>
                                </div> -->
                    <!-- <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Search by these domains:</label>
                                        <textarea rows="5" class="form-control" placeholder="Enter domains (Separate by comma)"></textarea>
                                    </div>
                                </div> -->
                    <!--<div class="col-lg-6 col-md-6 col-12">-->
                    <!--    <div class="form-group">-->
                    <!--        <label>Exclude these domains:</label>-->
                    <!--        <textarea rows="5" name="e_domain" class="form-control" placeholder="Enter domains (Separate by comma)"></textarea>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>Crawl Duration Unit:</label>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="radio" id="filter3" name="Filter-2">
                                                    <label for="filter3">Seconds</label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="radio" id="filter4" name="Filter-2">
                                                    <label for="filter4">Days</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Crawl Duration:</label>
                                        <input type="text" class="form-control" placeholder="Enter Crawl Duration">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Links Limit: (0 to 500,000,000)</label>
                                        <input type="text" class="form-control" placeholder="Enter Links Limit">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>External Web Search Engine(s):</label>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="search1">
                                                    <label for="search1">Google</label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="search2">
                                                    <label for="search2">Bing</label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="search3">
                                                    <label for="search3">Yahoo</label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="search4">
                                                    <label for="search4">Search Engine abc</label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="search5">
                                                    <label for="search5">Search Engine abc</label>
                                                </div>
                                            </li>
                                            <li class="list-inline-item">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="search6">
                                                    <label for="search6">Search Engine abc</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="text-right">
                    <!-- <a href="#" class="primary-btn primary-bg" data-toggle="modal" data-target="#alert-modal-1">Run</a> -->
                    <button type="button" class="primary-btn primary-bg run">Run</button>
                </div>
            </div>
            </form>

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
        (() => {

            /*in page css here*/

            $('.run').click(function() {
                var keywords = $('#keywords').val();
                var domain_name = $('.domain_name').val();

                if (keywords != '') {



                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.searchCrawl') }}",
                        dataType: 'json',
                        data: {
                            keywords: keywords,
                            domain_name: domain_name
                        },
                        beforeSend: function() {
                            Loader.show();
                        },
                        success: function(data) {

                            if (data.status == 1) {
                                $("#crawl-success-alert-modal-1").modal("show");
                                $(".crawl-success-msg").text("Crawl Ran Successfuly!");
                                $('#crawlform')[0].reset();
                                $.toast({
                                    heading: 'Success!',
                                    position: 'top-right',
                                    text: data.msg,
                                    loaderBg: '#ff6849',
                                    icon: 'success',
                                    hideAfter: 2500,
                                    stack: 6
                                });
                            }


                            if (data.status == 0) {
                                $.toast({
                                    heading: 'Error!',
                                    position: 'top-right',
                                    text: data.msg,
                                    loaderBg: '#ff6849',
                                    icon: 'error',
                                    hideAfter: 2500,
                                    stack: 6
                                });
                                $('#newsletter-form')[0].reset();
                            }

                        },
                        complete: function() {
                            Loader.hide();
                        },
                    });

                } else {
                    $.toast({
                        heading: 'Error!',
                        position: 'top-right',
                        text: 'Please Enter Keywords!',
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2500,
                        stack: 6
                    });
                }

            });


        })()
    </script>
@endsection
