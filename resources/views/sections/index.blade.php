@extends('layouts.main-body-structer')

@section('page-title')
    الأقسام
@endsection

@section('content')
    <x-card title="قائمة الأقسام">
        <x-slot name="action">
            <a href="{{ route('sections.create') }}" class="btn btn-primary btn-sm">
                <i class="ri-add-line"></i> إضافة قسم جديد
            </a>
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive">
                <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الكود</th>
                            <th>الفرع</th>
                            <th>الحالة</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sections as $section)
                            <tr>
                                <td>{{ $section->name }}</td>
                                <td>{{ $section->code }}</td>
                                <td>
                                    <span class="badge bg-info-transparent">{{ $section->branch->name }}</span>
                                </td>
                                <td>
                                    @if ($section->isActive())
                                        <span class="badge bg-success-transparent">نشط</span>
                                    @else
                                        <span class="badge bg-danger-transparent">غير نشط</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('sections.show', $section->id) }}"
                                        class="btn btn-sm btn-info-transparent btn-b">
                                        <i class="ri-eye-line"></i> عرض
                                    </a>
                                    <a href="{{ route('sections.edit', $section->id) }}"
                                        class="btn btn-sm btn-warning-transparent">
                                        <i class="ri-edit-line"></i> تعديل
                                    </a>

                                    @if ($section->isActive())
                                        <form action="{{ route('sections.deactivate', $section->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-secondary-transparent"
                                                title="إيقاف القسم">
                                                <i class="ri-pause-line"></i> إيقاف القسم
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('sections.activate', $section->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success-transparent"
                                                title="تفعيل القسم">
                                                <i class="ri-play-line"></i> تفعيل القسم
                                            </button>
                                        </form>
                                    @endif

                                    <x-form-delete :route="'sections.destroy'" :id="$section->id" title="حذف القسم" label="حذف" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    لا توجد أقسام حالياً
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($sections->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $sections->links() }}
                </div>
            @endif
        </x-slot>
    </x-card>
@endsection
