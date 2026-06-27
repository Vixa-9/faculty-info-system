@if ($errors->any())
    <div class="alert alert-danger auto-dismiss">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger auto-dismiss">
        {{Session::get('error')}}
    </div>
@endif

@if(Session::has('success'))
    <div class="alert alert-success auto-dismiss">
        {{Session::get('success')}}
    </div>
@endif

<script>
    document.querySelectorAll('.auto-dismiss').forEach(function(el) {
        setTimeout(function() {
            el.style.transition = 'opacity 0.5s';
            el.style.opacity = '0';
            setTimeout(function() { el.remove(); }, 500);
        }, 4000);
    });
</script>
