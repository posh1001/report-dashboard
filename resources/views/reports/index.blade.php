@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">

    <!-- Header -->
    <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white rounded-xl shadow-lg p-6 mb-6">
        <h1 class="text-3xl md:text-4xl font-bold">All Reports</h1>
        <p class="text-lg md:text-xl mt-1">Latest post-program reports</p>
    </div>

    <!-- Reports Table -->
    <div class="bg-white shadow-lg rounded-xl overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-indigo-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Group</th>
                    <th class="px-4 py-2 text-left">Name</th>
                    <th class="px-4 py-2 text-left">Designation</th>
                    <th class="px-4 py-2 text-left">Awareness</th>
                    <th class="px-4 py-2 text-left">Phone</th>
                    <th class="px-4 py-2 text-left">New Leaders</th>
                    <th class="px-4 py-2 text-left">Outreach Locations</th>
                    <th class="px-4 py-2 text-left">Pastors/Coordinators</th>
                    <th class="px-4 py-2 text-left">Foundation</th>
                    <th class="px-4 py-2 text-left">Baptized</th>
                    <th class="px-4 py-2 text-left">Centers</th>
                    <th class="px-4 py-2 text-left">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($reports as $report)
                    <tr class="hover:bg-indigo-50 transition">
                        <td class="px-4 py-2">{{ $report->group_name }}</td>
                        <td class="px-4 py-2">{{ $report->name }}</td>
                        <td class="px-4 py-2">{{ $report->designation ?? 'N/A' }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $report->awareness === 'Yes' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $report->awareness }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $report->phone ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $report->new_cell_leaders ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $report->outreach_locations ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $report->pastors_coordinators ?? 'N/A' }}</td>
                        <td class="px-4 py-2">{{ $report->foundation_school }}</td>
                        <td class="px-4 py-2">{{ $report->baptized }}</td>
                        <td class="px-4 py-2">{{ $report->service_centers }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('reports.show', $report->id) }}"
                               class="text-indigo-600 hover:text-indigo-800 font-semibold">
                               View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="px-4 py-4 text-center text-gray-500">No reports found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $reports->links() }}
    </div>
</div>
@endsection
