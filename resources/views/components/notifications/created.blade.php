<div>
    @if($message = session('created'))
    <div class="alert alert-success" role="alert">
      <strong>{{ $message}}</strong>
    </div>
    @endif
</div>
