@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"  >
                <div class="card-header">{{ __('لوحةالتحكم') }}</div>

                <div class="card-body"  >
                    <div class="row">
                        <div  class="col-lg-9" id="homee1" >

<form method="POST" action="{{ route('ChallengeOpen') }}">
    @csrf
    <select name="selected" id="">
        @foreach ($challenge as $challenges)
    <option value="{{$challenges->id}}">{{$challenges->id}}</option>

        @endforeach
    </select>
    <button type="submit" class="btn btn-primary btn-group-lg"> فتح السوال رقم   </button>
</form>
</div>
</div>

<br>
<div class="row">
    <div  class="col-lg-9" id="homee1" >
<form method="POST" action="{{ route('ChallengeClose') }}">
    @csrf
    <select name="selected" id="">
        @foreach ($challenge as $challenges)
    <option value="{{$challenges->id}}">{{$challenges->id}}</option>

        @endforeach
    </select>
    <button type="submit" class="btn btn-primary btn-group-lg"> إغلاق  السوال رقم   </button>
</form>
</div>
</div>

<br>
<div class="row">
    <div  class="col-lg-9" id="homee1" >
<form method="POST" action="{{ route('DailyRewardAway') }}">
    @csrf
    <button type="submit" class="btn btn-primary btn-group-lg"> السحب العام  </button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
