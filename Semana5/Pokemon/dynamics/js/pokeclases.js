/*-------------------------- !&INFO GENERAL --------------------------
    ---ataques físicos posibles: 
        Ataque frontal
        Ataque lateral
        Perforación con cornamenta
        Garrazo
        Mordida aniquiladora 
        Puñetazo (normal, potente, destructor)
        Carrera

    ---ataques especiales 
        =>oscuro{Destrucción absoluta: ojo de la perdición 
        Sombra oscurecedora
        Luna negra}
        =>fuego{Aliento de dragón 
        Aro de fuego
        Aura infernal}
        =>hielo{Aliento de hielo
        Carámbano perforante
        Corazón helado}
        =>eléctrico{Relámpago centelleante
        Luz cegadora 
        Esfera eléctrica}
        
    ---Función daño 0.01x85[([0.2xN+1]xAxP)/25+D]
        N=Nivel del Pokémon que ataca 
        A=Ataque/Ataque especial del Pokémon que ataca 
        D=Defensa/Defensa especial del Pokémon que recibe el ataque 
        P= Potencia del movimiento 

*/
//Son mínimo, 2 entrenadores, 4 Pokémon y 4 movimientos
/*-------------------------- !&CLASES --------------------------*/
class pokemon{
    constructor(...caracP){
        this.name=caracP[0];
        this.HP=caracP[1];
        this.attack_1=caracP[2];
        this.attack_2=caracP[3];
        this.base_defense=caracP[4];
        this.base_attack=caracP[5];
        this.speed=caracP[6];
        this.level=caracP[7];
        this.type=caracP[8];
        //requiere tener 4 movimientos; 2 especial y 2 normalitos UwU
        //potencia, probabilidad y tipo(mov)
    }
    level_stats(level){
        if(level<=100&&level>0)
        {
            for(let i=1;i<=level;i++)
            {   
                caracP[1]+=20;//health
                caracP[4]+=2;//defense
                caracP[5]+=30;//ataque  base
                caracP[6]+=10;//speed
            }
        }else{
            console.log("Nivel imposible");
        }
    }
}
class elemental extends pokemon{
    constructor(...typeC_E){
        super(...arguments);
        this.special_attack_1=typeC_E[0];
        this.special_attack_2=typeC_E[1];
    }
}
class entrenador{
    constructor(...caracE){
        this.name=caracE[0];
        this.region=caracE[1];
        this.trophies=caracE[2];
        this.team=caracE[3];
    }
    present(){
        console.log(`Soy el entrenador ${this.name} de la región ${this.region}. ¡He venido a derrotarte!`);
    }
    info(){
        console.log(`El entrenador del equipo ${this.team} cuenta con ${this.trophies} trofeos`)
    }
}
/*-------------------------- !&FUNCIONES --------------------------*/

