<x-layout>
    @forelse($jobs as $job)
       <x-card class="mb-4">
            <div class="mb-4 flex justify-between">
                <h2 class="text-lg font-medium">{{ $job->title  }}</h2>
                <div class="text-slate-500">
                    $ {{ number_format($job->salary) }}
                </div>
            </div>
            <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
                <div class="flex space-x-4">
                    <div>Company Name</div>
                    <div>Location: {{ $job->location }}</div>
                </div>

                <div class="flex space-x-1 text-xs">
                    <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
                    <x-tag>{{ $job->category }}</x-tag>
                </div>

            </div>
            <p class="text-sm text-slate-500">
                {{-- Line converted to <br> elements --}}
                {{-- {{ nl2br($job->description) }} --}}
                {!! nl2br($job->description) !!}
            </p>
            {{-- <p>{{ $job->description }}</p>
            <p>{{ $job->salary }}</p>
            <p>Location: {{ $job->location }}</p>
            <p>Category: {{ $job->category }}</p>
            <p>Experiencie: {{ $job->experience }}</p> --}}
       </x-card>
    @empty
        <p>There is not jobs</p>
    @endforelse
    <ul>
        <li>{{ $jobs->links() }}</li>
    </ul>
</x-layout>