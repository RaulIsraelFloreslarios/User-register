function validar(){
    var nombre, apellidos, correo, usuario, clave, telefono;
    var expresion;
    
    nombre = document.getElementById("nombre").value;
    apellidos = document.getElementById("apellidos").value;
    correo = document.getElementById("correo").value;
    usuario = document.getElementById("usuario").value;
    clave = document.getElementById("clave").value;
    telefono = document.getElementById("telefono").value;

    expresion = /\w+@\w+\.[a-zA-Z]{2,6}/;


 //validamos que no haya campos vacios
 if(nombre === "" || apellidos === "" || correo === "" || usuario === "" || clave === "" || telefono === ""){
    alert("Llene todos los campos");
    return false;
}

    //validamos la longitud de lo campos
    
    if(nombre.length>100){
        alert("El nombre es demasiado largo");
        return false;
    }
    else if(apellidos.length>100){
        alert("El apellidos es demasiado largo");
        return false;
    }

    else if(correo.length>100){
        alert("El correo es demasiado largo");
        return false;
    }
    if(!expresion.test(correo)){
        alert("El correo no es valido");
        return false;
    }

    else if(usuario.length>20){
        alert("El usuario es demasiado largo");
        return false;
    }
    else if(clave.length>10){
        alert("La clave es demasiado larga");
        return false;
    }
    else if(telefono.length>10 || telefono.length<10){
        alert("La longitud del telefono no es correcta");
        return false;
    }
    else if(isNaN(telefono)){
        alert("Ingrese un número de telefono");
        return false;
    }


}//cierra funcion validar