@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>名簿一覧 - 削除確認画面</h1>
    </div>
  </div>
  <div class="row" style="margin-top: 20px;">
    <div class="col-md-12">
      <p>以上名簿の削除を行います。</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-1">
      <label>氏名</label>
    </div>
    <div class="col-md-4">
        {{ $member->last_name }}{{ $member->first_name }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-1">
      <label>性別</label>
    </div>
    <div class="col-md-4">
      @if ( $member->gender  === "1")
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
      {{ $member->pref }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-1">
      <label>住所</label>
    </div>
    <div class="col-md-4">
      {{ $member->address }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-1">
      <label>グループ</label>
    </div>
    <div class="col-md-4">
      {{ $member->name }}
    </div>
  </div>

  <div class="row">
    <p></p>
    <form action="{{ route('members.delete', ['id' => $id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <a class="btn btn-secondary" href="{{ route('members.index') }}">戻る</a>
      <button type="submit" class="btn btn-danger">削除</button>
    </form>
  </div>
</div>

@endsection
