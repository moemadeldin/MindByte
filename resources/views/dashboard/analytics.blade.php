@extends('dashboard.layout')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Users Count -->
        <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Users</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $users }}</h3>
            </div>
            <div class="text-blue-600 text-3xl">
                <i class="fas fa-users"></i>
            </div>
        </div>

        <!-- Teachers Count -->
        <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Teachers</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $teachers }}</h3>
            </div>
            <div class="text-green-600 text-3xl">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
        </div>

        <!-- Courses Count -->
        <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Courses</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $courses }}</h3>
            </div>
            <div class="text-purple-600 text-3xl">
                <i class="fas fa-book-open"></i>
            </div>
        </div>

        <!-- Teacher Requests Count -->
        <div class="bg-white shadow rounded-lg p-6 flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Pending Teacher Requests</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $teacherRequests }}</h3>
            </div>
            <div class="text-red-600 text-3xl">
                <i class="fas fa-user-clock"></i>
            </div>
        </div>
    </div>
@endsection