@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>グループ一覧</h1>
    </div>
  </div>
  <div class="row" style="height:100px; margin-top: 20px;">
    <div class="col-md-6">
      <form action="{{ route('groups.create.show')}}" method="get" class="text-right">
        <button type="submit" class="btn btn-primary" >新規登録</button>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <table class="table table-striped table-bordered table-primary table-hover response-table">
        <thead>
          <tr class="response-table_tr">
            <th class="col-md-2">グループ</th>
            <th class="col-md-2">所属数</th>
            <th class="col-md-1"></th>
          </tr>
        </thead>
        @foreach($groups as $data)
        <tr class="response-table_tr">
          <td class="response-table_td" aria-label="グループ">
            @if (isset($data->name))
              {{$data->name}}
            @else
              所属なし
            @endif
          </td>
          <td class="response-table_td" aria-label="所属数">
            {{$data->group_count}}
          </td>
          <td class="response-table_td" aria-label="操作">
            <div style="display:inline-flex">
              @if ($data->id <> "1")
                <form action="{{ route('groups.edit.show', ['id' => $data->id]) }}" method="get">
                  <button type="submit" class="btn btn-primary">編集</button>
                </form>
                <form action="{{ route('groups.delete.check', ['id' => $data->id]) }}" method="get">
                  <button type="submit" class="btn btn-danger">削除</button>
                </form>
              @endif
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
