<form action="/" method="GET" class="filter-form">
    <div class="filter-inputs">
        <div class="filter-control search-control">
            <label for="filter_search" class="filter-label">Search</label>
            <input type="text" id="filter_search" name="search" placeholder="Search by title or description..." value="{{ request('search') }}" class="filter-input">
        </div>
        <div class="filter-control date-control">
            <label for="released-from" class="filter-label">Released From</label>
            <input type="date" id="released-from" name="released-from" value="{{ request('released-from') }}" class="filter-input">
        </div>
        <div class="filter-control date-control">
            <label for="released-until" class="filter-label">Released Until</label>
            <input type="date" id="released-until" name="released-until" value="{{ request('released-until', date('Y-m-d')) }}" class="filter-input">
        </div>
        <div class="filter-actions">
            <button type="submit" class="btn-filter">Apply Filters</button>
            @if (request()->hasAny(['search', 'released-from', 'released-until']))
                <a href="/" class="btn-reset-filter">Clear</a>
            @endif
        </div>
    </div>
</form>
