$(document).ready(function () {
    $('button#popup_button').on('click', function (event) {
        var name = $('input.popup_name');
        var email = $('input.popup_email');
        var password = $('input.popup_password');
        var passwordRepeat = $('input.popup_passwordRepeat');

        if (registration()) {
            $.ajax({
                method: "POST",
                url: "../php/registration.php",
                data: { popup_name: name, popup_email: email, popup_password: password, popup_passwordRepeat: passwordRepeat }
            })
                .done(function () {
                    $('input.popup_name').val('');
                    $('input.popup_email').val('');
                    $('input.popup_password').val('');
                    $('input.popup_passwordRepeat').val('');
                });
        } else { event.preventDefault(); 
    }
    })
})
function registration() {

    let right = true;

    let delay = 5000;

    const userName = document.getElementById('popup_name').value;
    const email = document.getElementById('popup_email').value;
    const password = document.getElementById('popup_password').value;
    const passwordRepeat = document.getElementById('popup_passwordRepeat').value;

    if (userName.length < 3 || userName.length > 15) {
        document.getElementById('error').style.visibility = "visible"
        document.getElementById('error').append('Имя меньше 1 символа или больше 15');
        let br = document.createElement('br');
        document.getElementById('error').appendChild(br);
        $('#popup_name').val('');
        right = false;
        window.setTimeout(function () {
            document.getElementById('error').style.visibility = "hidden";
            document.getElementById('error').innerHTML = '';
        }, delay);
    }
    if (!right) {
        if (password.length < 3) {
            document.getElementById('error').style.visibility = "visible"
            document.getElementById('error').append('Пароль меньше 8 символов');
            let br = document.createElement('br');
            document.getElementById('error').appendChild(br);
            $('#popup_password').val('');
            $('#popup_passwordRepeat').val('');
            window.setTimeout(function () {
                document.getElementById('error').style.visibility = "hidden";
                document.getElementById('error').innerHTML = '';
            }, delay);
        }
    } else {
        if (password.length < 3) {
            document.getElementById('error').style.visibility = "visible"
            document.getElementById('error').append('Пароль меньше 8 символов');
            let br = document.createElement('br');
            document.getElementById('error').appendChild(br);
            $('#popup_password').val('');
            $('#popup_passwordRepeat').val('');
            right = false;
            window.setTimeout(function () {
                document.getElementById('error').style.visibility = "hidden";
                document.getElementById('error').innerHTML = '';
            }, delay);
        }
    }
    if (!right) {
        if (password != passwordRepeat) {
            document.getElementById('error').style.visibility = "visible"
            document.getElementById('error').append('Пароли не совпадают');
            let br = document.createElement('br');
            document.getElementById('error').appendChild(br);
            $('#popup_password').val('');
            $('#popup_passwordRepeat').val('');
            window.setTimeout(function () {
                document.getElementById('error').style.visibility = "hidden";
                document.getElementById('error').innerHTML = '';
            }, delay);
        }
    } else {
        if (password != passwordRepeat) {
            document.getElementById('error').style.visibility = "visible"
            document.getElementById('error').append('Пароли не совпадают');
            let br = document.createElement('br');
            document.getElementById('error').appendChild(br);
            $('#popup_password').val('');
            $('#popup_passwordRepeat').val('');
            right = false;
            window.setTimeout(function () {
                document.getElementById('error').style.visibility = "hidden";
                document.getElementById('error').innerHTML = '';
            }, delay);
        }
    }


    return right;
}