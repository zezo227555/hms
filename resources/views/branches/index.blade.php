@extends('layouts.main-body-structer')

@section('page-title')
    الفروع
@endsection

@section('content')
    <x-card title="قائمة الفروع">
        <x-slot name="action">
            <a href="{{ route('branches.create') }}" class="btn btn-primary btn-sm">
                <i class="ri-add-line"></i> إضافة فرع جديد
            </a>
        </x-slot>
        <x-slot name="body">
            <div class="table-responsive">
                <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>الكود</th>
                            <th>رقم الهاتف</th>
                            <th>الايميل</th>
                            <th>المدينة</th>
                            <th>الحالة</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($branches as $branch)
                            <tr>
                                <td>{{ $branch->name }}</td>
                                <td>{{ $branch->code }}</td>
                                <td>{{ $branch->phone ?? '-' }}</td>
                                <td>{{ $branch->email ?? '-' }}</td>
                                <td>{{ $branch->city ?? '-' }}</td>
                                <td>
                                    @if ($branch->isActive())
                                        <span class="badge bg-success-transparent">نشط</span>
                                    @else
                                        <span class="badge bg-danger-transparent">غير نشط</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('branches.show', $branch->id) }}"
                                        class="btn btn-sm btn-info-transparent btn-b">
                                        <i class="ri-eye-line"></i> عرض
                                    </a>
                                    <a href="{{ route('branches.edit', $branch->id) }}"
                                        class="btn btn-sm btn-warning-transparent">
                                        <i class="ri-edit-line"></i> تعديل
                                    </a>

                                    @if ($branch->isActive())
                                        <form action="{{ route('branches.deactivate', $branch->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-secondary-transparent"
                                                title="إيقاف الفرع">
                                                <i class="ri-pause-line"></i> إيقاف الفرع
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('branches.activate', $branch->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success-transparent"
                                                title="تفعيل الفرع">
                                                <i class="ri-play-line"></i> تفعيل الفرع
                                            </button>
                                        </form>
                                    @endif

                                    <x-form-delete :route="'branches.destroy'" :id="$branch->id" :title="'حذف الفرع'"
                                        :label="'حذف'" />
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    لا توجد فروع حالياً
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if ($branches->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $branches->links() }}
                </div>
            @endif
        </x-slot>
    </x-card>
@endsection
