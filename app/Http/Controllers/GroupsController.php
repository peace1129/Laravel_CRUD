<?php

namespace App\Http\Controllers;

use App\Member;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests\GroupsRequest;

class GroupsController extends Controller
{

  /**
   * グループ一覧画面
   */
  public function index(){
    $groups = Group::selectRaw('groups.id, name, count(members.id) as group_count')
                    ->leftjoin('members','group_id','=','groups.id')
                    ->groupBy('groups.id', 'name')
                    ->orderBy('name')
                    ->get();

    return view('groups.index',['groups' => $groups]);
  }

  /**
   * グループ新規登録画面表示
   */
  public function createShow(Request $request){
    if($request->browserBack === "back"){
        // 戻るボタン押下時、前回入力値を保持しリダイレクト
        return redirect()->route('groups.create.show')
        ->withInput($request->all());

    } else {
      return view('groups.create');

    }
  }

  /**
   * グループ新規登録画面表示
   */
  public function createCheck(GroupsRequest $request){
    $name = $request->name;

    return view('groups.create_exec',[
      'name' => $name
    ]);
  }

  /**
   * グループ新規登録　実行
   */
  public function store(Request $request){
    $group = new Group;
    $group->name = $request->name;
    $group->save();

      return view('result.completed');
  }

  /**
   * 編集　入力画面
   */
  public function editShow(Request $request, $id){
    if($request->browserBack === "back"){
        // 戻るボタン押下時、前回入力値を保持しリダイレクト
        return redirect()->route('groups.edit.show',['id' => $request->id])
        ->withInput($request->all());

    } else {
      $groups = Group::find($id);

      return view('groups.edit',[
        'groups' => $groups
      ]);
    }
  }

  /**
   * 編集　確認画面
   */
  public function editCheck(GroupsRequest $request, $id){

    return view('groups.edit_exec',[
      'id' => $id,
      'name' =>$request->name
    ]);
  }

  /**
   * 編集　実行
   */
  public function edit(GroupsRequest $request, $id){
    $group = Group::find($id);
    $group->name = $request->name;
    $group->save();

    return view('result.completed');
  }

  /**
   * 削除　確認画面
   */
  public function deleteCheck($id){
    $name = Group::select('name')
                ->where('id', $id)
                ->get();

    return view('groups.delete',[
      'id' => $id,
      'name' => $name
    ]);
  }

  /**
   * 削除　実行
   */
  public function delete($id){
    Group::find($id)->delete();

    return view('result.completed');
  }

  /**
   * グループ一覧画面SPA
   */
  public function indexSpa(){
    $groups = Group::selectRaw('groups.id, name, count(members.id) as group_count')
                    ->leftjoin('members','group_id','=','groups.id')
                    ->groupBy('groups.id', 'name')
                    ->orderBy('name')
                    ->get();

    return view('groups.index_spa',[
      'groups' => $groups
      ]);
  }
}
