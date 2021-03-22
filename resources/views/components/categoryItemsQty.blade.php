<div class="card-body">
    <ul class="list-group">
        <button type="button" class="btn btn-primary m-1">
            {{ $item['name']}}
                <span class="badge
                {{ $item['balance'] > 0 ? 'badge-success' : 'badge-danger' }}
                ">
                {{ $item['balance']}}
            </span>
        </button>
    </ul>
</div>
