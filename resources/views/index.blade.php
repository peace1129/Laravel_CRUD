@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-body h4">
          <b>名簿一覧メニュー</b>
        </div>
        <ul class="list-group">
          <li class="list-group-item"><a href="{{ route('members.index')}}">・名簿一覧</a></li>
          <li class="list-group-item"><a href="{{ route('members.create.show')}}">・新規登録</a></li>
        </ul>
      </div>  
    </div>
    <div class="col-md-6">    
      <div class="panel panel-default">
        <div class="panel-body h4">
          <b>グループ一覧メニュー</b>
        </div>
        <ul class="list-group">
          <li class="list-group-item"><a href="{{ route('groups.index')}}">・グループ一覧</a></li>
          <li class="list-group-item"><a href="{{ route('groups.create.show')}}">・新規登録</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">    
      <div class="panel panel-default">
        <div class="panel-body h4">
          <b>SPAページ</b>
        </div>
        <ul class="list-group">
          <li class="list-group-item"><a href="#">・名簿一覧</a></li>
          <li class="list-group-item"><a href="#">・グループ一覧</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
