@extends('layout.blog')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">회원정보</div>

  <div class="panel-body">
    <form class="form-horizontal" method="POST" action="{{ url('member') }}">
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
      <label for="password-confirm" class="col-sm-3 control-label">비밀번호 확인</label>
      <div class="col-sm-9">
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
      </div>
      </div>
      <div class="form-group">
      <div class="col-sm-9 col-sm-offset-3">
      <button type="submit" class="btn btn-primary">수정하기</button>
      <a href="{{ url('/member/leave') }}" class="btn btn-link">탈퇴하기</a>
      </div>
      </div>
    </form>
  </div>
</div>
@endsection
