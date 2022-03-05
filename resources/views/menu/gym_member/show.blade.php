@extends('menu.user.show')
@section('gym_member_data')
<tr>
    <td>Gender</td>
    <td>{{$user->gym_member->gender}}</td>
</tr>
<tr>
    <td>Date Of Birth</td>
    <td>{{$user->gym_member->date_of_birth}}</td>
</tr>
<tr>
    <td>Last Login</td>
    <td>{{$user->gym_member->last_login}}</td>
</tr>
@endsection