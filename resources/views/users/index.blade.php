<x-layout>
    @unless(count($users) == 0)
        @foreach ($users as $user)
            <x-users-card :user="$user" />
        @endforeach
    @else
        {{-- If number of user account == 0  --}}
        <p>No User to Show</p>
    @endunless
    <div>
        {{-- Pagination Links --}}
        {{ $users->links() }}
    </div>
</x-layout>
