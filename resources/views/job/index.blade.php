<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
    ]" />
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold dark:text-black">
                        Search
                    </div>
                    <x-text-input name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>
                <div>
                    <div class="mb-1 font-semibold dark:text-black">
                        Salary
                    </div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold dark:text-black">Experience</div>

                    <label for="experience" class="mb-1 flex items-center">
                        <input 
                            type="radio" 
                            name="experience" 
                            value="" 
                            @checked(!request('experience')) 
                        />
                        <span class="ml-2 dark:text-black">All</span>
                    </label>
                    @foreach(\App\Models\OfferedJob::$experience as $experience)
                        <label for="experience_{{ $experience }}" class="mb-1 flex items-center">
                            <input 
                                type="radio" 
                                name="experience" 
                                id="experience_{{ $experience }}" 
                                value="{{ $experience }}" 
                                @checked( $experience === request('experience')) 
                            />
                            <span class="ml-2 dark:text-black"> {{ Str::ucfirst($experience) }} </span>
                        </label>
                    @endforeach
                    {{-- <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="entry" />
                        <span class="ml-2 dark:text-black">Entry</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="intermediate" />
                        <span class="ml-2 dark:text-black">Intermediate</span>
                    </label>
                    <label for="experience" class="mb-1 flex items-center">
                        <input type="radio" name="experience" value="senior" />
                        <span class="ml-2 dark:text-black">Senior</span>
                    </label> --}}
                </div>
                <div>4</div>
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
