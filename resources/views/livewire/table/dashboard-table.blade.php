 <div class="overflow-x-auto overflow-y-auto max-h-96 bg-white rounded-xl shadow-lg p-2 sm:p-4"
         wire:poll.5s
         wire:key="post-program-table">
        <table class="w-full text-sm text-left border-collapse">
            <thead>
                <tr class="bg-indigo-100 text-gray-700">
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Group</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Name</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Designation</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Awareness</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Phone</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">New Leaders</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Outreach Locations</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Leaders for Outreach</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Pastors/Coordinators</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Foundation</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Baptized</th>
                    <th class="px-2 sm:px-3 py-1 sm:py-2">Centers</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($reports as $report)
                    <tr class="hover:bg-indigo-50 transition">
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->group_name }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->name }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->designation }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->awareness }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->phone }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->new_cell_leaders }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->outreach_locations }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->leaders_for_outreach }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->pastors_coordinators }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->foundation_school }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->baptized }}</td>
                        <td class="px-2 sm:px-3 py-1 sm:py-2">{{ $report->service_centers }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
