window.addEventListener("load", ()=>{
    const objeto = document.getElementById("objeto");
    const borrar = document.getElementById("borrar");
    
    objeto=addEventListener("click",()=>{
        alert("Hola soy un evento de tipo click");
    });
    borrar=addEventListener("click",()=>{
        alert("Borro tu evento UnU");
        objeto.removeEventListener("click");
    });
});
