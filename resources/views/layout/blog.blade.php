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
        @yield('content')
      </section>
    </div>
  </div>
@endsection
