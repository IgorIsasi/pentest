const formulario=document.getElementById('formulario');


function betetaDago(campo){ 
    return document.getElementById(campo).value.length>=1;
}
        



formulario.addEventListener('submit', (e)=>{ // Lo que se activa cuando el formulario es enviado //Para evitar que sea enviado
    if(!betetaDago('email') || !betetaDago('pasahitza') ){
        e.preventDefault();
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }else{
        document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
    }
})



