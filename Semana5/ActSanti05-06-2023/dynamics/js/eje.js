window.addEventListener("load",()=>{
    let btnYes=document.querySelector('#yes');
    let btnNo=document.querySelector('#no');
    let contenedor=document.querySelector('#contenedor');
    let contador=0;

    btnNo.addEventListener("mouseover",()=>{
        if(contador==0){
            contenedor.removeChild(btnNo);
            document.body.appendChild(btnNo);
            contador++;
            btnNo.style.position="absolute";
        }
        let x = Math.floor(Math.random()*window.innerWidth);
        let y = Math.floor(Math.random()*window.innerHeight);
        btnNo.style.left=x+"px";
        btnNo.style.top=y+"px";
    });
    btnYes.addEventListener("click",()=>{
        alert("Tamo uwu");
    });
    btnNo.addEventListener("click",()=>{
        alert("MORIRÁS,HDP");
    });
});
