@extends('layouts.main-body-structer')

@section('page-title')
    الأقسام
@endsection

@section('content')
    <x-card title="تعديل بيانات القسم">
        <x-slot name="body">
            <form action="{{ route('sections.update', $section->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="branch_id" class="form-control @error('branch_id') is-invalid @enderror" required>
                                <option value="">اختر الفرع</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->id }}" {{ $section->branch_id == $branch->id ? 'selected' : '' }}>
                                        {{ $branch->name }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="floatingInput">الفرع</label>
                            @error('branch_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="اسم القسم" value="{{ $section->name }}" required>
                            <label for="floatingInput">اسم القسم</label>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                placeholder="كود القسم" value="{{ $section->code }}" required>
                            <label for="floatingInput">كود القسم</label>
                            @error('code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="">اختر الحالة</option>
                                <option value="active" {{ $section->status === 'active' ? 'selected' : '' }}>نشط</option>
                                <option value="inactive" {{ $section->status === 'inactive' ? 'selected' : '' }}>غير نشط</option>
                            </select>
                            <label for="floatingInput">الحالة</label>
                            @error('status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="الوصف" rows="3">{{ $section->description }}</textarea>
                            <label for="floatingInput">الوصف</label>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">حفظ</button>
            </form>
        </x-slot>
    </x-card>
@endsection
