@extends('main')
@section('content')
&nbsp;
<div class="row">
    &nbsp;
    &nbsp;
    <div class="col">
        <div class="card">
            <div class="card-body">
                <champion-page :name="{{$name}}"></champion-page>
            </div>
        </div>
    </div>
    &nbsp;
    &nbsp;

</div>
@endsection