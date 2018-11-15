@extends('layout.blog')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">회원정보</div>
<div class="panel-body">
<form class="form-horizontal" method="POST" action="{{ url('/member/admin/'.$member->id) }}">
{{ csrf_field() }}
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
<label for="name" class="col-sm-3 control-label">이름</label>
<div class="col-sm-9">
<input id="name" type="text" class="form-control" name="name" value="{{ $member->name }}" required autofocus>
@if ($errors->has('name'))
<div class="alert alert-danger">
{{ $errors->first('name') }}
</div>
@endif
</div>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-sm-3 control-label">이메일 주소</label>
<div class="col-sm-9">
<input id="email" type="email" class="form-control" name="email" value="{{ $member->email }}" required>
@if ($errors->has('email'))
<div class="alert alert-danger">
{{ $errors->first('email') }}
</div>
@endif
</div>
</div>
<div class="alert alert-warning">
아래는 비밀번호를 바꿀 경우에만 입력하세요.
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<label for="password" class="col-sm-3 control-label">비밀번호</label>
<div class="col-sm-9">
<input id="password" type="password" class="form-control" name="password">
@if ($errors->has('password'))
<div class="alert alert-danger">
{{ $errors->first('password') }}
</div>
@endif
</div>
</div>
<div class="form-group">
<div class="col-sm-9 col-sm-offset-3">
<button type="submit" class="btn btn-primary">
수정하기
</button>
@if($member->id != Auth::user()->id)
<a class="btn btn-link" href="{{ url('/member/admin/'.$member->id.'/remove') }}"
onclick="if(confirm('정말로 회원을 삭제하시겠습니까?'))
document.getElementById('remove-form').submit();event.preventDefault();">
삭제하기
</a>
@endif
</div>
</div>
</form>
<form id="remove-form" action="{{ url('/member/admin/'.$member->id.'/remove') }}" method="POST" style="display: none">
{{ csrf_field() }}
</form>
</div>
</div>
@endsection
