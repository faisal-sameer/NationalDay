@extends('layouts.app')

@section('content')



<form method="POST" action="{{ route('DailyRewardHome') }}">
    @csrf
    <button type="submit" class="btn btn-primary btn-group-lg"> السحب من منسوبي الجامعة  </button>
</form>
<br>
<form method="POST" action="{{ route('DailyRewardAway') }}">
    @csrf
    <button type="submit" class="btn btn-primary btn-group-lg"> السحب العام  </button>
</form>
@endsection
