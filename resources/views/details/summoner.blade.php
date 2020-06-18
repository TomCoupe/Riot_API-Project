@extends('main')
@section('content')
&nbsp;
<div class="row">
    &nbsp;
    &nbsp;
    <div class="col">
        <summoner-page 
        :playerdata="{{json_encode($data)}}" :playerinfo="{{json_encode($playerInfo)}}" 
        :playerregion="{{json_encode($playerRegion)}}" :matchhistory="{{json_encode($matchHistory)}}" 
        :champions="{{json_encode($champions)}}">
    </summoner-page>
    </div>
    &nbsp;
    &nbsp;

</div>
@endsection