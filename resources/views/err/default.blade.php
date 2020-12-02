<div class=" err">
    @if($errors->any())
        <div class="err-header">注意!</div>
        @foreach($errors->all() as $e)
            <div class="alert alert-danger">{{$e}}</div>
        @endforeach
    @endif
</div>