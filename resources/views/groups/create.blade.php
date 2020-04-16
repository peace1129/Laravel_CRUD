@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>グループ一覧 - 編集確認画面</h1>
    </div>
  </div>
  <div class="row"  style="margin-top: 20px;">
    @if ($errors->any())
      <div class="errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>
  <form class="form-horizontal" action="{{ route('groups.create.check')}}" method="get" id="frm1">
    <div class="form-group">
      <label class="col-md-2 control-label">グループ名</label>
       <div class="col-md-4">
        <input class="col-xs-12" type="text" name="name" value="{{ old('name') }}">
      </div>
    </div>
  <div class="row">
    <div class="col-md-12">
      <p></p>
      <a class="btn btn-secondary" href="{{ route('groups.index') }}">戻る</a>
      <button type="submit" class="btn btn-primary">登録確認</button>
    </form>
    </div>
</div>
@endsection
