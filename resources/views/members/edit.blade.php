@extends('layouts.memberapp')

@section('title', '会員編集')

@section('content')
<div class="container">
    <h1>会員編集</h1>
    <form action="{{ route('members.update', $member->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
        <label for="name" class="form-label">名前</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $member->name }}" required>
        </div>

        <div class="mb-3">
        <label for="phone" class="form-label">電話番号</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $member->phone }}" required>
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $member->email }}" required>
        <button type="submit" class="btn btn-warning">更新</button>
        </div>
    </form>
    <form action="{{ route('members.destroy', $member->id)}}" method="POST" style="margin-top:10px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">削除</button>

    </form>
</div>

@endsection