
import * as serializeToJSON from '../../jquery.serializeToJSON.js';
import * as testDatatable from '../../datatable/components.js';
import * as testTable from '../../datatable/table.js';
import * as testModal from '../../modal/components.js';

import { base_url } from '../main.js';


let user_type = '';
let info_id = '';


let clientComp = new testDatatable.Components();
let clientTable = new testTable.Table();
clientTable.set_table_id('clientsTable');
clientTable.create_table('clientsT');

clientComp.column(null, 20, 'Name', 'name');
clientComp.column(null, 10, 'Gender', 'gender');
clientComp.column(null, 15, 'Contact', 'contact');
clientComp.column(null, 20, 'Barangay', 'barangay');
clientComp.column(null, 20, 'Purok', 'purok_sitio');
clientComp.column(null, 5, '', function ( data, type, row, meta ) {
    return `<a href="javascript:0" id="${data.info_id}" class="btnCallClient"><span class="text-danger"> <i class="fa fa-phone"></i></span></a>`;
  });

clientComp.ajax.url  = `${ base_url }/clients/load_table`;
clientComp.ajax.dataSrc = 'data';
clientComp.ajax.type = 'POST';

clientComp.components.rowId = 'info_id';

clientTable.load_table(clientComp.components);


// Modal . . .
let clientModal = new testModal.Components(); 
clientModal.id = 'clientModal';
clientModal.type = 'bg-primary';
clientModal.title = 'Client Info';    
clientModal.size = 'modal-lg';

clientModal.createModal(document.getElementById('overall-wrapper'));
clientModal.modal_body.appendChild(document.getElementById('clientContent'));


$(document).on('click','.btnCallClient', function(){
    info_id = $(this).attr('id');

    $.get(`${base_url}/clients/load_client/${info_id}`, function(data){
      console.log(data);
      $('#name').text(`${data[0].lastname}, ${data[0].firstname}`);
      $('#birthdate').text(`${data[0].DOB}`);
      $('#gender').text(`${data[0].gender}`);
      $('#contact').text(`${data[0].contact}`);
      $('#address').text(`${data[0].purok_sitio}, ${data[0].barangay}`);

    },'json');
    $(`#${clientModal.id}`).modal('show');
});

$('#btnMoreInfo').click(function(){
  if($('#btnMoreInfo').text() == 'Click to view answered questions'){
    console.log('button more clicked');
    let html = '';

    

    $.get(`${base_url}/clients/load_answered_questions/${info_id}`, function(data){
      console.log(data);
      for(let i=0; i<data.length; i++){
        html += `<div class="callout callout-info">
                    <h6>1.) ${ data[i].question }</h6>
                    <p>Answer: <span class="text-success"><b>${ data[i].ans_val }</b></span></p>
                  </div>`;
      }
      $('#questions').html(html);
      $('#btnMoreInfo').text('Hide Additional Info');
      $('#btnMoreInfo').attr('id', 'btnHideInfo');
      $('#questions').attr('hidden', false);
      $('#analyze').attr('hidden',true);
  },'json');
  }else{
    console.log('button hide clicked');
    $('#questions').attr('hidden',true);
    $('#btnHideInfo').text('Click to view answered questions');
    $('#btnHideInfo').attr('id', 'btnMoreInfo');
    $('#questions').attr('hidden', true);
  }

});

$('#btnAnalyze').click(function(){
  console.log('button hide clicked');
    $('#analyze').attr('hidden',false);
    $('#btnHideInfo').text('Click to view answered questions');
    $('#btnHideInfo').attr('id', 'btnMoreInfo');
    $('#questions').attr('hidden', true);
});


$('#analyzeForm').submit(function(e){
  e.preventDefault();
  console.log('Submit Analyze');

  let form = $(this).serializeArray();
  form.push({
    name: "info_id",
    value: info_id 
  });

  $.post(`${base_url}/clients/save`, form, function(succ){
    if(succ.status){
      Swal.fire(
          `Successfully Saved!`,
          `Saved Called Client`,
          'success'
          ).then(() => 
          { 
              // clientTable.table_obj.ajax.reload();
              clientTable.table_obj
              .row( `#${info_id}` )
              .remove()
              .draw();
              
              $(`#${clientModal.id}`).modal('hide'); 
          });
    }else
    {
        Swal.fire(
            'Saving call Failed!',
            `Something went wrong while saving!`,
            'error'
            );
    } 
  },'json');
})