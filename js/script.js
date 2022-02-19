//кнопка добавить заметку
add.onclick = function () {
    add.classList.toggle('active')
    note.classList.toggle('active')
    font_list.classList.remove('active')
}
//кнопки изменения размера шрифта
let fontsize = (getComputedStyle(note_text).fontSize)
fontsize = parseInt(fontsize)
fontsize = Number(fontsize)
btn_1.onclick = function () { note_text.style.fontSize = (fontsize -= 2) + 'px' }
btn_2.onclick = function () { note_text.style.fontSize = (fontsize += 2) + 'px' }
//кнопки изменения семейства шрифтов
let font = '"Segoe UI", Tahoma, Geneva, Verdana, sans-serif'
font_list.onclick = function () { note_text.style.fontFamily = font }
Courier.onclick = function () { font = '"Courier New", Courier, monospace' }
Franklin.onclick = function () { font = '"Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif' }
Serif.onclick = function () { font = 'serif' }
Segoe.onclick = function () { font = '"Segoe UI", Tahoma, Geneva, Verdana, sans-serif' }
Lobster.onclick = function () { font = 'Lobster' }
Comfortaa.onclick = function () { font = 'Comfortaa' }
Caveat.onclick = function () { font = 'Caveat' }
Amatic.onclick = function () { font = 'Amatic SC' }
Underdog.onclick = function () { font = 'Underdog' }
Source_Code.onclick = function () { font = '"Source Code Pro", monospace' }
press_start.onclick = function () { font = '"Press Start 2P", cursive' }
//кнопка открытия меню со шрифтами
btn_open_font_list.onclick = function () { font_list.classList.toggle('active') }
//кнопка закрытия формы меню со шрифтами
btn_close_font_list.onclick = function () { font_list.classList.remove('active') }
//отслеживание цвета
window.addEventListener("load", startup, false)
function startup() { color.addEventListener("input", updateFirst, false) }
function updateFirst(event) { if (note_text) { note_text.style.color = event.target.value } }
//формула для порядкового номера заметок
let num = 0
console.log('Количество заметок:', num)
//Изменение размеров блока
let width = document.querySelector('.note_text').offsetWidth
let height = document.querySelector('.note_text').offsetHeight
note_text.onclick = function () {
    width = document.querySelector('.note_text').offsetWidth
    height = document.querySelector('.note_text').offsetHeight
}
//кнопкa применить
btn_save.onclick = function () {
    add.classList.remove('active')
    note.classList.remove('active')
    num += 1
    let newNote = document.createElement('textarea')
    newNote.className = 'note__' + num
    newNote.innerHTML = note_text.value
    nav.append(newNote)
    note_text.value = ''
    newNote.setAttribute('disabled', true)
    newNote.style.fontSize = fontsize + 'px'
    newNote.style.color = color.value
    newNote.style.width = width + 'px'
    newNote.style.height = height + 'px'
    newNote.style.backgroundColor = '#222'
    newNote.style.borderRadius = '5px'
    newNote.style.padding = '10px'
    newNote.style.border = '2px solid #eee'
    newNote.style.margin = '10px'
    newNote.style.fontFamily = font
    newNote.style.overflow = 'hidden'
    newNote.style.whiteSpace = 'pre-wrap'
    console.log('Количество заметок:', num)
}
//кнопка закрыть
btn_exit.onclick = function () {
    add.classList.remove('active')
    note.classList.remove('active')
    font_list.classList.remove('active')
}
