@extends('layout.common')

@section('head')
  @parent

  <style>
    @media (min-width: 768px) {
      #navbar{ display: block }
    }
</style>
@endsection

@section('body')
  <div class="container">
    <div class="row">
      <aside id="sidebar" class="col-sm-3">
        <h3 class="navbar-default" style="background-color:transparent">
          {{config('app.name','Laravel')}}

          <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse"
            data-target="#navbar" style="margin:-5px 0">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </h3>
        <nav id="navbar" class="collapse" role="navigation">
          <div class="panel panel-default">
            <ul class="list-group">
              <li class="list-group-item"><a href="#">일상</a></li>
              <li class="list-group-item"><a href="#">게임</a></li>
              <li class="list-group-item"><a href="#">여행</a></li>
              <li class="list-group-item"><a href="#">공부</a></li>
            </ul>
          </div>
        </nav>
      </aside>
      <section id="content" class="col-sm-9" style="margin:20px 0">
        @section('user')
          <section class="panel panel-default">
            <div class="panel-body" style="padding-bottom: 0">
              @if(Auth::check())
                <p class="pull-left" style="margin: 7px 0 22px 0">
                  {{Auth::user()->name}}님 어서오세요.
                </p>
                <a href="{{ url('/member') }}" class="btn btn-info pull-right" style="margin-right:5px">내 정보</a>
                <a class="btn btn-warning pull-right" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  로그아웃
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                  {{ csrf_field() }}
                </form>
              @else
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label text-nowrap">이메일 주소</label>
                    <div class="col-sm-4">
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <label for="password" class="col-sm-2 control-label text-nowrap">비밀번호</label>
                    <div class="col-sm-4">
                      <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                    <div class="col-sm-12">
                      <div class="pull-right">
                        <div class="form-group">
                          <label style="margin: 0 15px 0 45px">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 자동로그인
                          </label>
                          <button type="submit" class="btn btn-primary">
                            로그인
                          </button>
                        </div>
                      </div>
                      <div class="pull-right">
                        <div class="form-group">
                          <a class="btn btn-link" href="{{ route('password.request') }}">비밀번호 재설정</a>
                          <a class="btn btn-default" href="{{ route('register') }}">회원 등록</a>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix"></div>

                    @if ($errors->has('email'))
                      <div class="alert alert-danger"> {{ $errors->first('email') }} </div>
                    @endif
                    @if ($errors->has('password'))
                      <div class="alert alert-danger"> {{ $errors->first('password') }} </div>
                    @endif
                  </form>
                  @endif
                </div>
              </section>
              @show
        @yield('content')
      </section>
    </div>
  </div>
@endsection
