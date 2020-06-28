import * as ser from '../jquery.serializeToJSON.js';

export const base_url = window.location.origin;
export const location_path = window.location.pathname;


    $('#developerForm').submit(function(e)
    {
        e.preventDefault();
        console.log(`Developer's Form`);

        $.post(`${base_url}/main/login/loginDeveloper`, $(this).serialize(), function(data)
        {

            if(data.res)
            {
                console.log('successfully login!');
                Swal.fire(
                    'Success Login!',
                    `You will now be directed to developer's page`,
                    'success'
                  ).then(() => 
                  { 
                    window.location.href= base_url+'/developer/';
                  });
            }
            else
            {
                Swal.fire(
                    'Login Failed!',
                    `Your email and password do not match`,
                    'warning'
                  );
            }
        },'json');

    });

    $('#adminForm').submit(function(e)
    {
        e.preventDefault();
        console.log(`Admin's Form`);
        // console.log($(this).serialize());
        $.post(`${base_url}/main/login/loginAdmin`, $(this).serialize(), function(data)
        {
            if(data.res)
            {
                console.log('successfully login!');
                Swal.fire(
                    'Success Login!',
                    `You will now be directed to Administrator's page`,
                    'success'
                  ).then(() => 
                  { 
                    window.location.href= base_url+'/admin/profile';
                  });
            }
            else
            {
                console.log('login failed!');
                Swal.fire(
                    'Login Failed!',
                    `Your email and password do not match`,
                    'warning'
                  );
            }
        },'json');
    });
