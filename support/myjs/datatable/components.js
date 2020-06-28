export class Components{
    constructor(){
        this.searching = true;
        this.columns = [];
        this.dom = 'Colfrtip';
        this.ajax = {
            'url'       : '',
            'dataSrc'   : '',
            'type'      : ''
        };

        this.components = {
            'lengthMenu' : [[10, 25, 50, -1], [10, 25, 50, "All"]],
            'searching' : this.searching,
            'ordering' : true,
            "dom": this.dom,
            
            'ajax'  : this.ajax,
            'rowId' : 'table_id',

            'columns' : this.columns,

            'deferRender': true,
            'stateSave' : true,

            'paging' : true,
        };
    }
    column(data, width, title, render, visible = true){
        this.columns.push({data: data, width: `${width}%`, title: title, render: render, visible: visible});
    }
    // Under development . . .
    withChild(){
        this.columns.push({
            "className": 'details-control',
            "orderable": false,
            "data": null,
            "defaultContent": ''
        });
    }
    
}