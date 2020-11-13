<script>
    function all() {
        document.getElementById("new").style.display = '';
        document.getElementById("cons").style.display = '';
        document.getElementById("used").style.display = '';
    }

    function used() {
        document.getElementById("new").style.display = 'none';
        document.getElementById("cons").style.display = 'none';
        document.getElementById("used").style.display = '';
    }

    function news() {
        document.getElementsByClassName("new").style.display = '';
        document.getElementById("cons").style.display = 'none';
        document.getElementById("used").style.display = 'none';
    }

    function cons() {
        document.getElementsByClassName("new").style.display = 'none';
        document.getElementById("cons").style.display = '';
        document.getElementById("used").style.display = 'none';
    }

    function toggle_by_class(cls, on) {
        var lst = document.getElementsByClassName(cls);
        for(var i = 0; i < lst.length; ++i) {
            lst[i].style.display = on ? '' : 'none';
        }
    }
</script>
