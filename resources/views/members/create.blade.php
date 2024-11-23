@extends('layouts.memberapp')

@section('title', '新規会員登録')

@section('content')

<div class="container">
    <h1>新規会員登録</h1>
    <form action="{{ route('members.store')}}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">名前</label>
        <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
        <label for="phone" class="form-label">電話番号</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="mb-3">
        <label for="email" class="form-label">メールアドレス</label>
        <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button class="btn btn-primary">登録</button>
    </form>
</div>

@endsection