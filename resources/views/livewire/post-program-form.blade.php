<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-indigo-100">

  <!-- NAVBAR (single root contains navbar + content) -->
  <livewire:navbar />
  <!-- Page content -->
  <div class="max-w-3xl mx-auto mt-8 p-6">
    <!-- Progress header -->
    <div class="bg-white shadow rounded-2xl p-4 mb-6">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-lg font-bold text-gray-800">Submit Post-Program Report</h2>
          <p class="text-sm text-gray-500">Step {{ $currentStep }} of {{ $totalSteps }}</p>
        </div>
        <div class="text-sm text-gray-600">{{ intval(($currentStep / $totalSteps) * 100) }}%</div>
      </div>

      <!-- progress bar -->
      <div class="mt-3 h-3 w-full bg-gray-200 rounded-full overflow-hidden">
        <div
          class="h-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transition-all"
          style="width: {{ intval(($currentStep / $totalSteps) * 100) }}%">
        </div>
      </div>

      <!-- step indicators -->
      <div class="mt-3 flex items-center gap-3">
        @for ($i = 1; $i <= $totalSteps; $i++)
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-semibold
                        {{ $currentStep === $i ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700' }}">
              {{ $i }}
            </div>
            @if ($i < $totalSteps)
              <div class="w-8 h-0.5 bg-gray-200"></div>
            @endif
          </div>
        @endfor
      </div>
    </div>

    <!-- Card -->
    <div class="bg-white shadow-xl rounded-2xl p-6">
      <!-- Success message -->
      @if ($successMessage)
        <div class="mb-4 p-3 rounded-lg bg-green-100 text-green-800 flex items-center gap-2">
          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          </svg>
          <div>{{ $successMessage }}</div>
        </div>
      @endif

      <form wire:submit.prevent="submit" class="space-y-6">

        <!-- STEP 1 -->
        @if ($currentStep === 1)
          <div class="grid grid-cols-1 gap-4">
            <!-- group_name -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5V4H2v16h5" />
                </svg>
                Group Name
              </label>
              <input type="text" wire:model.defer="group_name" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 shadow-sm">
              @error('group_name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- name -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A8 8 0 1118.364 4.56 8 8 0 015.121 17.804z" />
                </svg>
                Name
              </label>
              <input type="text" wire:model.defer="name" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 shadow-sm">
              @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- designation -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h12M6 12h12M6 18h12" />
                </svg>
                Designation
              </label>
              <select wire:model.defer="designation" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-purple-500 shadow-sm">
                <option value="">-- Select --</option>
                <option>Group Pastor</option>
                <option>Church Pastor</option>
                <option>Church Coordinator</option>
              </select>
              @error('designation') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- awareness -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                </svg>
                Awareness of ANOB Chairman Structure
              </label>
              <select wire:model.defer="awareness" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-pink-500 shadow-sm">
                <option value="">-- Select --</option>
                <option>Yes</option>
                <option>No</option>
              </select>
              @error('awareness') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- phone -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-teal-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h2l3.6 7.59L7.25 15a1 1 0 00.9 1.48H17v2H7a2 2 0 01-2-2v-2" />
                </svg>
                Phone
              </label>
              <input type="text" wire:model.defer="phone" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-teal-500 shadow-sm">
              @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
          </div>
        @endif

        <!-- STEP 2 -->
        @if ($currentStep === 2)
          <div class="grid grid-cols-1 gap-4">
            <!-- new_cell_leaders -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-yellow-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                New Cell Leaders
              </label>
              <textarea wire:model.defer="new_cell_leaders" rows="3" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-yellow-500 shadow-sm"></textarea>
              @error('new_cell_leaders') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- outreach_locations -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                Outreach Locations
              </label>
              <textarea wire:model.defer="outreach_locations" rows="3" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 shadow-sm"></textarea>
              @error('outreach_locations') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- leaders_for_outreach -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-purple-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m0 0H5m3 0h3m4 0h3" />
                </svg>
                Leaders for Outreaches
              </label>
              <textarea wire:model.defer="leaders_for_outreach" rows="3" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-purple-500 shadow-sm"></textarea>
              @error('leaders_for_outreach') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- pastors_coordinators -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Pastors & Coordinators
              </label>
              <textarea wire:model.defer="pastors_coordinators" rows="3" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 shadow-sm"></textarea>
              @error('pastors_coordinators') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
          </div>
        @endif

        <!-- STEP 3 -->
        @if ($currentStep === 3)
          <div class="grid grid-cols-1 gap-4">
            <!-- foundation_school -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3" />
                </svg>
                Foundation School Enrollment
              </label>
              <input type="number" wire:model.defer="foundation_school" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 shadow-sm" min="0">
              @error('foundation_school') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- baptized -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Invitees Baptized
              </label>
              <input type="number" wire:model.defer="baptized" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-green-500 shadow-sm" min="0">
              @error('baptized') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- service_centers -->
            <div>
              <label class="flex items-center gap-2 text-sm font-semibold text-gray-700 mb-2">
                <svg class="w-5 h-5 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                Service Centers Identified
              </label>
              <input type="number" wire:model.defer="service_centers" class="w-full rounded-xl border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-400 shadow-sm" min="0">
              @error('service_centers') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
          </div>
        @endif

        <!-- Navigation Buttons -->
        <div class="flex items-center justify-between mt-4">
          <div>
            @if ($currentStep > 1)
              <button type="button" wire:click="prevStep" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md shadow hover:opacity-90">Back</button>
            @endif
          </div>

          <div class="flex items-center gap-3">
            @if ($currentStep < $totalSteps)
              <button type="button" wire:click="nextStep" wire:loading.attr="disabled" class="px-5 py-2 bg-indigo-600 text-white rounded-xl shadow hover:opacity-90 flex items-center gap-2">
                <span>Next</span>
                <svg wire:loading wire:target="nextStep" class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v4m0 8v4m8-8h-4M4 12H0" />
                </svg>
              </button>
            @else
              <button type="submit" wire:loading.attr="disabled" class="px-6 py-2 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 text-white rounded-xl shadow flex items-center gap-2">
                <svg wire:loading class="w-4 h-4 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v4m0 8v4m8-8h-4M4 12H0" />
                </svg>
                <span>Submit Report</span>
              </button>
            @endif
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
