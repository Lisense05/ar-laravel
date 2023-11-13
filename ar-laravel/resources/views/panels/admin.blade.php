<x-app-layout>
    <div class="dark:text-white">
        
        <h1>User List</h1>

        <ul>
            @foreach ($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
