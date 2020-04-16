@extends('layouts.app')
@section('title')
結果画面
@endsection

@section('content')
<div class="container">
  <div class="row" style="height:100px;">
    <div class="col-md-6">
      <h1>結果画面</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p>データ更新が完了しました。</p>
      <form action="{{ route('index') }}">
      <button type="submit" class="btn btn-primary" >一覧画面へ</button>
    </div>
  </div>
</div>

@endsection
