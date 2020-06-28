export class Person{
    constructor(data){
        this.data = data;
    }
}
export class Person_model extends Person{
    constructor(data){

        super(data);
        this.data = data;
        this.url = {
            login : window.location.origin+'/main/login/login'
        };
        this.result = false;
    }
    formData(form){
        return $(form).serializeToJSON({});
    }
    set_result(value){
        this.result = value;
    }
    get_result(){
        return this.result;
    }
    login(){
        console.log('invoke login function');
        console.log(this.url.login);
        // 
    }
}