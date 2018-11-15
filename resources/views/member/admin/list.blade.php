@extends('layout.blog')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">회원 목록</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>이름</th>
<th>이메일</th>
<th>등록 날짜</th>
<th></th>
</tr>
</thead>
<tbody>
@foreach($members as $member)
<tr{!! !$member->password ? 'style="opacity:0.5"' : '' !!}>
<td>{{$member->name}}</td>
<td>{{$member->email}}</td>
<td>{{$member->created_at}}</td>
<td>
@if($member->password)
<a href="{{ url('/member/admin/'.$member->id) }}" class="btn btn-default">보기</a>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
@endsection
