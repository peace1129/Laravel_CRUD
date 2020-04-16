@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>名簿一覧 - 編集画面</h1>
    </div>
  </div>
  <div class="row" style="margin-top: 20px;">
    <div class="col-md-12">
      <p>以上の情報で編集を行います。</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
      <label>氏名</label>
    </div>
    <div class="col-md-4">
      {{ $lastName }}{{ $firstName  }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
      <label>性別</label>
    </div>
    <div class="col-md-4">
      @if ($gender  === "1")
        男性
      @else
        女性
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
      <label>都道府県</label>
    </div>
    <div class="col-md-4">
      {{ $pref }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
      <label>住所</label>
    </div>
    <div class="col-md-4">
    {{ $address }}
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
      <label>グループ</label>
    </div>
    <div class="col-md-4">
      {{ $groupName }}
    </div>
  </div>
  <div class="row">
  <p></p>
  <form action="{{ route('members.edit',['id' => $id]) }}" method="post" id="frm1">
    {{ csrf_field() }}
    {{ method_field('put') }}
    <input type="hidden" name="lastName" value="{{ $lastName }}">
    <input type="hidden" name="firstName" value="{{ $firstName }}">
    <input type="hidden" name="gender" value="{{ $gender }}">
    <input type="hidden" name="address" value="{{ $address }}">
    <input type="hidden" name="pref" value="{{ $pref }}">
    <input type="hidden" name="groupName" value="{{ $groupName }}">
    <button type="submit" class="btn btn-secondary" formaction="{{ route('members.edit.show', ['id' => $id]) }}" formmethod="get" name="browserBack" value="back">戻る</button>
    <button type="submit" class="btn btn-primary">編集確定</button>
  </form>
  </div>
</div>

@endsection
