@extends('layouts.app')

@section('content')



<form method="POST" action="{{ route('ChallengeOpen') }}">
    @csrf
    <select name="selected" id="">
        @foreach ($challenge as $challenges)
    <option value="{{$challenges->id}}">{{$challenges->id}}</option>

        @endforeach
    </select>
    <button type="submit" class="btn btn-primary btn-group-lg"> فتح السوال رقم   </button>
</form>
<br>
<form method="POST" action="{{ route('ChallengeClose') }}">
    @csrf
    <select name="selected" id="">
        @foreach ($challenge as $challenges)
    <option value="{{$challenges->id}}">{{$challenges->id}}</option>

        @endforeach
    </select>
    <button type="submit" class="btn btn-primary btn-group-lg"> إغلاق  السوال رقم   </button>
</form>
<br>
<form method="POST" action="{{ route('DailyRewardAway') }}">
    @csrf
    <button type="submit" class="btn btn-primary btn-group-lg"> السحب العام  </button>
</form>
@endsection
