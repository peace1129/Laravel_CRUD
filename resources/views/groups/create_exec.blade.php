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
      {{ $name }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <p></p>
      <form action="{{ route('groups.create.store')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="name" value="{{ $name }}">
        <button type="submit" class="btn btn-secondary" formaction="{{ route('groups.create.show') }}" formmethod="get" name="browserBack" value="back">戻る</button>
        <button type="submit" class="btn btn-primary">登録</button>
      </form>
    </div>
  </div>
</div>
@endsection
