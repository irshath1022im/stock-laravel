<div>
    @if($message = session('updated'))
    <div class="alert alert-success" role="alert">
      <strong>{{ $message}}</strong>
    </div>
    @endif
</div>
