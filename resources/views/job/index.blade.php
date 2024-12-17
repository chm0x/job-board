<x-layout>
    @forelse($jobs as $job)
        <h2>{{ $job->title }}</h2>
        <p>{{ $job->description }}</p>
        <p>{{ $job->salary }}</p>
        <p>Location: {{ $job->location }}</p>
        <p>Category: {{ $job->category }}</p>
        <p>Experiencie: {{ $job->experience }}</p>
        <hr/>
    @empty
        <p>There is not jobs</p>
    @endforelse
    <ul>
        <li>{{ $jobs->links() }}</li>
    </ul>
</x-layout>