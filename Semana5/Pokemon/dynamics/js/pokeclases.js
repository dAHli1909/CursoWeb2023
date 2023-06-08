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
        /*for(let i=0;i<=8;i++){
            caracP[i]=0;
        }*/
        this.HP=this.base_defense=this.base_attack=this.speed=0;
        this.level=level;
        if(level<=100&&level>0)
        {
            for(let i=1;i<=level;i++)
            {   
                this.HP+=150;//health
                this.base_defense+=2;//defensa base
                this.base_attack+=30;//ataque base
                this.speed+=10;//speed
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

/*---Función daño 0.01x85[([0.2xN+1]xAxP)/25+D]
N=Nivel del Pokémon que ataca 
A=Ataque/Ataque especial del Pokémon que ataca 
D=Defensa/Defensa especial del Pokémon que recibe el ataque 
P= Potencia del movimiento */
function attack_selector(pokemon,type){
    for(let i=0;i<=1;i++){
        let random_attack=getRandomInt(0,6)
        //console.log(random_attack);
        let ataque, ataque_esp;//solamente las declaro para después usarlas abajo
        if(random_attack==0){
            ataque='Ataque frontal (1.0)';
        }else if(random_attack==1){
            ataque='Ataque lateral (1.3)';
        }else if(random_attack==2){
            ataque='Perforación con cornamenta (1.8)';
        }else if(random_attack==3){
            ataque='Garrazo (0.7)';
        }else if(random_attack==4){
            ataque='Mordida aniquiladora (3.0)';
        }else if(random_attack==5){
            ataque='Carrera (2.0)';
        } 
        if(i==0){
            pokemon.attack_1 = ataque;
        }else{
            pokemon.attack_2 = ataque;
        } 
        if(type!=0){
            let random_special_attack=getRandomInt(0,3);
            if(random_special_attack==0){
                if(type==1){
                    ataque_esp='Destrucción absoluta: ojo de la perdición (6.0)';
                }else if(type==2){
                    ataque_esp='Aliento de dragón (3.8)';
                }else if(type==3){
                    ataque_esp='Aliento de hielo (3.8)';
                }else if(type==4){
                    ataque_esp='Relámpago centelleante (3.4)';
                }
            }else if(random_special_attack==1){
                if(type==1){
                    ataque_esp='Sombra enloquecedora (0.9)';
                }else if(type==2){
                    ataque_esp='Aro de fuego (2.2)';
                }else if(type==3){
                    ataque_esp='Corazón helado (4.5)';
                }else if(type==4){
                    ataque_esp='Luz cegadora (2.0)';
                }
            }else if(random_special_attack==2){
                if(type==1){//oscuro
                    ataque_esp='Luna negra (2.0)';
                }else if(type==2){
                    ataque_esp='Aura infernal (5.0)';
                }else if(type==3){
                    ataque_esp='Carámbano perforante (4.0)';
                }else if(type==4){
                    ataque_esp='Esfera eléctrica (4.6)';
                }
            }
            if(i==0){
                pokemon.special_attack_1 = ataque_esp;
            }else{
                pokemon.special_attack_2 = ataque_esp;
            } 
        }
        
    }
}
function damage_calculation(pokemonA,pokemonD){
let defense=pokemonD.base_defense;
let attack=pokemonA.base_attack;
let speed=pokemonA.speed;
let level=pokemonA.level;
let typeA=pokemonA.type;
let typeD=pokemonD.type;

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
return Math.round(damage);
}
function fight(pokemon1,pokemon2){
    let daño=damage_calculation(pokemon1,pokemon2);
    console.log(`${pokemon1.name} ataca a ${pokemon2.name}`);
    pokemon2.HP-=daño;
    console.log(`${pokemon2.name} recibe ${daño} de daño`)
    if(pokemon2.HP<=0){
        console.log(`${pokemon2.name} ha muerto`);
    }
}

function randPCharacteristics(num,type){
    let molde = {};
    if(type==0){
        molde[`pokemon${num}`]= new pokemon(`pokemon${num}`,'', '', '', '', '', '', '', type);

    }
    else{
        molde[`pokemon${num}`] = new elemental(`pokemon${num}`,'', '', '', '', '', '', '', type, '', '');
    }
    molde[`pokemon${num}`].level_stats(getRandomInt(1,10));
    attack_selector(molde[`pokemon${num}`],type);
    return molde[`pokemon${num}`];  
}
/*  this.name=caracP[0];
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
/*
function tests(a, b, c) {
  this.a = a;
  this.b = b;
  this.c = c;
} //es una función que genera un objeto con estas características 

function datos() {
  var azar = Math.floor(Math.random() * 100);
  return azar;
}

let instancias = {}; // Un objeto vacio

for (var i = 0, x = 30; i < x; i++) {

  nombre = datos();
  informacion = datos();
  determinante = datos();
  var usuario = new tests(determinante, informacion, nombre);
  //se introduce la información acomodada por tests hacia usuario, generando el objeto usuario

  instancias["usuario" + i] = usuario; 
  // Guardamos la instancia; en el objeto vacío, en sus propiedades (recién creadas), se mete el objeto usuario
  // Log para validar
  if (i === 5) console.log('Ini usuario' + i + ' = ', usuario);
}*/



/*-------------------------- !&PRINCIPAL --------------------------*/       
// console.log(getRandomInt(0,10));
// console.log(getRandomInt(0,10));

//let pokemon1 = new pokemon()

console.log("Bienvenidx");
// let pokemon1 = new pokemon('jii',55,'a','a','bd','ba','s','l',1,);
// let pokemon2 = new elemental('jiji',55,'a','a','bd','ba','speed','l',1,'sa','sa');
//console.log(pokemon2);

//console.log("ya entiendo algo");
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
var array = [randPCharacteristics(1,0),
            randPCharacteristics(2,1),
            randPCharacteristics(3,2),
            randPCharacteristics(4,3),
            randPCharacteristics(5,4)];
console.log(array);
fight(array[1],array[2])