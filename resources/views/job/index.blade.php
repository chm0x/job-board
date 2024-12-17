<x-layout>
    @forelse($jobs as $job)
       <x-card class="mb-4">
            <h2>{{ $job->title  }}</h2>
            <p>{{ $job->description }}</p>
            <p>{{ $job->salary }}</p>
            <p>Location: {{ $job->location }}</p>
            <p>Category: {{ $job->category }}</p>
            <p>Experiencie: {{ $job->experience }}</p>
       </x-card>
    @empty
        <p>There is not jobs</p>
    @endforelse
    <ul>
        <li>{{ $jobs->links() }}</li>
    </ul>
</x-layout>