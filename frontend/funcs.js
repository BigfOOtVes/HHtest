
function checkElem(elem) {
    const arr = [];
    elem.forEach(item => (item.checked) ? arr.push(item.value) : false);
    return arr;
}