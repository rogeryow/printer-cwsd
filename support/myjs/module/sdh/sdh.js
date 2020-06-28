
import * as serializeToJSON from '../../jquery.serializeToJSON.js';
import * as testDatatable from '../../datatable/components.js';
import * as testTable from '../../datatable/table.js';
import { modal_data, modal } from '../../modal/modal.js';
import { base_url } from '../main.js';

    let family_no = 1;
    let passenger_no = 0;

    $('#pickupForm').submit(function(e){
        e.preventDefault();
        if($('#plate_no').val()=='' ||
        $('#firstname').val()=='' ||
        $('#lastname').val()=='' ||
        $('#vehicle_id').val()==null){
            Swal.fire(
                'WALA NA SUBMIT!',
                `Tarungag Fill up sa form`,
                'error'
            );
        }else{
            let form = $(this).serializeArray(); 
            form.push({
                "name": "total_passenger",
                "value": passenger_no});
    
            $.post(`${base_url}/sdh/save_pickup`, form, function(succ){
                console.log(succ);
                if(succ.status){
                    Swal.fire(
                        'Your form have been submitted!',
                        `Salamat sa pag partisipar aning survey!`,
                        'success'
                      ).then(() => 
                      { 
                        // table.table_obj.ajax.reload();
                        $(`#${modal.id}`).modal('hide');
                          $("#strandedForm")[0].reset();
                      });
                }else{
                    Swal.fire(
                        'Submitting Failed!',
                        `Mumana Kag fill up anih nga form`,
                        'error'
                    );
                } 
            },'json');
        }
        
    });

    $('#strandedForm').submit(function(e){
        e.preventDefault();

        console.log('payts kaayo');
        if($('#firstname').val()=='' ||
         $('#lastname').val()=='' ||
         $('#middlename').val() == '' ||
         $('#DOB').val()=='' ||
         $('#contact').val()=='' ||
         $('#purok_sitio').val()=='' ||
         $('#Q_2_province').val()=='' ||
         $('#Q_2_city').val()=='' ||
         $('#Q_2_barangay').val()=='' ||
         $('#Q_3').val()=='' ||
         $('#Q_5').val()=='' ||
         $('#Q_6').val()=='' ||
         $('#Q_8').val()==''){
            Swal.fire(
                'WALA NA SUBMIT!',
                `Tarungag Fill up sa form`,
                'error'
            );
        }else{
            let form = $(this).serializeArray();
            console.log(form);
            form.push({
                "name": "total_fam",
                "value": family_no});
    
            console.log(form);
    
            $.post(`${base_url}/sdh/sdh/save`, form, function(succ){
                console.log(succ);
                if(succ.status){
                    Swal.fire(
                        'Your form have been submitted!',
                        `Salamat sa pag partisipar aning survey!`,
                        'success'
                      ).then(() => 
                      { 
                        // table.table_obj.ajax.reload();
                        $(`#${modal.id}`).modal('hide');
                          $("#strandedForm")[0].reset();
                      });
                }else{
                    Swal.fire(
                        'WALA NA SUBMIT!',
                        `Humana Kag fill up anih nga form`,
                        'error'
                    );
                } 
            },'json');
        }

        
    });
    $(document).ready(function(){
        $.get(`${base_url}/sdh/get_barangays_digos`, function(succ){
            console.log(succ);
            let html = "";
            for(let i=0; i < succ.length; i++){
                html+= `<option value="${succ[i].brgy_id}">${succ[i].brgy_name}</option>`;
            }
            $('#barangay').append(html);

            
        },'json');

        $.get(`${base_url}/sdh/get_reasons`, function(succ){
            console.log(succ);
            let html = "";
            for(let i=0; i < succ.length; i++){
                html+= `<option value="${succ[i].sel_id}">${succ[i].answer}</option>`;
            }
            $('#Q_4').append(html);
        },'json');

        $.get(`${base_url}/sdh/get_provinces`, function(succ){
            console.log(succ);
            let html = "";
            for(let i=0; i < succ.length; i++){
                html+= `<option value="${succ[i].name}">${succ[i].name}</option>`;
            }
            $('#Q_2_province').append(html);
        },'json');

        $.get(`${base_url}/sdh/get_cities/Abra`, function(succ){
            console.log(succ);
            let html = "";
            for(let i=0; i < succ.length; i++){
                html+= `<option value="${succ[i].name}">${succ[i].name}</option>`;
            }
            $('#Q_2_city').append(html);
        },'json');
        $('#Q_2_province').change(function(){
            console.log($('#Q_2_province').val());
            $.get(`${base_url}/sdh/get_cities/${$('#Q_2_province').val()}`, function(succ){
                console.log(succ);
                let html = "";
                for(let i=0; i < succ.length; i++){
                    html+= `<option value="${succ[i].name}">${succ[i].name}</option>`;
                }
                $('#Q_2_city').append(html);
            },'json');
        });
        $('#btn_add_family').click(function(){

            family_no += 1;

            console.log(family_no);

            let col_md_12 = document.createElement('div');
            col_md_12.classList.add('col-md-12');
            // col_md_12.classList.add('form-inline');

            let form_group = document.createElement('div');
            form_group.classList.add('form-group');
            form_group.classList.add('hdnfamilymember');
              
            form_group.classList.add('row');
            form_group.setAttribute('id', `fam_group_${family_no}`);
            
            let fam_1_first = document.createElement('input');
            fam_1_first.classList.add('form-control');
            fam_1_first.classList.add('col-md-3');
            fam_1_first.setAttribute('type', 'text');
            fam_1_first.setAttribute('name', `fam_${family_no}_firstname`);
            fam_1_first.setAttribute('placeholder', `Firstname`);

            let fam_1_last = document.createElement('input');
            fam_1_last.classList.add('form-control');
            fam_1_last.classList.add('col-md-2');
            fam_1_last.setAttribute('type', 'text');
            fam_1_last.setAttribute('name', `fam_${family_no}_lastname`);
            fam_1_last.setAttribute('placeholder', `Lastname`);

            let fam_1_middlename = document.createElement('input');
            fam_1_middlename.classList.add('form-control');
            fam_1_middlename.classList.add('col-md-2');
            fam_1_middlename.setAttribute('type', 'text');
            fam_1_middlename.setAttribute('name', `fam_${family_no}_middlename`);
            fam_1_middlename.setAttribute('placeholder', `Middlename`);

            let fam_1_age = document.createElement('input');
            fam_1_age.classList.add('form-control');
            fam_1_age.classList.add('col-md-1');
            fam_1_age.setAttribute('type', 'number');
            fam_1_age.setAttribute('name', `fam_${family_no}_age`);
            fam_1_age.setAttribute('placeholder', `Age`);

            let fam_1_relationship = document.createElement('input');
            fam_1_relationship.classList.add('form-control');
            fam_1_relationship.classList.add('col-md-3');
            fam_1_relationship.setAttribute('type', 'text');
            fam_1_relationship.setAttribute('name', `fam_${family_no}_relationship`);
            fam_1_relationship.setAttribute('placeholder', `Relationship`);

            // <input type="text" name="fam_1_firstname" id="" class="form-control" placeholder="Firtname: ">
            // <input type="text" name="fam_1_lastname" id="" class="form-control" placeholder="Lastname: ">
            // <input type="text" name="fam_1_middlename" id="" class="form-control" placeholder="Middlename: ">
            // <input type="number" name="fam_1_age" id="" class="form-control" placeholder="Age: ">
            // <input type="text" name="fam_1_relationship" id="" class="form-control" placeholder="Relationship: "></input>
            
            
            let family_div = document.getElementById('family_div');
            col_md_12.appendChild(form_group);
            form_group.appendChild(fam_1_first);
            form_group.appendChild(fam_1_last);
            form_group.appendChild(fam_1_middlename);
            form_group.appendChild(fam_1_age);
            form_group.appendChild(fam_1_relationship);
            family_div.appendChild(col_md_12);
        });

        $('#btn_minus_family').click(function(){
            console.log(family_no);
            var element = document.getElementById(`fam_group_${family_no}`);
            element.parentNode.removeChild(element);
            family_no -= 1;
        });
    });

    function get_barangays(){
        $.get(`${base_url}/sdh/get_barangays_digos`, function(succ){
            let html = "";
            for(let i=0; i < succ.length; i++){
                html+= `<option value="${succ[i].brgy_id}">${succ[i].brgy_name}</option>`;
            }
            let i = 1;
            while(i <= passenger_no){
                $(`#fam_${i}_barangay`).append(html);
                i++;
            }
        },'json');
        
    }

    $(document).on('change','.Q_7',function(){
        let id = $(this).attr('id');
        console.log('Q7 Select');
        if(id == "Yes"){
            $('#family_div').attr('hidden', false);
        }else{
            $('#family_div').attr('hidden', true);
        }
    });

    $('#Q_4').change(function(){
        console.log($('#Q_4').val());
        if($('#Q_4').val() == "6"){
            console.log('e unhide ang field');
            let q42 = document.getElementById('q42');
            q42.removeAttribute('hidden');
        }else{
            q42.setAttribute('hidden', true
            
            );
        }
    });

    $('#strandedForm :checkbox').change(function(){
        if($(this).is(':checked')){
            $('#btnSubmitForm').attr('disabled', false);
        }else{
            $('#btnSubmitForm').attr('disabled', true);
        }
    });

    function loop_passengers_fields(no){

        passenger_no = no;
        let i = 1;
        
        while(i <= no){

            let col_md_12 = document.createElement('div');
            col_md_12.classList.add('col-md-12');
            // col_md_12.classList.add('form-inline');
            col_md_12.setAttribute('style',"margin-bottom:5px;");

            let form_group = document.createElement('div');
            form_group.classList.add('form-group');
            form_group.classList.add('row');
            form_group.setAttribute('id', `fam_group_${i}`);
            
            let fam_1_first = document.createElement('input');
            fam_1_first.classList.add('form-control');
            fam_1_first.classList.add('col-md-3');
            fam_1_first.setAttribute('type', 'text');
            fam_1_first.setAttribute('name', `fam_${i}_firstname`);
            fam_1_first.setAttribute('placeholder', `Firstname`);

            let fam_1_last = document.createElement('input');
            fam_1_last.classList.add('form-control');
            fam_1_last.classList.add('col-md-3');
            fam_1_last.setAttribute('type', 'text');
            fam_1_last.setAttribute('name', `fam_${i}_lastname`);
            fam_1_last.setAttribute('placeholder', `Lastname`);

            let fam_1_age = document.createElement('input');
            fam_1_age.classList.add('form-control');
            fam_1_age.classList.add('col-md-4');
            fam_1_age.setAttribute('type', 'text');
            fam_1_age.setAttribute('name', `fam_${i}_address`);
            fam_1_age.setAttribute('placeholder', `Address`);

            let fam_1_relationship = document.createElement('select');
            fam_1_relationship.classList.add('form-control');
            fam_1_relationship.classList.add('col-md-2');
            fam_1_relationship.setAttribute('name', `fam_${i}_barangay`);
            fam_1_relationship.setAttribute('id', `fam_${i}_barangay`);

            let br = document.createElement('br');

            // <input type="text" name="fam_1_firstname" id="" class="form-control" placeholder="Firtname: ">
            // <input type="text" name="fam_1_lastname" id="" class="form-control" placeholder="Lastname: ">
            // <input type="text" name="fam_1_middlename" id="" class="form-control" placeholder="Middlename: ">
            // <input type="number" name="fam_1_age" id="" class="form-control" placeholder="Age: ">
            // <input type="text" name="fam_1_relationship" id="" class="form-control" placeholder="Relationship: "></input>
            
            let family_div = document.getElementById('passengers');
            form_group.appendChild(fam_1_first);
            form_group.appendChild(fam_1_last);
            form_group.appendChild(fam_1_age);
            form_group.appendChild(fam_1_relationship);

            col_md_12.appendChild(form_group);
            family_div.appendChild(col_md_12);

            family_div.appendChild(br);

            i++;
        }
    }

    $('#vehicle_id').change(function(){

        let vehicle = $("#vehicle_id option:selected").html();
        let arr1 = vehicle.split("-");
        let vehicle_no = arr1[1].split(' ');

        $('#passengers').html(`<div class="col-md-12">
        <label for=""><u>Passengers</u></label>
    </div>`);
        loop_passengers_fields(vehicle_no[1]);
        get_barangays();

            
    });
