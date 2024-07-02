<x-layout>
    <h1>Create New Listing</h1>
    <form action="{{ route('listings.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Job Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required />
            @error('title')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="salary">Salary:</label>
            <input type="text" id="salary" name="salary" value="{{ old('salary') }}" required />
            @error('salary')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <input type="hidden" name="employer_id" value="1" />
            <button type="submit">Create</button>
        </div>
    </form>
</x-layout>
