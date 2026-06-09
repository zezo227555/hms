@extends('layouts.main-body-structer')

@section('page-title')
    الفروع
@endsection

@section('content')
    <x-card title="إضافة فرع جديد">
        <x-slot name="body">
            <form action="{{ route('branches.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="اسم الفرع" value="{{ old('name') }}" required>
                            <label for="floatingInput">اسم الفرع</label>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                placeholder="كود الفرع" value="{{ old('code') }}" required>
                            <label for="floatingInput">كود الفرع</label>
                            @error('code')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="رقم الهاتف" value="{{ old('phone') }}">
                            <label for="floatingInput">رقم الهاتف</label>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="البريد الإلكتروني" value="{{ old('email') }}">
                            <label for="floatingInput">البريد الإلكتروني</label>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                                placeholder="المدينة" value="{{ old('city') }}">
                            <label for="floatingInput">المدينة</label>
                            @error('city')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="">اختر الحالة</option>
                                <option value="active" {{ old('status') === 'active' ? 'selected' : '' }}>نشط</option>
                                <option value="inactive" {{ old('status') === 'inactive' ? 'selected' : '' }}>غير نشط</option>
                            </select>
                            <label for="floatingInput">الحالة</label>
                            @error('status')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea name="address" class="form-control @error('address') is-invalid @enderror"
                                placeholder="العنوان" rows="3">{{ old('address') }}</textarea>
                            <label for="floatingInput">العنوان</label>
                            @error('address')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="الوصف" rows="3">{{ old('description') }}</textarea>
                            <label for="floatingInput">الوصف</label>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">حفظ البيانات</button>
            </form>
        </x-slot>
    </x-card>
@endsection
