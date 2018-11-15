@extends('layout.blog')
@section('content')
<div class="panel panel-default">
<div class="panel-heading">회원정보</div>
<div class="panel-body">
<form class="form-horizontal" method="POST" action="{{ url('/member/leave') }}">
{{ csrf_field() }}
<div class="alert alert-danger">
정말로 탈퇴하시겠습니까?
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
탈퇴하기
</button>
<a href="{{ url('/member') }}" class="btn btn-link">돌아가기</a>
</div>
</div>
</form>
</div>
</div>
@endsection
