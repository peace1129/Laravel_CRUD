@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>名簿一覧</h1>
    </div>
  </div>
  <div class="row" style="height:100px; margin-top: 20px;">
    <form action="{{ route('members.groups.search') }}" method="get" id="frm1">
      <div class="col-md-8">
        グループ名抽出
        <select name="selectGrp" onchange="submit()">
          <option selectef="#">グループ名を選択</option>
          <option value="all">全て</option>
          @foreach($groups as $list)
            <option value="{{$list->name}}">{{$list->name}}</option>
          @endforeach
        </select>
        </datalist>
      </div>
      <div class="col-md-4">
        <button type="submit" class="btn btn-primary float-right" formaction="/members/create">新規登録</button>
      </div>
      </form>
  </div>
  <div class="row">
    <div class="col">
      <table class="table table-responsive table-striped table-bordered table-primary table-hover response-table">
        <thead>
          <tr class="response-table_tr">
            <th class="col-md-2">氏名</th>
            <th class="col-md-2">性別</th>
            <th class="col-md-2">住所</th>
            <th class="col-md-2">グループ</th>
            <th class="col-md-1"></th>
          </tr>
        </thead>
        @foreach($members as $data)
        <tr class="response-table_tr">
          <td class="response-table_td" aria-label="氏名">{{$data->last_name}}{{$data->first_name}}</td>
          <td class="response-table_td" aria-label="性別">
            @if ($data->gender === "1")
              男性
            @else
              女性
            @endif
          </td>
          <td class="response-table_td" aria-label="住所">{{$data->pref}}{{$data->address}}</td>
          <td class="response-table_td" aria-label="グループ">
            {{$data->name}}
          </td>
          <td class="response-table_td" aria-label="操作">
            <div style="display:inline-flex">
              <form action="{{ route('members.edit.show', ['id' => $data->id]) }}">
                <button type="submit" class="btn btn-primary" >編集</button>
              </form>
              <form action="{{ route('members.delete.check', ['id' => $data->id]) }}" method="get">
                <button type="submit" class="btn btn-danger" >削除</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="row">
    <a class="btn btn-secondary" href="{{ route('index') }}">戻る</a>
  </div>
</div>


@endsection
