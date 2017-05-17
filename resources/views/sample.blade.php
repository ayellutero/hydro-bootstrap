@extends('layouts.app')

@section('pageTitle', 'Sample')

@section('content')
<?php $users = App\User::all() ?>
<div>
{{Form::open(['url' => 'smp'])}}
<select class="form-control" name="smpl[]" id="part_replaced" required>
    @foreach($users as $user)
        <option value ="{{$user->firstname." ".$user->lastname}}">{{$user->firstname." ".$user->lastname}}</option>
    @endforeach
</select>

<div id="newConductedBy"></div>
<button type="submit" class="btn btn-success">
{{ Form::close() }}
</div>
<div id="addNewCB">
    <select class="form-control" name="smpl[]" id="part_replaced" required>
        @foreach($users as $user)
            <option value ="{{$user->firstname." ".$user->lastname}}">{{$user->firstname." ".$user->lastname}}</option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success" onclick="shw()">AAA</button>
<script>
function shw(){
    // alert('aaa')
$txt = $('#show').html();

    $('#newConductedBy').before($txt)
}
</script>


@endsection