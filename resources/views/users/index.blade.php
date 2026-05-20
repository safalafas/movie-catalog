<x-layout>
    <div class="users-index-container">
        <h1 class="section-title">Community Members</h1>
        @unless(count($users) == 0)
            <div class="users-grid">
                @foreach ($users as $user)
                    <x-users-card :user="$user" />
                @endforeach
            </div>
        @else
            <div class="no-movies-alert">
                <p>No users registered yet.</p>
            </div>
        @endunless
        
        <div class="pagination-wrapper">
            {{ $users->links() }}
        </div>
    </div>
</x-layout>
