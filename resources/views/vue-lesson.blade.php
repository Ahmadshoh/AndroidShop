@extends('layouts.android')

@section('content')
    <div id="app">
        <example-component></example-component>
        <prop-component :urldata="{{ json_encode($url_data) }}"></prop-component>
        <ajax-component></ajax-component>
    </div>
@endsection
