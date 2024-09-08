@extends('layouts.main')
@section('content')
    <div class="my-5 py-3">
        <div class="container">
            <?php App\Helpers\Helper::inlineEditable('div', ['class' => 'section-content'], 'Privacy Policy', 'content30'); ?>
        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        /*in page css here*/
        .section-content p{
            padding: 0
        }
    </style>
@endsection
@section('js')
    <script type="text/javascript">
        (() => {
            /*in page js here*/
        })()
    </script>
@endsection
