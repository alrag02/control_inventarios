@if(session()->has('message'))
    <div class="alert alert-warning fixed-top alert-dismissible fade show justify-content-center  ">
        {{ session()->get('message')}}
    </div>
@endif

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
</script>
