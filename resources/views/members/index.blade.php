@extends('layouts.memberapp')

@section('title', '会員一覧')

@section('content')
<div class="container">
    <h1>会員一覧</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary mb-3">新規会員登録</a>
    @if (session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>名前</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->phone }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <a href="{{ route('members.edit', $member->id)}}" class="btn btn-sm btn-warning">編集</a>
                        <form action="{{ route('members.destroy', $member->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button tyoe="submit" class="btn btn-sm btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            
            @endforeach
        </tbody>
    </table>
</div>
@endsection