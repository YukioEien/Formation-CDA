
//Evaluation Javascript


// Exercice n°1 : 

/*
var jeune = 0;
var adulte = 0;
var vieux = 0;
do {
    var age = window.prompt('Saisissez l\'age de la personne: ');
        if (age >0 && age < 20)
    {
    jeune++;
    }
        else if (age >= 20 && age <= 40)
    {
    adulte++;
    }
        else if (age > 40)
    {
    vieux++;
    }
}
while (age < 100)
console.log(jeune, adulte, vieux);
document.write('Il y a '+jeune+' moins de 20 ans. Il y a '+adulte+' entre 20 et 40 ans. Et il y a '+vieux+' plus de 40 ans.');
*/

//Exercice n°2 :

/*
function tableMultiplication(x)
{
var i=1;
var resultat = 0;
    for (i;i<=10;i++)
    {
        resultat = i*x;
        document.write(i+'x'+x+'='+resultat+'<br>');   
    }
}

var x = window.prompt();
x = tableMultiplication(x);
*/

//Exercice n°3 :

/*
var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
window.alert('Vous allez saisir un prénom, s\'il se trouve dans la liste,il sera retiré. Sinon une erreur apparaîtra. Votre prénom doit commencer par une majuscule.');
var prenom = window.prompt('Saisissez le prénom');
var x = tab.lastIndexOf(prenom);
console.log(x);
if (x == -1){
    console.log('fail');
    window.alert('Le prénom saisit n\'est pas dans la liste')
    
}
else {
    console.log('réussi');
    var retire = tab.splice(x,1);
    tab.push(' ');
    console.log(retire);
    console.log(tab);
}
*/

//Exercice n°4 : 

/*
                    function arrondi(x) 
                {
                    return Number.parseFloat(x).toFixed(2);
                }

var PU = 0;         // prix unitaire
var TOT = 0;        //total
var QTECOM = 0;     //quantité commandé
var PAP = 0;        //prix a payer
var REM = 0;        //remise
var PORT = 0.02;       //frais de port
var TOTREM = 0;     //total remisé
var PPORT = 0;         //prix du port

PU = window.prompt('Saisissez le prix unitaire');
QTECOM = window.prompt('Saisissez la quantité');
TOT = PU*QTECOM;
    if (TOT >= 100 && TOT <= 200)
    {
        REM = 0.05;
    }
    else if (TOT >200)
    {
        REM = 0.1;
    }
TOTREM = TOT-TOT*REM;
PPORT = TOTREM*PORT;
        if (PPORT < 6){
            PAP = TOTREM+6;
        }
        else {
            PAP = TOTREM+PPORT;
        }
                if (TOTREM > 500)
                {
                    PPORT = 0;
                    PAP = TOTREM;
                }
        
console.log('Voici le montant de la remise : '+arrondi(TOTREM-TOT)+'€');
console.log('Voici le montant des frais de port : '+arrondi(PPORT)+'€');
console.log('Voici le prix total a payer : '+arrondi(PAP)+'€');
*/