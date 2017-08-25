class Table {
    constructor() {
        this.head = $(`<table id="tb" align="center" width="604">
                            <th width="260">ФИО</th>
                            <th width="106">Образование</th>
                            <th width="232">Город</th>
                      </table>`);
        $("body").append(this.head);
    }
    //-----[сохраняем данные с сервера]
    addData(data) {
        this.data = data;
    }
    //-----[создаем элементы таблицы]
    createInfo(td = this.data) {
        $(this.info).remove();
        let str = ``;
        td.forEach(item => str += `<tr>
            <td>${item.fio}</td>
            <td>${item.education.educ}</td>
            <td>${item.city.ct}</td>
        </tr>`);
        return this.info = $(str);
    }
    //-----[соединяем элементы с таблицей]
    render() {
        $(this.head).append(this.info);
    }
    //-----[фильтруем элементы таблыци по образованию]
    filterEduc(id) {
        $(this.info).remove();
        if (!id) { this.preInfo = this.data; return this.createInfo(); }
        const result = [];
        this.data.forEach(item => parseInt(item.education.id) === id ? result.push(item) : true);
        this.preInfo = result;
        return this.createInfo(result);
    }
    //-----[фильтруем элементы таблицы по городам]
    filterCity(cities, dt = this.preInfo) {
        if (cities.length === 0) { return false; }
        this.info.remove();
        const result = [];
        dt.forEach(item => {
            const city = item.city.id.split(',');
            cities.forEach(item1 => city.forEach(ct => { 
                if (ct === item1) { result.push(item); }
            }
        ))});
        return this.createInfo(result);
    }
}
