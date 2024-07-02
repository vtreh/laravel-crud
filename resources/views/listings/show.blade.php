<x-layout>
    <div>
        <h5>{{ $listing->employer->name }}</h5>
        <h3>{{ $listing->title }}</h3>
        <p>Salary: <mark>{{ $listing->salary }}</mark></p>
        <div class="flex">
            <a href="{{ route('listings.edit', $listing->id) }}" class="text-green-500 mr-3">Edit</a>
            <form action="{{ route('listings.destroy', $listing->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
        </div>
    </div>
</x-layout>