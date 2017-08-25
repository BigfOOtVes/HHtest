//-----[проверяем переданные элемены на наличие checked и возвращаем массив значений элементов]
function checkElem(elem) {
    const arr = [];
    elem.forEach(item => (item.checked) ? arr.push(item.value) : false);
    return arr;
}