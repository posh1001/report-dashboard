<div class="max-w-7xl mx-auto px-2 sm:px-4 py-4 ">
    <!-- Navbar -->
    <livewire:admin-navbar />

    <!-- Search -->
    <div class="mt-6 mb-4 flex justify-end">
        <div class="relative w-full max-w-md">
            <input
                type="text"
                wire:model.debounce.500ms="search"
                placeholder="🔍 Search reports..."
                class="w-full px-4 py-2 pl-10 pr-4 text-sm rounded-full border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:outline-none shadow-sm"
            >
        </div>
    </div>

    <!-- Report Summary Cards -->
    <div class="container mt-8 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8">
        <livewire:cards.new-leaders-card />
        <livewire:cards.outreach-locations-card />
        <livewire:cards.foundation-school-card />
    </div>

    <div class="mb-8">
        <livewire:charts.foundation-and-centers />
    </div>

    <!-- Table -->
    <div class="overflow-x-auto overflow-y-auto max-h-[34rem] bg-white rounded-xl shadow-lg p-2 sm:p-4"
         wire:poll.5s
         wire:key="post-program-table">

        <table class="w-full text-sm text-left border-collapse">
            <thead>
                <tr class="bg-indigo-100 text-gray-700">
                    <!-- Step 1 -->
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Group</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Name</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Designation</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Awareness</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Phone</th>

                    <!-- Step 2 -->
                    <th class="px-2 sm:px-3 py-1 sm:py-2">New Cell Leaders</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Outreach Locations</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Leaders for Outreach</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Pastors/Coordinators</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Cells Pioneered</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Churches Pioneered</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Centers Pioneered</th>

                    <!-- Step 3 -->
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Foundation School</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Baptized</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Service Centers</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">New Cells</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Returning Invitees</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">New Church</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Attendance</th>


                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($reports as $report)
                    <tr class="hover:bg-indigo-50 transition">
                        <!-- Step 1 -->
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->group_name }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->name }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->designation }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->awareness }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->phone }}</td>

                        <!-- Step 2 -->
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->new_cell_leaders }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->outreach_locations }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->leaders_for_outreach }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->pastors_coordinators }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->cell_pioneered }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->churches_pioneered }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->centers_pioneered }}</td>

                        <!-- Step 3 -->
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->foundation_school }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->baptized }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->service_centers }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->new_cells }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->returning_invitees }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->new_church }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->attendance }}</td>

                        <!-- Status -->

                    </tr>
                @empty
                    <tr>
                        <td colspan="20" class="px-4 py-4 text-center text-gray-500">No reports found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-2 sm:mt-4 text-sm">
            {{ $reports->links() }}
        </div>
    </div>
</div>
