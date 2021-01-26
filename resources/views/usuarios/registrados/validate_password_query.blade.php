<script type="text/javascript">
    let password_login = document.querySelector("#camp_password_LOGIN");
    let password_repeat = document.querySelector("#camp_password_repeat");
    let button = document.querySelector(".btn");

    button.disabled = true;

    password_login.onpaste = e => {
        e.preventDefault();
        return false;
    };

    password_repeat.onpaste = e => {
        e.preventDefault();
        return false;
    };

    password_login.addEventListener("input", stateHandle);
    password_repeat.addEventListener("input", stateHandle);

    function stateHandle() {
        button.disabled = password_login.value !== password_repeat.value || password_login.value.length < 8;
    }
</script>
