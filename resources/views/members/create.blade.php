@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>名簿一覧 - 登録画面</h1>
    </div>
  </div>
  <div class="row" style="margin-top: 20px;">
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
  <form class="form-horizontal" action="{{ route('members.create.check')}}" method="get" id="frm1">
    <div class="form-group">
      <label class="col-md-1 control-label">氏名</label>
       <div class="form-inline col-md-5">
          <input type="text" name="firstName" class="form-control" placeholder="苗字" value="{{ old('firstName') }}">
          <input type="text" name="lastName" class="form-control" placeholder="名前" value="{{ old('lastName') }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-1 control-label">性別</label>
       <div class="form-inline">
        <div class="col-md-4">
          <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>男性
          <input style="margin-left:10px;" type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>女性
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-1 control-label">都道府県</label>
      <div class="col-md-4">
        <select class="form-control" name="pref" id="pref" class="col-xs-12">
          @foreach($prefs as $pref)
            <option value="{{$pref}}">{{$pref}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-1 control-label">住所</label>
      <div class="col-md-4">
        <input class="form-control" type="text" name="address" value="{{ old('address') }}"  placeholder="住所">
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-1 control-label">グループ</label>
      <div class="col-md-4">
        <select class="form-control" name="groupName" id="groupName" class="col-xs-12">
          @foreach($groups as $data)
            <option value="{{$data->name}}">{{$data->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
     <p></p>
    <a class="btn btn-secondary" href="{{ route('members.index') }}">戻る</a>
    <button type="submit" class="btn btn-primary">確認</button>
  </form>
</div>

@endsection

@section('script')
<script>
  $("#pref").val("{{ old('pref') }}");
  $("#groupName").val("{{ old('groupName') }}");
</script>
@endsection