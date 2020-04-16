@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>グループ一覧 - 編集確認画面</h1>
    </div>
  </div>
  <div class="row" style="margin-top: 20px;">
    <div class="col-md-2">
      グループ名
    </div>
    <div class="col-md-4">
      {{ $name[0]->name }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form action="{{ route('groups.delete',['id' => $id]) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <input type="hidden" name="name" value="{{ $name }}">
        <a class="btn btn-secondary" href="{{ route('groups.index') }}">戻る</a>
        <button type="submit" class="btn btn-danger">削除</button>
      </form>
    </div>
  </div>
</div>
@endsection
