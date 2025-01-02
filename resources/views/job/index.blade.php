<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
    ]" />
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    {{-- Filter Search --}}
                    <div class="mb-1 font-semibold dark:text-black">
                        Search
                    </div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>
                <div>
                    {{-- Filter Salary --}}
                    <div class="mb-1 font-semibold dark:text-black">
                        Salary
                    </div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    {{-- Filter Experience --}}
                    <div class="mb-1 font-semibold dark:text-black">Experience</div>
                    <x-radio-group 
                        name="experience" 
                        :options="\App\Models\OfferedJob::$experience" 
                    />
                </div>
                <div>
                    {{-- Filter Category --}}
                    <div class="mb-1 font-semibold dark:text-black">Category</div>
                    <x-radio-group 
                        name="category" 
                        :options="\App\Models\OfferedJob::$category" 
                    />
                </div>
            </div>

            <button class="w-full dark:text-black">
                Filter
            </button>
        </form>
    </x-card>
    @forelse($jobs as $job)
        <x-job-card class="mb-4" :job="$job">
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @empty
        <p>There is not jobs</p>
    @endforelse
    <ul>
        <li>{{ $jobs->links() }}</li>
    </ul>
</x-layout>
