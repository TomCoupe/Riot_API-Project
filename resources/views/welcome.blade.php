@extends('main')
@section('content')
&nbsp;
<div class="row">
    &nbsp;
    &nbsp;
    <div class="col">
        <div class="card homepage-card h-100">
            <div class="card-header">
                <h4 class="card-title home-card-title"> Champion Search <i class="fas fa-shield-alt"></i></h4>
            </div>
            <div class="card-body">
                <champion-search></champion-search>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card homepage-card h-100">
            <div class="card-header">
                <h4 class="card-title home-card-title"> Summoner Search <i class="fas fa-user-secret"></i></h4>
            </div>
            <div class="card-body">
                <summoner-search></summoner-search>
            </div>
        </div>
    </div>
    &nbsp;
    &nbsp;
</div>
&nbsp;
<div class="row">
    &nbsp;
    &nbsp;
    <div class="col w-100">
        <div class="card homepage-card">
            <div class="card-header">
                <h4 class="card-title home-card-title"> Summoner Leaderboards <i class="fas fa-trophy"></i></i></h4>
            </div>
            <div class="card-body">
                <leaderboards-table></leaderboards-table>
            </div>
        </div>
    </div>
    &nbsp;
    &nbsp;
</div>
@endsection