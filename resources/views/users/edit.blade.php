@extends('layouts.main-body-structer')

@section('page-title')
    المستخدمين
@endsection

@section('content')
    <x-card title="تعديل بيانات المستخدم">
        <x-slot name="body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" placeholder="الاسم"
                                value="{{ $user->name }}">
                            <label for="floatingInput">الاسم</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني"
                                value="{{ $user->email }}">
                            <label for="floatingInput">البريد الالكتروني</label>
                        </div>
                    </div>

                </div>
                <button type="submit" role="submit" class="btn btn-primary mt-2">حفظ</button>
            </form>
        </x-slot>
    </x-card>
@endsection
