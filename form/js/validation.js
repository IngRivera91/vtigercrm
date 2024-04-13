function validaFormulario() {
    let validar = true;

    let expRegNombre= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
    let expRegApellidos= /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
    var expRegCorreo=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var expRegTelefono= /^[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){3}|(\d{2}[\*\.\-\s]){4}|(\d{4}[\*\.\-\s]){2})|\d{8}|\d{10}|\d{12}$/;

    let formulario = document.getElementById("form");
    let nombre = document.getElementById("first_name");
    let apellidos = document.getElementById("last_name");
    let correo = document.getElementById("email");
    let telefono = document.getElementById("phone_number");

    if(!nombre.value) {
        alert("El campo nombre es requerido");
        nombre.focus();
        validar = false;
    }

    else if (!expRegNombre.test(nombre.value) && validar) {
        alert("El campo nombre admite letras y espacios");
        apellidos.focus();
        validar = false;
    }

    else if (!apellidos.value && validar) {
        alert("El campo apellido es requerido");
        apellidos.focus();
        validar = false;
    }

    else if (!expRegApellidos.test(apellidos.value) && validar) {
        alert("El campo apellido admite letras y espacios");
        apellidos.focus();
        validar = false;
    }

    else if (!correo.value && validar) {
        alert("El campo correo es requerido");
        correo.focus();
        validar = false;
    }

    else if (!expRegCorreo.test(correo.value) && validar) {
        alert("Ingrese un correo valido");
        correo.focus();
        validar = false;
    }

    else if (!telefono.value && validar) {
        alert("El campo telefono es requerido");
        telefono.focus();
        validar = false;
    }

    else if (!expRegTelefono.test(telefono.value) && validar) {
        alert("Ingrese un telefono valido");
        telefono.focus();
        validar = false;
    }

    if(validar) {
        formulario.submit();
    }

}
