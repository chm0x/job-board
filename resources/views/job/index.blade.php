<x-layout>
    @forelse($jobs as $job)
       <x-card class="mb-4">
            <div class="mb-4 flex justify-between">
                <h2 class="text-lg font-medium">{{ $job->title  }}</h2>
                <div class="text-slate-500">
                    $ {{ number_format($job->salary) }}
                </div>
            </div>
            <div class="mb-4 flex item-center justify-between text-sm text-slate-500 items-center">
                <div class="flex space-x-4">
                    <div>Company Name</div>
                    <div>Location: {{ $job->location }}</div>
                </div>

                <div class="flex space-x-1 text-xs">
                    <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
                    <x-tag>{{ $job->category }}</x-tag>
                </div>

            </div>
            <p class="text-sm text-slate-500 mb-4">
                {!! nl2br($job->description) !!}
            </p>
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    Show
                </x-link-button>
                {{-- DELETE THIS CODE BELOW, after you save on Git: --}}
                {{-- <a href="{{ route('jobs.show', $job) }}"
                    class="rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text center text-sm font-semibold text-black shadow-sm hover:bg-slate-100"
                >
                    Show
                </a> --}}
            </div>
       </x-card>
    @empty
        <p>There is not jobs</p>
    @endforelse
    <ul>
        <li>{{ $jobs->links() }}</li>
    </ul>
</x-layout>