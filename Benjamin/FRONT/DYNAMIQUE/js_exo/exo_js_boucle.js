/*
var nom = window.prompt("Entrez votre nom: ");
var prenom = window.prompt("Entrez votre prénom: ");
var sexe = window.confirm("Êtes-vous un homme ?");
if (sexe = true)
{
    window.alert("Bonjour Monsieur "+nom+' '+prenom+"\nBienvenue sur notre site web")
} else {
    window.alert("Bonjour Madame "+nom+prenom+"\nBienvenue sur notre site web")
}
*/






/*
var a = "100";
var b = 100;
var c = 1.00;
var d = true;

e = parseInt(a)+parseInt(c)

window.alert('Ceci est une chaîne de caractères : '+a);
b--;
window.alert ('Voici b = '+b);
window.alert ('Voici c + a = '+e)
window.alert ('Voici l\'inverse de d = '+!d)
*/
/*
var nombre = window.prompt("Saisissez un nombre :");

if (nombre%2 == 0){
    window.alert('Vous avez entré un nombre pair');
}
else {
    window.alert('Vous avez entré un nombre impair');
}
*/














/*
var yearOfBirth = window.prompt('Saisissez votre année de naissance: ')
if (yearOfBirth > 2002)
{
window.alert('Vous êtes mineur')
}
else if (yearOfBirth <= 2002 && yearOfBirth >= 1920)
{
window.alert('Vous êtes majeur')
}
else if (yearOfBirth == null)
{
window.alert('Actualisez la page et saisissez a nouveau votre année de naissance')
}
else {
window.alert('Vous êtes un menteur')
}
*/















/*
var entier1 = window.prompt('Saisissez un entier');
var entier2 = window.prompt('Saisissez un second entier');
var signe = window.prompt('Saisissez un opérateur de calcul (/ , +, -, *)');
if (signe == '+')
{
var resultatAddition = parseInt(entier1)+parseInt(entier2);
window.alert('Voici la somme de vos nombres: '+ resultatAddition);
}
else if (signe == '-')
{
var resultatSoustraction = parseInt(entier1)-parseInt(entier2);
window.alert('Voici la difference de vos nombres: '+ resultatSoustraction);
}
else if (signe == '*')
{
var resultatMultiplication = parseInt(entier1)*parseInt(entier2);
window.alert('Voici le résultat de votre multiplication: '+ resultatMultiplication);
}
else if (signe == '/')
{
    if (entier1 || entier2 == 0){
        window.alert('Impossible de diviser par 0')
    }
    else
    {       
var resultatDivision = parseInt(entier1)/parseInt(entier2);
window.alert('Voici le résultat de votre division'+ resultatDivision);
}
}
else 
{
window.alert('Votre signe opérateur est incorrect')
}
*/















/*
i=-1;
somme=0;
moyenne=0;
do
{
    var e = parseInt(window.prompt("Saisissez un entier: "));
    i = (i+1);
    var somme = parseInt(e)+parseInt(somme);
} while (e != 0)
moyenne = somme/i;
console.log(i);
window.alert("Voici la somme de ces entiers: "+somme+"\n et en voici leur moyenne: "+moyenne);*/

//parseInt()sert a transformer un string en number (si c'est possible)











/*
var count = 1;
var prenom = 0;
countPrenom = '';
do {
    var prenom = window.prompt('Saisissez le prénom n°'+count+': \nCliquez sur annuler pour arrêter');
    if (prenom == null || prenom ==""){
    break // il sert a sortir des boucles
    }
    var countPrenom = prenom+' '+countPrenom;
    count++;
} while (prenom !='')
count=(count-1);
window.alert('Voici les prénoms saisis: '+countPrenom+'\nEt voici le nombre de prénoms saisis '+count);
console.log('Voici les prénoms saisis: '+countPrenom+'\nEt voici le nombre de prénoms saisis '+count);
*/













