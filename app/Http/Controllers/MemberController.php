<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * 会員一覧を表示するメソッド
     */
    public function index()
    {
        //すべての会員情報をデータベースから取得
        $members = Member::all();
        // 取得した会員情報をビューに渡して表示
        return view('members.index', compact('members'));
    }

    /**
     * 新規会員登録フォームを表示するメソッド
     */
    public function create()
    {
        // 新規登録フォームのビューを表示
        return view('members.create');
    }

    /**
     * 新規会員情報を保存するメソッド
     */
    public function store(Request $request)
    {
        // 入力データのバリデーション
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:members,email',
        ]);
        // バリデーションが成功したら、会員情報をデータベースに保存
        Member::create($request->all());
        // 会員一覧ページにリダイレクトし、成功メッセージを表示
        return redirect()->route('members.index')->with('success' , '会員が登録されました');
    }

    /**
     * 
     */
    public function show(string $id)
    {
        //
    }

    /**
     * 会員編集フォームを表示するメソッド
     */
    public function edit(Member $member)
    {
        // 編集フォームをビューに会員情報を渡して表示
        return view('members.edit', compact('member'));
    }

    /**
     * 会員情報を更新するメソッド
     */
    public function update(Request $request, Member $member)
    {
        // 入力データのバリデーション
        $request->validate([ 
            'name' => 'required', 
            'phone' => 'required', 
            'email' => 'required|email|unique:members,email,' . $member->id,
        ]);
        // バリデーションが成功したら、会員情報を更新
        $member->update($request->all());
        // 会員一覧ページにレダイレクトし、成功メッセージを表示
        return redirect()->route('members.index')->with('success' , '会員情報が更新されました');
    }

    /**
     * 会員情報を削除するメソッド
     */
    public function destroy(Member $member)
    {
        //会員情報をデータベースから削除
        $member->delete();
        // 会員一覧ページにリダイレクトし、成功メッセージを表示
        return redirect()->route('members.index')->with('success', '会員が削除されました');
    }
}
