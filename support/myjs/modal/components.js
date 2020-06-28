export class Components{
    constructor(data){

        this.modal = document.createElement('div');
        this.modal.classList.add('modal');
        this.modal.classList.add('fade');

        this.modal_dialog = document.createElement('div');
        this.modal_dialog.classList.add('modal-dialog');

        this.modal_content = document.createElement('div');
        this.modal_content.classList.add('modal-content');

        this.modal_header = document.createElement('div');
        this.modal_header.classList.add('modal-header');

        this.modal_title = document.createElement('h4');
        this.modal_title.classList.add('modal-title');
        this.modal_title.classList.add('text-white');

        this.x_button = document.createElement('button');
        this.x_button.classList.add('close');
        this.x_button.setAttribute('data-dismiss', 'modal');
        this.x_button.setAttribute('aria-label', 'Close');

        this.x_span = document.createElement('span');
        this.x_span.setAttribute('aria-hidden', true);
        this.x_span_text = document.createTextNode('x');

        this.modal_body = document.createElement('div');
        this.modal_body.classList.add('modal-body');

        this.modal_footer = document.createElement('div');
        this.modal_footer.classList.add('modal-footer');
    }

    createModal(parent){
        
        // Set Customization . . . 
        this.modal.setAttribute('id', this.id);
        this.modal_header.classList.add(`${ this.type }`);
        this.modal_title_text = document.createTextNode(`${ this.title }`);
        this.modal_dialog.classList.add(`${ this.size }`);


        this.modal_title.appendChild(this.modal_title_text);
        this.modal_header.appendChild(this.modal_title);

        this.x_span.appendChild(this.x_span_text);
        this.x_button.appendChild(this.x_span);
        this.modal_header.appendChild(this.x_button);
        
        this.modal_content.appendChild(this.modal_header);
        // this.modal_content.appendChild(this.modal_footer);
        this.modal_content.appendChild(this.modal_body);
        this.modal_dialog.appendChild(this.modal_content);
        this.modal.appendChild(this.modal_dialog);

        parent.appendChild(this.modal);
    }
}