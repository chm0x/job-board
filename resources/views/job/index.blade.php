<x-layout>
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
