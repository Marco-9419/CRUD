const btnSignIn = document.querySelector("#btnSignIn");
const email = document.querySelector("#login");
const password = document.querySelector("#password");
const formulario = document.querySelector("#formulario");
const signUp = document.querySelector("#signUp");

// Variable para validar correo elecrtonico
const er = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

email.addEventListener('blur', validarCorreo);
password.addEventListener('blur', validarCorreo);
btnSignIn.addEventListener("click", validarCorreo);

// signUp.addEventListener('click', cambiarSignUp);

function validarCorreo(e){

    // if(email.value == "" || password.value == "" ) { 
    //     alert("Tienes que llenar todos los campos");

    // }else 
    if (e.target.type === 'email') {


     if (er.test(e.target.value)) {


            console.log(formulario.attributes.ownerElement)

            


        } else {

            e.target.style.borderColor = 'red'
            alert('Email no valido')


        }


    }
}

// function cambiarSignUp(){

//     href = "file:///C:/Users/PC/Desktop/Organaizador%20de%20Tareas/assets/prueba.html#"

// }
