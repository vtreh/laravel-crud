<x-layout>
    <ul>
        @foreach ($listings as $listing)
            <li>
                <a href="/listings/{{ $listing['id'] }}" class="text-blue-500 block mb-5">
                    <h3>{{ $listing->employer->name }}</h3>
                    <strong>{{ $listing['title'] }}</strong>
                    <p>Pays <mark>{{ $listing['salary'] }}</mark></p>
                </a>
            </li>
        @endforeach
    </ul>
    <div>{{ $listings->links() }}</div>
</x-layout>
