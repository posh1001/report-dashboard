@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">

    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white rounded-xl shadow-lg p-6 mb-6">
        <h1 class="text-3xl md:text-4xl font-bold">{{ $report->group_name }}</h1>
        <p class="text-lg md:text-xl mt-1">{{ $report->name }}</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white rounded-xl shadow p-4 hover:shadow-xl transition duration-300">
            <h2 class="text-gray-500 font-semibold text-sm uppercase">Designation</h2>
            <p class="text-xl font-bold text-indigo-600">{{ $report->designation ?? 'N/A' }}</p>
        </div>

        <div class="bg-white rounded-xl shadow p-4 hover:shadow-xl transition duration-300">
            <h2 class="text-gray-500 font-semibold text-sm uppercase">Awareness</h2>
            <span class="px-3 py-1 rounded-full text-sm font-semibold {{ $report->awareness === 'Yes' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ $report->awareness }}
            </span>
        </div>

        <div class="bg-white rounded-xl shadow p-4 hover:shadow-xl transition duration-300">
            <h2 class="text-gray-500 font-semibold text-sm uppercase">Phone</h2>
            <p class="text-lg font-medium text-gray-700">{{ $report->phone ?? 'N/A' }}</p>
        </div>
    </div>

    <!-- Detailed Info Table -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-indigo-50 transition">
                    <th class="px-6 py-4 text-left text-gray-500 font-medium">New Leaders</th>
                    <td class="px-6 py-4 text-gray-800">{{ $report->new_cell_leaders ?? 'N/A' }}</td>
                </tr>
                <tr class="hover:bg-purple-50 transition">
                    <th class="px-6 py-4 text-left text-gray-500 font-medium">Outreach Locations</th>
                    <td class="px-6 py-4 text-gray-800">{{ $report->outreach_locations ?? 'N/A' }}</td>
                </tr>
                <tr class="hover:bg-pink-50 transition">
                    <th class="px-6 py-4 text-left text-gray-500 font-medium">Leaders for Outreach</th>
                    <td class="px-6 py-4 text-gray-800">{{ $report->leaders_for_outreach ?? 'N/A' }}</td>
                </tr>
                <tr class="hover:bg-indigo-50 transition">
                    <th class="px-6 py-4 text-left text-gray-500 font-medium">Pastors / Coordinators</th>
                    <td class="px-6 py-4 text-gray-800">{{ $report->pastors_coordinators ?? 'N/A' }}</td>
                </tr>
                <tr class="hover:bg-purple-50 transition">
                    <th class="px-6 py-4 text-left text-gray-500 font-medium">Foundation</th>
                    <td class="px-6 py-4 text-gray-800">{{ $report->foundation_school }}</td>
                </tr>
                <tr class="hover:bg-pink-50 transition">
                    <th class="px-6 py-4 text-left text-gray-500 font-medium">Baptized</th>
                    <td class="px-6 py-4 text-gray-800">{{ $report->baptized }}</td>
                </tr>
                <tr class="hover:bg-indigo-50 transition">
                    <th class="px-6 py-4 text-left text-gray-500 font-medium">Centers</th>
                    <td class="px-6 py-4 text-gray-800">{{ $report->service_centers }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Back Button -->
    <div class="mt-6">
        <a href="/dashboard" class="inline-block bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-3 rounded-xl shadow-lg font-semibold transition">
            ← Back to Reports
        </a>
    </div>
</div>
@endsection
