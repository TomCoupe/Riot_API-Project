@extends('main')
@section('content')
&nbsp;
<div class="card">
    <div class="card-body">
        <champion-page :name="{{$name}}"></champion-page>
    </div>
</div>
@endsection