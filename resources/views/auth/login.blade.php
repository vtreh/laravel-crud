<x-layout>
    <h1>Login</h1>
    <form action="/login" method="POST">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required />
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="{{ old('password') }}" required />
            @error('password')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
    <p>Or you can <a href="/register">create a new Account</a></p>
</x-layout>
