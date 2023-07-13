@extends('layouts.app')
@section('title') Главная @endsection
@section('content')



<div style="margin: -20px 0 20px 0">
@include('parts.sl1')
</div>
<div id="about_us">
@include('parts.inf-block')
</div>
@include('parts.sl3')
@include('parts.ourprod')
@include('parts.stocks')
<div style="z-index: 2 !important;">
    @include('parts.sl4')
</div>
<div style="margin-top: -80px;  z-index: 10 !important;" id="history">
    @include('parts.production')
</div>
<div id="managers">
@include('parts.leaders')
</div>
@include('parts.where')
@endsection
