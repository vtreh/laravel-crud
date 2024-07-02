<x-layout>
    <div>
        <h5>{{ $listing->employer->name }}</h5>
        <h3>{{ $listing->title }}</h3>
        <p>Salary: <mark>{{ $listing->salary }}</mark></p>
    </div>
</x-layout>