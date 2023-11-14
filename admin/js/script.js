let getInput = document.querySelectorAll('input');

let checkUsername = getInput[0];
let checkPassword = getInput[1];
let Err = document.getElementsByClassName('err');

function checkform() {
    function CheckUsername() {
        if (checkUsername.value == '') {
            Err[0].innerHTML = 'Bạn chưa nhập tên tài khoản !'
            CheckUsername.style.color = 'red';
        } else {
            Err[0].innerHTML = '';
            CheckUsername.style.boxShadow = '';
        }
    }
    CheckUsername();

    function CheckPassword() {
        if (checkPassword.value == '') {
            Err[1].innerHTML = 'Bạn chưa nhập mật khẩu !'
            CheckPassword.style.color = 'red';
        } else {
            Err[1].innerHTML = '';
            CheckPassword.style.boxShadow = '';
        }
    }
    CheckPassword();
}