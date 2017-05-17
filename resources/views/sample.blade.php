@extends('layouts.app')

@section('pageTitle', 'Sample')

@section('content')
<?php $users = App\User::all() ?>

<div>
{{Form::open(['url' => 'smp'])}}
<select class="selectpicker" name="smpl[]" multiple>
   @foreach($users as $user)
        <option value ="{{$user->firstname." ".$user->lastname}}">{{$user->firstname." ".$user->lastname}}</option>
    @endforeach
</select>

<button type="submit"></button>
</div>

@endsection