
import * as serializeToJSON from '../../jquery.serializeToJSON.js';
import * as testDatatable from '../../datatable/components.js';
import * as testTable from '../../datatable/table.js';
import * as testModal from '../../modal/components.js';

import { base_url } from '../main.js';

let user_type = '';
let id = '';

let groupComp = new testDatatable.Components();
let groupTable = new testTable.Table();
groupTable.set_table_id('groupTable');
groupTable.create_table('groupT');

groupComp.column(null, 30, 'Name', 'name');
groupComp.column(null, 70, 'Description', 'description');
groupComp.column(null, 10, '', function ( data, type, row, meta ) {
    return `<a href="javascript:0" id="${data.id}" class="btnEditGroup"><span class="text-warning"> <i class="fa fa-edit"></i></span></a>`;
  });

groupComp.ajax.url  = `${ base_url }/developer/group_load_table`;
groupComp.ajax.dataSrc = 'data';
groupComp.ajax.type = 'POST';

groupComp.components.rowId = 'id';

groupTable.load_table(groupComp.components);

// teacher select Table . . 
let usersComp = new testDatatable.Components();
let usersTable = new testTable.Table();
usersTable.set_table_id('usersTable');
usersTable.create_table('usersT');

usersComp.column(null, 50, 'Name', 'user_name');
usersComp.column(null, 15, 'Username', 'username');
usersComp.column(null, 25, 'E-mail', 'email');
usersComp.column(null, 5, 'User Type', 'name');
usersComp.column(null, 5, '', function ( data, type, row, meta ) {
    return `<a href="javascript:0" id="${data.id}" class="btnEditUser"><span class="text-danger"> <i class="fa fa-edit"></i></span></a>`;
  });

usersComp.ajax.url  = `${ base_url }/developer/users_load_table`;
usersComp.ajax.dataSrc = 'data';
usersComp.ajax.type = 'POST';

usersComp.components.rowId = 'id';

usersTable.load_table(usersComp.components);

// Modal . . .
let groupModal = new testModal.Components(); 
groupModal.id = 'groupModal';
groupModal.type = 'bg-primary';
groupModal.title = 'Group';    
// groupModal.size = 'modal-lg';

groupModal.createModal(document.getElementById('overall-wrapper'));
groupModal.modal_body.appendChild(document.getElementById('groupForm'));

// Modal . . .
let usersModal = new testModal.Components(); 
usersModal.id = 'usersModal';
usersModal.type = 'bg-primary';
usersModal.title = 'Users';    
// usersModal.size = 'modal-lg';

usersModal.createModal(document.getElementById('overall-wrapper'));
usersModal.modal_body.appendChild(document.getElementById('usersForm'));

// Group
$('#addGroup').click(function(){
    $(`#${groupModal.id}`).modal('show');
});

$('#addUsers').click(function(){
    $(`#${usersModal.id}`).modal('show');
});

$(document).on('click','.btnEditGroup', function(){
    id = $(this).attr('id');
    $(`#${groupModal.id}`).modal('show');
})

$('#groupForm').submit(function(e){
    
    user_type = 'group'

    e.preventDefault();
    console.log('submit groupForm');
    let form = $(this).serializeArray();
    form.push({
        'name': "id",
        "value": id
    });

    $.post(`${base_url}/developer/save/${user_type}`, form, function(succ){
        console.log(succ);

        let message = '';

        if(id == ''){
            message = 'Added';
        }else{
            message = 'Updated'
        }

        if(succ.status){
            Swal.fire(
                `Group ${message}`,
                `new group successfully ${message}`,
                'success'
                ).then(() => 
                { 
                    $(`#${user_type}Table`).DataTable().ajax.reload();
                    $(`#${user_type}Modal`).modal('hide'); 
                });
        }else{
            Swal.fire(
                'Adding Failed!',
                `Something went wrong while adding group!`,
                'error'
                );
        }   
    },'json');
})

// User
$(document).on('click','.btnEditUser', function(){
    let id = $(this).attr('id');
    $(`#${usersModal.id}`).modal('show');
});

$('#addUsers').click(function(){
    $(`#${usersModal.id}`).modal('show');
});

$('#usersForm').submit(function(e){
    
    user_type = 'users'

    e.preventDefault();
    console.log('submit usersForm');
    let form = $(this).serializeArray();
    form.push({
        'name': "id",
        "value": id
    });

    $.post(`${base_url}/developer/save/${user_type}`, form, function(succ){
        console.log(succ);

        let message = '';

        if(id == ''){
            message = 'Added';
        }else{
            message = 'Updated'
        }

        if(succ.status){
            Swal.fire(
                `User ${message}`,
                `new user successfully ${message}`,
                'success'
                ).then(() => 
                { 
                    $(`#${user_type}Table`).DataTable().ajax.reload();
                    $(`#${user_type}Modal`).modal('hide'); 
                });
        }else{
            Swal.fire(
                'Adding Failed!',
                `Something went wrong while adding group!`,
                'error'
                );
        }   
    },'json');
})