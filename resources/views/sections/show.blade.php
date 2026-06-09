@extends('layouts.main-body-structer')

@section('page-title')
    الأقسام
@endsection

@section('content')
    <x-card title="تفاصيل القسم">
        <x-slot name="action">
            <div class="btn-group" role="group">
                <a href="{{ route('sections.edit', $section->id) }}" class="btn btn-warning btn-sm">
                    <i class="ri-edit-line"></i> تعديل
                </a>
                <a href="{{ route('sections.index') }}" class="btn btn-secondary btn-sm">
                    <i class="ri-arrow-right-line"></i> عودة
                </a>
            </div>
        </x-slot>
        <x-slot name="body">
            <div class="row mb-3">
                <div class="col-md-6 mb-3">
                    <h6 class="text-muted">اسم القسم</h6>
                    <p class="h5">{{ $section->name }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <h6 class="text-muted">كود القسم</h6>
                    <p class="h5">{{ $section->code }}</p>
                </div>

                <div class="col-md-6 mb-3">
                    <h6 class="text-muted">الفرع</h6>
                    <p class="h5">
                        <span class="badge bg-info-transparent">{{ $section->branch->name }}</span>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <h6 class="text-muted">الحالة</h6>
                    <p class="h5">
                        @if($section->isActive())
                            <span class="badge bg-success-transparent">نشط</span>
                        @else
                            <span class="badge bg-danger-transparent">غير نشط</span>
                        @endif
                    </p>
                </div>

                @if($section->description)
                    <div class="col-12 mb-3">
                        <h6 class="text-muted">الوصف</h6>
                        <p>{{ $section->description }}</p>
                    </div>
                @endif

                <div class="col-12 mb-3">
                    <h6 class="text-muted">تاريخ الإنشاء</h6>
                    <p>{{ $section->created_at->format('Y-m-d H:i:s') }}</p>
                </div>

                <div class="col-12 mb-3">
                    <h6 class="text-muted">آخر تحديث</h6>
                    <p>{{ $section->updated_at->format('Y-m-d H:i:s') }}</p>
                </div>
            </div>

            <div class="border-top pt-3">
                <div class="btn-group" role="group">
                    @if($section->isActive())
                        <form action="{{ route('sections.deactivate', $section->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-secondary">
                                <i class="ri-pause-line"></i> إيقاف القسم
                            </button>
                        </form>
                    @else
                        <form action="{{ route('sections.activate', $section->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="ri-play-line"></i> تفعيل القسم
                            </button>
                        </form>
                    @endif

                    <form action="{{ route('sections.destroy', $section->id) }}" method="POST" class="d-inline-block delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="ri-delete-bin-line"></i> حذف
                        </button>
                    </form>
                </div>
            </div>
        </x-slot>
    </x-card>
@endsection
