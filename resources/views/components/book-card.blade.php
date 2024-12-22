<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
            <p class="card-text"><strong>Author:</strong> {{ $author }}</p>
            <p class="card-text">
                <strong>Availability:</strong> 
                {{ $status ? 'Available' : 'Unavailable' }}
            </p>
        </div>
    </div>
</div>
