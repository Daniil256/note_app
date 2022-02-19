//кнопка показать/скрыть пароль
const checkbox = document.querySelector('.checkbox')
checkbox.onclick = function () {
    if (password.type == 'password') {
        password.setAttribute('type', 'text')
        password.classList.remove('pass')
    } else if (password.type == 'text') {
        password.setAttribute('type', 'password')
        password.classList.add('pass')
    }
}
