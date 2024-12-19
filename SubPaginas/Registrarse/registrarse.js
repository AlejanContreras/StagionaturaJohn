
function verificar() {
    var contraseña = document.getElementById("contraseña").value;
    var verificacion = document.getElementById("verificacionContraseña").value;

    if (contraseña === "" || verificacion === "") {
        alert("Rellene todos los espacios");
    } else if (contraseña === verificacion) {
        document.getElementById("continuar").innerHTML = "CONTINUAR";
    } else {
        alert("Verificar contraseña");
    }
}