function getRandomInt(min, max) {//SÍ incluye a min; NO incluye a MAX. mejor round. ahorita checo
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min); // The maximum is exclusive and the minimum is inclusive
}
function attack_selector(pokemon,type){
    for(let i=0;i<=1;i++){
        let random_attack=getRandomInt(0,6)
        if(random_attack==0){
            pokemon.caracP[2+i]='Ataque frontal (1.0)';
        }else if(random_attack==1){
            pokemon.caracP[2+i]='Ataque lateral (1.3)';
        }else if(random_attack==2){
            pokemon.caracP[2+i]='Perforación con cornamenta (1.8)';
        }else if(random_attack==3){
            pokemon.caracP[2+i]='Garrazo (0.7)';
        }else if(random_attack==4){
            pokemon.caracP[2+i]='Mordida aniquiladora (3.0)';
        }else if(random_attack==5){
            pokemon.caracP[2+i]='Carrera (2.0)';
        }  
        let random_special_attack=getRandomInt(0,3);
        if(random_special_attack==0){
            if(type==1){
                pokemon.typeC_E[0+i]='Destrucción absoluta: ojo de la perdición (6.0)';
            }else if(type==2){
                pokemon.typeC_E[0+i]='Aliento de dragón (3.8)';
            }else if(type==3){
                pokemon.typeC_E[0+i]='Aliento de hielo (3.8)';
            }else if(type==4){
                pokemon.typeC_E[0+i]='Relámpago centelleante (3.4)';
            }
        }else if(random_special_attack==1){
            if(type==1){
                pokemon.typeC_E[0+i]='Sombra enloquecedora (0.9)';
            }else if(type==2){
                pokemon.typeC_E[0+i]='Aro de fuego (2.2)';
            }else if(type==3){
                pokemon.typeC_E[0+i]='Corazón helado (4.5)';
            }else if(type==4){
                pokemon.typeC_E[0+i]='Luz cegadora (2.0)';
            }
        }else if(random_special_attack==2){
            if(type==1){//oscuro
                pokemon.typeC_E[0+i]='Luna negra (2.0)';
            }else if(type==2){
                pokemon.typeC_E[0+i]='Aura infernal (5.0)';
            }else if(type==3){
                pokemon.typeC_E[0+i]='Carámbano perforante (4.0)';
            }else if(type==4){
                pokemon.typeC_E[0+i]='Esfera eléctrica (4.6)';
            }
        }
    }
}
/*---Función daño 0.01x85[([0.2xN+1]xAxP)/25+D]
N=Nivel del Pokémon que ataca 
A=Ataque/Ataque especial del Pokémon que ataca 
D=Defensa/Defensa especial del Pokémon que recibe el ataque 
P= Potencia del movimiento */
function damage_calculation(pokemonA,pokemonD){
    let defense=pokemonD.caracP[4];
    let attack=pokemonA.caracP[5];
    let speed=pokemonA.caracP[6];
    let level=pokemonA.caracP[7];
    let typeA=pokemonA.carac[8];
    let typeD=pokemonD.carac[8];

    if(typeA==1&&typeD==2){//oscuro ataca, fuego defiende
        defense+=15;    
    }else if(typeA==2&&typeD==1){//fuego ataca, oscuro defiende 
        defense-=15;   
    }else if(typeA==1&&typeD==3){//oscuro ataca, hielo defiende
        defense+=5;  
    }else if(typeA==3&&typeD==1){//hielo ataca, oscuro defiende 
        defense-=5;
    }else if(typeA==1&&typeD==4){//oscuro ataca, eléctrico defiende
        defense+=10;
    }else if(typeA==4&&typeD==1){//eléctrico ataca, oscuro defiende 
        defense-=10;
    }else if(typeA==2&&typeD==3){//fuego ataca, hielo defiende
        defense-12;
    }else if(typeA==3&&typeD==2){//hielo ataca, fuego defiende 
        defense-=12;
    }else if(typeA==2&&typeD==4){//fuego ataca, eléctrico defiende
        defense+=2;
    }else if(typeA==4&&typeD==2){//eléctrico ataca, fuego defiende
        defense-=7;
    }else if(typeA==3&&typeD==4){//hielo ataca, eléctrico defiende 
        defense-=15;
    }else if(typeA==4&&typeD==3){//eléctrico ataca, hielo defiende 
        defense+=20;
    }

    let damage = 0.01*85*((((0.2*level)+1)*attack*speed)/(25+defense))
    return damage;
}
/*      this.name=caracP[0];
        this.HP=caracP[1];
        this.attack_1=caracP[2];
        this.attack_2=caracP[3];
        this.base_defense=caracP[4];
        this.base_attack=caracP[5];
        this.speed=caracP[6];
        this.level=caracP[7];
        this.type=caracP[8]; 
        
        super(caracP);
        this.special_attack_1=typeC_E[0];
        this.special_attack_2=typeC_E[1];
        caracP[8]=4;
*/
/*-------------------------- !&PRINCIPAL --------------------------*/       
// console.log(getRandomInt(0,10));
// console.log(getRandomInt(0,10));

//let pokemon1 = new pokemon()

console.log("Bienvenidx");
let pokemon1 = new pokemon('jii',55,'a','a','bd','ba','s','l',1,);
let pokemon2 = new elemental('jiji',55,'a','a','bd','ba','speed','l',1,'sa','sa');
console.log(pokemon2);
console.log(pokemon1);
console.log("ya entiendo algo");
/*
    cositas para mañana: 
        funcion de selección de opciones 
        seleccion de items, que estarán en la tienda para combatir
            algo así como project zomboid
            ANIMADOS
        sistema de recompensa por ganar batallas
        seleccion aleatoria de pokemones
            5 pokemones basicos o 3 elementales

*/