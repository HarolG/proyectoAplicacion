$(document).ready(function () {
    boton_paz = $('#btn_pazysalvo');
    cuadro = $('#cuadro');
    $(cuadro).hide(0);

    $(boton_paz).click(function (e) { 
        $(cuadro).slideToggle(500);
    });
});

// const formulario = document.getElementById("frm_1");
// const html = document.body;

// formulario.addEventListener("submit", (e) => {
//     e.preventDefault();
//     let datos = new FormData(formulario)

//     fetch("../paz_y_salvo/php/consultar.php", {
//         method: 'POST',
//         body: datos
//     })
//     .then(resp => resp.ok ? resp.json(): Promise.reject(resp))
//     .then(data => {
//         if(data === "ok") {
//             alert("El aprendiz digitado no existe \no no está en estado Por Certificar")
//         } else {
//             console.log(data);
//             const texto = `
//             <div class="contenedor">
//             <div class="contenedor_header">
//                 <div class="header_logo">
//                     <img src="../imagenes/sigasena.jpg" alt="" width="250">
//                 </div>
//                 <div class="header_titulo">
//                     <h3>SERVICIO NACIONAL DE APRENDIZAJE SENA</h3>
//                     <h3>PROCEDIMIENTO CERTIFICACIÓN ACADÉMICA</h3>
//                     <h3>FORMATO PAZ Y SALVO ACADÉMICO ADMINISTRATIVO</h3>
//                 </div>
//             </div>
//             <div class="paz_datos">
//                 <div class="datos_paz">
//                    <div>
//                         <div>
//                             <p>LUGAR:</p></div>
//                         <div>
//                             <p>FECHA DILIGENCIAMIENTO:</p>
//                         </div>
//                         <div>
//                             <p>CENTRO DE FORMACION:</p>
//                         </div>
//                         <div>
//                             <p>REGIONAL:</p>
//                         </div>
//                    </div>
//                     <div class="datos_paz-lineas">
//                         <div>
//                             <p>${data.nom_region}</p>
//                         </div>
//                         <div>
//                             <p>14/11/2020</p>
//                         </div>
//                         <div>
//                             <p>${data.nom_cen_forma}</p>
//                         </div>
//                         <div>
//                             <p>${data.nom_region}</p>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="paz_datos-usuario">
//                 <div class="datos_usuario-header">
//                     <h5>DATOS BÁSICOS DEL APRENDIZ</h5>
//                 </div>
//                 <div class="contenedor-columnas">
//                     <div class="datos_usuario-columna1">
//                         <div>
//                             <p>NOMBRES:</p>
//                             <p>${data.nombre_aprend}</p>
//                         </div>
//                         <div>
//                             <P>APELLIDOS</P>
//                             <p>${data.apellido_aprend}</p>
//                         </div>
//                         <div>
//                             <P>CORREO ELECTRONICO </P>
//                             <p>${data.correo_aprend}</p>
//                         </div>
//                         <div>
//                             <P>PROGRAMA DE FORMACION </P>
//                             <p>${data.nom_formacion}</p>
//                         </div>
//                         <div>
//                             <P>NIVEL DE FORMACIÓN</P>
//                             <p>Tecnologo</p>
//                         </div>
//                         <div>
//                             <P>NÚMERO DE FICHA </P>
//                             <p>${data.num_ficha}</p>
//                         </div>
//                     </div>
//                     <div class="datos_usuario-columna2">
//                         <div>
//                             <P>TIPO DOCUMENTO DE IDENTIDAD</P>
//                             <p>${data.nom_docu}</p>
//                         </div>
//                         <div>
//                             <P>NUMERO DOCUMENTO DE IDENTIDAD</P>
//                             <p>${data.id_aprend}</p>
//                         </div>
//                         <div>
//                             <P>FECHA Y LUGAR DE EXPEDICIÓN</P>
//                             <p>Ibagué, Tolima</p>
//                         </div>
//                         <div>
//                             <P>DIRECCIÓN DE DOMICILIO</P>
//                             <p>${data.direccion}</p>
//                         </div>
//                         <div>
//                             <P>TELEFONO FIJO DE CONTACTO</P>
//                             <p>${data.telefono_aprend}</p>
//                         </div>
//                         <div>
//                             <P>NÚMERO CELULAR</P>
//                             <p>${data.num_celular}</p>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//             <div class="paz_responables">
    
//                 <!-- Filas -->
    
//                 <!-- Funcionarios -->
//                 <div class="columna1">
//                     <div class="fila">
//                         <p class="centrar">FUNCIONARIOS QUE INTERVIENEN EN EL DILIGENCIAMIENTO</p>
//                     </div>
//                     <div class="fila">
//                         <p>COORDINADOR ACADEMICO</p>
//                     </div>
//                     <div class="fila">
//                         <p class="centrar">INSTRUCTOR SEGUIMIENTO ETAPA PRODUCTIVA</p>
//                     </div>
//                     <div class="fila">
//                         <p class="centrar">RESPONSABLE BIENESTAR AL APRENDIZ</p>
//                     </div>
//                     <div class="fila">
//                         <p class="centrar">RESPONSABLE AGENCIA PUBLICA DE EMPLEO</p>
//                     </div>
//                     <div class="fila">
//                         <p>BIBLIOTECA</p>
//                     </div>
//                     <div class="fila"></div>
//                 </div>
    
//                 <!-- marcar con x -->
//                 <div class="columna2">
//                     <div class="fila">
//                         <p class="centrar">Marcar con X</p>
//                     </div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                 </div>
    
//                 <!-- Descripcion -->
//                 <div class="columna3">
//                     <div class="fila-especial">
//                         <div class="fila-especial1"></div>
//                         <div class="fila-especial2">
//                             <p>DESCRIPCIÓN DEL TRAMITE</p>
//                         </div>
//                     </div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                 </div>
    
//                 <!-- Nombres y apellidos -->
//                 <div class="columna4">
//                     <div class="fila-especial">
//                         <div class="fila-especial3">
//                             <p>RESPONSABLES</p>
//                         </div>
//                         <div class="fila-especial4">
//                             <p>NOMBRES Y APELLIDOS COMPLETOS</p>
//                         </div>
//                     </div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                 </div>
    
//                 <!-- Firmas -->
//                 <div class="columna5">
//                     <div class="fila-especial">
//                         <div class="fila-especial5"></div>
//                         <div class="fila-especial6">
//                             <p>FIRMA</p>
//                         </div>
//                     </div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                     <div class="fila"></div>
//                 </div>
//             </div>
//             <div class="paz_firma-aprendiz">
    
//             </div>
//             <div class="contenedor_footer"></div>
//         </div>`;
//         html.innerHTML = texto;
//         }
//     })
//     .catch(error => console.error(error));
// })
