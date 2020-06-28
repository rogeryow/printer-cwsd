export class Table{
   constructor() {
        this.table_id = 'defaultID';
        this.table_create = document.createElement(`TABLE`);
        this.table_create.setAttribute("style", "width:100%");
        let class_list = (clss) => {
            this.table_create.classList.add(clss);
        };
        
        class_list("display");
        class_list("table");
        class_list("table-bordered");
        class_list("table-striped");
        class_list("table-hover");
        class_list("tblstocks");
        class_list("display");
        
   }
   set_table_id(id){
       this.table_id = id;
   }
   create_table(parent){
        this.table_create.setAttribute("id", this.table_id);
        document.getElementById(parent).appendChild(this.table_create);
   }
   load_table(content){
        this.table_obj = $(`#${this.table_id}`).DataTable(content);
    }
}