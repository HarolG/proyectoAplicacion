// varibles 

const boton = document.getElementById("boton")
const documento = document.getElementById("documento")
const btnEmpresa = document.getElementById("btnEmpresa")
const btnLegalizar = document.getElementById("btnLegalizar")
const formularioEmpresa = document.querySelector(".registroEmpre")
const formularioLegalizacion = document.querySelector(".registroLegal")


// FUNCIONES 
function formulegalizar(e) {
    e.preventDefault();
    formularioLegalizacion.style.display ="block"
    
}

function formuEmpresa(e) {
    e.preventDefault();
    formularioEmpresa.style.display = "block"
    
}

function consulta(e) {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    const docuBase = documento.value 
    xhr.open("get","../php/aprendiz.php?documento=" + docuBase,true)
    xhr.onreadystatechange = function () {
        if(xhr.readyState == 4 && xhr.status == 200){
            const info = document.querySelector("#informa")
            info.innerHTML = xhr.responseText;
        }
    }
    xhr.send()
}



// EVENTOS 
btnLegalizar.addEventListener("click", formulegalizar)
btnEmpresa.addEventListener("click", formuEmpresa)
boton.addEventListener("click", consulta)