var alumnos=5,sentimientos="felicidad";//variable global
const PI="3.1416";
let mentores=17;//es una variable de bloque; se elimina en el momento que un proceso se finaliza, como if, while,etc.

// on.document("click")=>{

// }; ESTO ES UN EVENTO, PERO SEPA CÓMO FUNCIONA xd

console.log(Number(alumnos));//se usa exactamente igual que echo, con todo y concatenación, pero con +

/*
INFO GENERAL
    CAST
        Number();=>cambio de cadena a num
        Boolean();=>cambio a bool
        Number.toString();=>muy descriptivo
    OPERADORES
        Concatenación: +
        Mat: 
            +, += ++
            - [lo mismo arriba es aplicable abajo]
            /
            *
            **
            %
    Estructura condicional
        else if: si la cond1 no se cumple, entonces el else se aplica, pero con una condición conjunta
            if(cond1){
            }
            else if(cond2){
                }

            
*/
class objetocualquiera{
    var1="Soy una variable";
    var2=2;
}
let objeto= new objetocualquiera();
console.log(objeto);