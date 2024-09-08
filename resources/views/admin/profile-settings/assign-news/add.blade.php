@extends('admin.dash_layouts.main')
@section('content')
    @include('admin.dash_layouts.sidebar')
    <div class="main-sec">
        <div class="main-wrapper">
            <div class="row align-items-center pb-5">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="primary-heading color-dark d-flex align-items-center  justify-content-between ">
                        <h2>Assign News</h2>
                    </div>
                </div>

            </div>
            <div class="user-wrapper">
                <form id="add-record-form" method="POST" class="main-form mc-b-3"
                    action="{{ route('admin.profile.create_assign_news') }}">
                    @csrf
                    <div class="row  mt-5">


                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Select Profile*:</label>
                                <select name="profile_id" class="form-control w-100" id="profile-selection">
                                    <option value="" selected disabled>Select Profile</option>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ $profile->id }}">
                                            {{ $profile->username }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('profile_id'))
                                    <span class="error">{{ $errors->first('profile_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="form-group">
                                <label>Select News*:</label>
                                <div class="wrapper checkBoxesWrapper toggle-next">
                                    {{ $news->count() }} News Avalaible
                                </div>
                                <div class="checkboxes" id="Lorems">
                                    <div class="inner-wrap" id="news-list">
                                        @foreach ($news as $newSingle)
                                            @php
                                                $assignedNews = json_decode(session()->get('assigned_news', '[]')); // Get assigned News from sessionStorage and decode the JSON string
                                                $isAssigned = in_array($newSingle->id, $assignedNews); // Check if the course ID is present in assigned News
                                            @endphp
                                            <label for="{{ $newSingle->id }}">
                                                <input type="checkbox" name="news[]" id="{{ $newSingle->id }}"
                                                    value="{{ $newSingle->id }}"
                                                    @if ($isAssigned) checked @endif>
                                                <span>{{ $newSingle->title }}</span>
                                            </label>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @if ($errors->has('news'))
                                <span class="error">{{ $errors->first('news') }}</span>
                            @endif
                        </div>

                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="text-center">
                                <button id="add-record" type="button" class="primary-btn primary-bg">Assign</button>
                            </div>
                        </div>
                </form>

            </div>

        </div>
    </div>
    </div>
    </div>

@endsection
@section('css')
    <style type="text/css">
        .form-group .checkBoxesWrapper {
            padding: 15px 20px;
            font-size: 13px;
            color: #666;
            border: 1px solid #666666;
            border-radius: 100px;
            background: #fff;
            cursor: pointer;
        }

        .checkBoxesWrapper .toggle-next {
            border-radius: 0;
        }

        .checkBoxesWrapper label {
            cursor: pointer;
        }

        .checkBoxesWrapper .ellipsis {
            text-overflow: ellipsis;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
        }

        .checkBoxesWrapper .apply-selection {
            display: none;
            width: 100%;
            margin: 0;
            padding: 5px 10px;
            border-bottom: 1px solid #ccc;
        }

        .checkBoxesWrapper .apply-selection .ajax-link {
            display: none;
        }

        .checkboxes {
            margin: 0;
            display: none;
            border-top: 0;
            position: absolute;
            left: 1.5rem;
            top: 75%;
            width: 95%;
            background: #fff;
            box-shadow: 0 0 15px 1px #00000020;
            border-radius: 0.25rem;
            padding: 0.5rem;
            z-index: 6;
        }

        .checkboxes .inner-wrap {
            padding: 5px 10px;
            max-height: 140px;
            overflow: auto;
        }

        .thumbnail-img {
            max-width: 288px;
            height: 113px;

        }

        .picture {
            max-width: 288px;
            height: 113px;

        }

        .checkboxes .inner-wrap {
            display: flex;
            justify-content: flex-start;
            flex-direction: column;
        }

        .courses-wrapper label {
            margin-bottom: 0;
        }

        .checkboxes .inner-wrap label {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            padding: 0.3rem 0;
            gap: 0.65rem;
            margin: 0;
            font-size: 0.85rem;
            cursor: pointer;
            font-weight: 400;
        }
    </style>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $('#add-record').click(function(e) {
            if ($("#thumbnail-img").val() == "") {
                $.toast({
                    heading: 'Error!',
                    position: 'bottom-right',
                    text: 'Please Select A Banner Image!',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 2000,
                    stack: 6
                });
            } else {
                $('#add-record-form').submit();
            }

        });
        $(function() {

            setCheckboxSelectLabels();

            $('.toggle-next').click(function() {
                $(this).next('.checkboxes').slideToggle(400);
            });

            $('.ckkBox').change(function() {
                toggleCheckedAll(this);
                setCheckboxSelectLabels();
            });

        });

        function setCheckboxSelectLabels(elem) {
            var wrappers = $('.wrapper');
            $.each(wrappers, function(key, wrapper) {
                var checkboxes = $(wrapper).find('.ckkBox');
                var label = $(wrapper).find('.checkboxes').attr('id');
                var prevText = '';
                $.each(checkboxes, function(i, checkbox) {
                    var button = $(wrapper).find('button');
                    if ($(checkbox).prop('checked') == true) {
                        var text = $(checkbox).next().html();
                        var btnText = prevText + text;
                        var numberOfChecked = $(wrapper).find('input.val:checkbox:checked').length;
                        if (numberOfChecked >= 4) {
                            btnText = numberOfChecked + ' ' + label + ' selected';
                        }
                        $(button).text(btnText);
                        $(".ellipsis").text(btnText);
                        prevText = btnText + ', ';
                    }
                });
            });
        }

        function toggleCheckedAll(checkbox) {
            var apply = $(checkbox).closest('.wrapper').find('.apply-selection');
            apply.fadeIn('slow');

            var val = $(checkbox).closest('.checkboxes').find('.val');
            var all = $(checkbox).closest('.checkboxes').find('.all');
            var ckkBox = $(checkbox).closest('.checkboxes').find('.ckkBox');

            if (!$(ckkBox).is(':checked')) {
                $(all).prop('checked', true);
                return;
            }

            if ($(checkbox).hasClass('all')) {
                $(val).prop('checked', false);
            } else {
                $(all).prop('checked', false);
            }
        }

        $("#profile-selection .select-options li").click(function() {
            $(".select-options li").removeClass("is-selected");
            $(this).addClass("is-selected");
            var profile_id = $(this).attr("rel");
            console.log(profile_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "{{ route('admin.get_assign_news') }}",
                dataType: 'json',
                data: {
                    profile_id: profile_id,
                },
                success: function(data) {
                    var news_id_list = [];
                    for (let i = 0; i < data.length; i++) {
                        const news_id = data[i]["news_id"];
                        news_id_list.push(news_id);
                    }
                    sessionStorage.setItem("assigned_news", JSON.stringify(
                        news_id_list)); // Convert to JSON string before storing in sessionStorage
                    // Call the function to update the News on the page
                    updateNews(news_id_list);
                },
            });
        });

        // Function to update the News on the page based on the assigned News
        function updateNews(assignedNews) {
            var news = {!! $news !!}; // Assuming you pass the News from the Laravel controller

            // Clear previous course list
            $("#news-list").empty();

            // Iterate over the News and display them
            for (var i = 0; i < news.length; i++) {
                var newSingle = news[i];
                var isAssigned = assignedNews.includes(newSingle.id);

                var label = $('<label>').attr('for', newSingle.id);
                var input = $('<input>').attr({
                    type: 'checkbox',
                    name: 'news[]',
                    id: newSingle.id,
                    value: newSingle.id
                });

                if (isAssigned) {
                    input.prop('checked', true);
                    label.append(input, $('<span>').text(newSingle.title + ' (Assigned)'));
                } else {
                    label.append(input, $('<span>').text(newSingle.title));
                }

                $("#news-list").append(label);
            }

        }
    </script>
@endsection
