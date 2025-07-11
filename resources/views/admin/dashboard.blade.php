@extends('layout.app')

@section('content')
<div class="container">
    <h2>لوحة تحكم المشرف</h2>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">إجمالي الحجوزات</h5>
                    <p class="card-text fs-4">{{ $totalBookings }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">عدد المستخدمين</h5>
               

                    <p class="card-text fs-4">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">عدد الرحلات</h5>
                    <p class="card-text fs-4">{{ $totalTrips }}</p>
                </div>
            </div>
        </div>
    </div>

    <hr class="my-4">

    <div class="d-flex gap-3">
        <a href="{{ route('bookings.index') }}" class="btn btn-outline-primary">عرض الحجوزات</a>
        <a href="{{ route('users.index') }}" class="btn btn-outline-success">إدارة المستخدمين</a>
        <a href="{{ route('trips.index') }}" class="btn btn-outline-info">إدارة الرحلات</a>
    </div>
</div>
@endsection
