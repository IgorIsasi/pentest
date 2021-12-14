const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const espresioak={
    izena: /^[a-zA-Z]{4,15}$/,
    nan: /^\d{8}[A-Z]$/, // 7 a 14 numeros.
	abizenak: /^[a-zA-Z\s]{5,40}$/, // Letras y espacios, pueden llevar acentos.
	pasahitza: /^.{8,20}$/, // 4 a 12 digitos.
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefonoa: /^\d{9}$/, // 7 a 14 numeros.
    jaiotzeData: /^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/
}

const hutsuneenEgoera={
    izena:false,
    abizenak:false,
    jaiotzeData:false,
    nan:false,
    pasahitza:false,
    pasahitza2:false,
    email:false,
    telefonoa:false

}

const erregistroaOnartu=(e)=>{
    switch(e.target.name){
        case "izena":
            hutsuneaOnartu(espresioak.izena, e.target, 'izena');
        break;
        case "abizenak":
            hutsuneaOnartu(espresioak.abizenak, e.target, 'abizenak');
        break;        
        case "nan":
            hutsuneaOnartu(espresioak.nan, e.target, 'nan');
        break;
        case "pasahitza":
            hutsuneaOnartu(espresioak.pasahitza, e.target, 'pasahitza');        
            pasahitza2Onartu();
        break;
        case "pasahitza2": 
        //Kasu honetan pasahitza errepikatua ez du beste inputen era berean jokatzen
            pasahitza2Onartu();
                    
        break;
        case "telefonoa":
            hutsuneaOnartu(espresioak.telefonoa, e.target, 'telefonoa');
        break;
        case "jaiotzeData":
            hutsuneaOnartu(espresioak.jaiotzeData, e.target, 'jaiotzeData');
        break;
        case "email":
            hutsuneaOnartu(espresioak.email, e.target, 'email');
        break;
    }
    
}

const pasahitza2Onartu=()=>{
    const inputPasahitza1=document.getElementById('pasahitza');
    const inputPasahitza2=document.getElementById('pasahitza2');
    if(inputPasahitza1.value==inputPasahitza2.value){
        document.getElementById(`grupo__pasahitza2`).classList.remove('formulario__grupo-incorrecto');
        document.querySelector(`#grupo__pasahitza2 i`).classList.remove('fa-times-circle');
        document.getElementById(`grupo__pasahitza2`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__pasahitza2 i`).classList.add('fa-check-circle');            
        document.querySelector(`#grupo__pasahitza2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
        hutsuneenEgoera['pasahitza2']=true
    }else{
        document.getElementById(`grupo__pasahitza2`).classList.add('formulario__grupo-incorrecto');
        document.querySelector(`#grupo__pasahitza2 i`).classList.add('fa-times-circle');
        document.getElementById(`grupo__pasahitza2`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__pasahitza2 i`).classList.remove('fa-check-circle');            
        document.querySelector(`#grupo__pasahitza2 .formulario__input-error`).classList.add('formulario__input-error-activo');
        hutsuneenEgoera['pasahitza2']=false
    }


}

const hutsuneaOnartu=(expresion,input,campo)=>{
    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');            
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        hutsuneenEgoera[campo]=true;
    }else{
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        hutsuneenEgoera[campo]=false;
    }
}


inputs.forEach((input)=>{ 
    //Zerbai input batean aldatzen bada validarFormulario() funtzioa
    //exekutatuko da. Baita input-aren kanpoan klik egiten bada.
    input.addEventListener('keyup',erregistroaOnartu);
    input.addEventListener('blur',erregistroaOnartu);
    
})

formulario.addEventListener('submit', (e)=>{ // Lo que se activa cuando el formulario es enviado //Para evitar que sea enviado
    if(hutsuneenEgoera.izena && hutsuneenEgoera.abizenak && hutsuneenEgoera.jaiotzeData && hutsuneenEgoera.nan && 
        hutsuneenEgoera.pasahitza && hutsuneenEgoera.pasahitza2 && hutsuneenEgoera.email && hutsuneenEgoera.telefonoa){
            document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
            setTimeout(()=>{
                document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
                document.querySelectorAll('.formulario__grupo-correcto').forEach((icono)=>{
                    icono.classList.remove('formulario__grupo-correcto');
                })
            }, 1500);
        hutsuneenEgoera.izena=false;
        hutsuneenEgoera.abizenak=false;
        hutsuneenEgoera.jaiotzeData=false;
        hutsuneenEgoera.nan=false;
        hutsuneenEgoera.pasahitza=false;
        hutsuneenEgoera.pasahitza2=false;
        hutsuneenEgoera.email=false;
        hutsuneenEgoera.telefonoa=false;
    
        document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        
    }else{
        e.preventDefault();
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        
    }
})