// pour n-5 uniquement
/*
var n = window.prompt("Saisissez un nombre dont vous souhaitez connaître les 5 nombres le précédent: ");
var i = (n-5);
var resultat = 0;
for (i;i<n; i++)
{
    resultat = i+" "+resultat;
    console.log(i);
    console.log(resultat);
}
resultat = resultat.substring(0,resultat.length - 1);
console.log(resultat);
window.alert(resultat);
*/












// version de l'exo : 
/*
var n2 = window.prompt("Saisissez un nombre dont vous souhaitez connaître le décompte jusque 0: ");
var i = n2;
var resultat = 0;
if (n2 < 450){
    for (i;i>=0;i--)
{
    resultat = resultat+" "+i;
    console.log(i);
    console.log(resultat);
}
    resultat = resultat.substring(1,resultat.lenght);
    window.alert(resultat);
    console.log(resultat);
}
else {
    window.alert("Erreur, nombre trop élevé, saisissez un nombre plus petit (inférieur a 450)")
}

*/
//variable = variable.substring(0,variable.length -1) pour retirer le dernier caractère de la variable




















/*
var moyenne = 0;
var i = 0;
var somme = 0;
var nombre = 1;
    do
    {
    var nombre = window.prompt('Saisissez un nombre, entrez 0 pour terminer le calcul');
    somme = parseInt(nombre)+somme;
    console.log(i=i+1);
    }   while (nombre != 0)

console.log(moyenne = somme/(i-1));
window.alert('Voici la moyenne des nombres données '+moyenne+'\n et voici leur somme '+somme);
*/




















/*
var x = window.prompt("saisissez x"); // format x * n = 
var n = window.prompt("saisissez n"); //
var i = 1;
var resultat = 0;
var resultatFinal = 1;
for (i;i <= n;i++){
    resultat = x * i;
    var resultatFinal = (x+' x '+i+' = '+resultat+'\n')+resultatFinal;
    }
var resultatFinal = resultatFinal.substring(0,resultatFinal.length-1);
window.alert(resultatFinal);
*/




















/*
var word = window.prompt("Entrez un mot dont vous souhaitez connaître le nombre de voyelle: ");
var nombreVoyelle = 0;
var voytr="";
var voyelle = ['a', 'e', 'i', 'o', 'u', 'y'];
for(var i =0; i<word.length; i++){
    var lettre = word.substr(i,1);//Nombre de lettre correspondant à voyelle
    if(voyelle.indexOf(lettre)>=0) //On ajoute les lettres étant une voyelle à la suite 
    {
        voytr += word[i] +','    
        nombreVoyelle++
    }
}
window.alert("Dans "+ word + " il y a " +nombreVoyelle+ " voyelle(s) : "+voytr);

*/



















/*
//Ici la fonction est appelée afin de calculer le produit des nombres 
function afficheImg(image){
    return afficheImg = (image ='<img src ="https://ncode.amorce.org/ressources/Pool/TB/WEB_Javascript_BASES/images/papillon.jpg" alt="Papillon">')
}
function produit2(nombre,nombre2)
{
    return produit2 = nombre*nombre2;
}
function cube2(nombre){
    return cube2 = nombre*nombre*nombre;
}
var nombre = window.prompt('Saisissez un nombre');
var nombre2 = window.prompt('Saisissez un autre nombre');
var cube = cube2(nombre);
var produit = produit2(nombre,nombre2);
var image = afficheImg(image);
document.write(image+'<br>'+'Le cube de '+nombre+' est égale à : '+cube+'<br>'+'Le produit de '+nombre+' x '+nombre2+' est égale à = '+produit);
*/














function strTok(str1,str2,n){
    str1 = window.prompt('Saisissez votre liste: ');
    str2 = window.prompt('Saisissez vore séparateur: ');
    n = window.prompt('Saisissez le n° du mot que vous souhaitez selectionner: ');
    return strTok = 
}