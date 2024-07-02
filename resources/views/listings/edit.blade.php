<x-layout>
    <h1>Edit Listing #{{ $listing->id }}</h1>
    <form action="{{ route('listings.update', $listing->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') ?? $listing->title }}" required />
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary" value="{{ old('salary') ?? $listing->salary }}" required />
            @error('salary')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="hidden" name="employer_id" value="1" />
            <a href="{{ route('listings.show', $listing->id) }}" class="text-gray-500">Cancel</a>
            <button type="submit" class="ml-4 text-green-500">Update</button>
        </div>
    </form>
</x-layout>