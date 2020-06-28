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
            login : 'main/login/login'
        }
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
        $.post(this.url.login, this.data, function(data){
            if(data.status){
                console.log('successfully login!');
                window.location.href='user/';
            }else{
                console.log('login failed!');
            }
        },'json');
    }
}