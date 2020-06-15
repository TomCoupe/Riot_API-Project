@extends('main')
@section('content')
&nbsp;
<div class="row">
    &nbsp;
    &nbsp;
    <div class="col">
        <div class="card">
            <div class="card-body">
                <summoner-page :playerdata={{json_encode($data)}}></summoner-page>
            </div>
        </div>
    </div>
    &nbsp;
    &nbsp;

</div>
@endsection