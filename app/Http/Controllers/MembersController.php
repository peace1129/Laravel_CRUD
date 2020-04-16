<?php

namespace App\Http\Controllers;

use App\Member;
use App\Group;
use Illuminate\Http\Request;
use App\Http\Requests\MembersRequest;
use Illuminate\Support\Collection;

class MembersController extends Controller
{
    
    /**
     * 名簿一覧画面
     */
    public function index(){
        $members = Member::from('members as member')
                    ->select('member.id',
                             'member.first_name',
                             'member.last_name', 
                             'member.pref', 
                             'member.address', 
                             'member.gender', 
                             'groups.name')
                    ->join('groups', 'group_id', '=', 'groups.id')
                    ->get();

        $groups = Group::get();

        return view('members.index',[
            'members'=>$members,
            'groups'=>$groups
        ]);
    }

    /**
     * グループ名検索
     */
    public function groupSearch(Request $request){
        $selectGrp = $request->selectGrp;
        $groups = Group::get();

        if ($selectGrp === 'all'){
            $members = Member::from('members as member')
                    ->select('member.id',
                             'member.first_name',
                             'member.last_name', 
                             'member.pref', 
                             'member.address', 
                             'member.gender', 
                             'groups.name')
                    ->join('groups', 'group_id', '=', 'groups.id')
                    ->get();

        } else {
            $selectGroupId = Group::
                            select('id')
                            ->where('name', '=', $selectGrp)
                            ->first();


            $members = Member::from('members as member')
                            ->select('member.id',
                                     'member.first_name',
                                     'member.last_name', 
                                     'member.pref', 
                                     'member.address', 
                                     'member.gender', 
                                     'groups.name')
                            ->join('groups', 'group_id', '=', 'groups.id')
                            ->where('group_id', '=', $selectGroupId->id)
                            ->get();

        }

        return view('members.index',[
            'members'=>$members,
            'groups'=>$groups
        ]); 
    }

    /**
     * 新規作成　入力画面
     */
    public function createShow(Request $request){
        if($request->browserBack === "back"){
            // 戻るボタン押下時、前回入力値を保持しリダイレクト
            return redirect()->route('members.create.show')
            ->withInput($request->all());

        } else {
            $groups = Group::get();
            $prefs = config('prefs');

            return view('members.create',[
                'groups'=>$groups,
                'prefs'=>$prefs
            ]);
        }
    }

    /**
     * 新規登録　確認画面
     */
    public function createCheck(MembersRequest $request){
        $lastName = $request->lastName;
        $firstName = $request->firstName;
        $gender = $request->gender;
        $address = $request->address;
        $pref = $request->pref;
        $groupName = $request->groupName;
        $groupName = $groupName == ''  ? "所属なし" : $request->groupName;

        return view('members.create_exec',[
            'lastName'=>$lastName,
            'firstName'=>$firstName,
            'gender'=>$gender,
            'address'=>$address,
            'pref'=>$pref,
            'groupName'=>$groupName
        ]);
    }

    /**
     * 新規登録　実行
     */
    public function store(MembersRequest $request){

        $selectGroupId = Group::
                            select('id')
                            ->where('name', '=', $request->groupName)
                            ->first();

        $member = new Member;
        $member->last_name = $request->lastName;
        $member->first_name = $request->firstName;
        $member->gender = $request->gender;
        $member->pref = $request->pref;
        $member->address = $request->address;
        $member->group_id = $selectGroupId->id;
        $member->save();

        return view('result.completed');
    }

    /**
     * 編集　入力画面
     */
    public function editShow(Request $request, $id){
        if($request->browserBack === "back"){
            // 戻るボタン押下時、前回入力値を保持しリダイレクト
            return redirect()->route('members.edit.show',['id' => $request->id])
            ->withInput($request->all());

        } else {
            $members = Member::select('members.id',
                                'members.first_name',
                                'members.last_name', 
                                'members.pref', 
                                'members.address', 
                                'members.gender', 
                                'groups.name')
                        ->join('groups', 'group_id', '=', 'groups.id')
                        ->where('members.id', $id)
                        ->first();

            $groups = Group::get();
            $prefs = config('prefs');

            return view('members.edit',[
                'members' => $members,
                'groups' => $groups,
                'prefs'=>$prefs,
                'id' => $id
            ]);
        }
    }

    /**
     * 編集　確認画面
     */
    public function editCheck(MembersRequest $request, $id){
        $lastName = $request->lastName;
        $firstName = $request->firstName;
        $gender = $request->gender;
        $address = $request->address;
        $pref = $request->pref;
        $groupName = $request->groupName;

        return view('members.edit_exec',[
            'lastName'=>$lastName,
            'firstName'=>$firstName,
            'gender'=>$gender,
            'address'=>$address,
            'pref'=>$pref,
            'groupName'=>$groupName,
            'id' => $id
        ]);
    }

    /**
     * 編集　実行
     */
    public function edit(MembersRequest $request, $id){

        $selectGroupId = Group::
                            select('id')
                            ->where('name', '=', $request->groupName)
                            ->first();

        $member = Member::find($id);
        $member->last_name = $request->lastName;
        $member->first_name = $request->firstName;
        $member->gender = $request->gender;
        $member->pref = $request->pref;
        $member->address = $request->address;
        $member->group_id = $selectGroupId->id;
        $member->save();
        
        return view('result.completed');
    }

    /**
     * 削除　確認画面
     */
    public function deleteCheck($id){
        $member = Member::select('members.id',
                        'members.first_name',
                        'members.last_name', 
                        'members.pref', 
                        'members.address', 
                        'members.gender', 
                        'groups.name')
                ->join('groups', 'group_id', '=', 'groups.id')
                ->where('members.id', $id)
                ->first();

        return view('members.delete_exec',[
            'member' => $member,
            'id' => $id
        ]);
    }

    /**
     * 削除　実行
     */
    public function delete($id){
        Member::find($id)->delete();

        return view('result.completed');    
    }

    /**
     * 名簿一覧画面SPA
     */
    public function indexSpa(){
        $members = Member::get();
        $groups = Group::get();

        return view('members.index_spa',[
            'members'=>$members,
            'groups'=>$groups
        ]);
    }
    
}
