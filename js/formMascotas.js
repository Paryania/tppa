
class FormMascotas {
   
    constructor() {
        this.form = document.getElementById('formMascotas');
    }

    validoInputsIndividual() {
        let formValido = true;

        const usuario = document.getElementById('usuario');

            if (usuario.value.trim() === '' || usuario.value.trim()!=='fcytuader') {
                usuario.classList.add('is-invalid');
                usuario.classList.remove('is-valid');
                formValido = false;
            } else {
                usuario.classList.add('is-valid');
                usuario.classList.remove('is-invalid');
            }

        const contrasenia = document.getElementById('contrasenia');
        
        if (contrasenia.value.trim() == '' || contrasenia.value.trim()!=='programacionavanzada') {
            contrasenia.classList.add('is-invalid');
            contrasenia.classList.remove('is-valid');
            formValido = false; //estaba en true
        } else {
            contrasenia.classList.add('is-valid');
            contrasenia.classList.remove('is-invalid');
           // formValido = true;
        }
        return formValido;
    }

    validoInputsArray(){
        this.inputs = Array.from(this.form.elements).filter(element => element.tagName === 'INPUT');
        let formValido = true;
        this.inputs.forEach(input => {
            let esValido = true;
            if (input.id === 'usuario') {
                if (input.value.trim() === '' || input.value.trim()!=='fcytuader') {
                    esValido = false;
                }
            } else if (input.id === 'contrasenia') {
                if (input.value.trim() === '' || input.value.trim()!=='programacionavanzada') {
                    esValido = false;
                }
            } else {
                if (input.value.trim() === '') {
                    esValido = false;
                }
            }
           
        return formValido;
    }


   


    init() {

        this.form.addEventListener('submit', (event) => {
            event.preventDefault();
            if ( this.validoInputsIndividual()==true ) {
                
                this.form.submit();
            }
        });
    }

}


window.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('formMascotas')) {
        new FormMascotas().init();
    }
});