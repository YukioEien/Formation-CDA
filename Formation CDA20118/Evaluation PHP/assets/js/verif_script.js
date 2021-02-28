window.onload = (() => {

})

function verif(ajout) {
    console.log("TEST")


    let addTitleIsOk = verifTitre(ajout.elements['addTitle'].value)
    let addLabelIsOk = verifLabel(ajout.elements['addLabel'].value)
    let addGenderIsOK = verifGender(ajout.elements['addGender'].value)
    let addYearIsOK = verifYear(ajout.elements['addYear'].value)
    let addPriceIsOK = verifPrice(ajout.elements['addPrice'].value)


    if (addTitleIsOk && addLabelIsOk && addGenderIsOK && addYearIsOK && addPriceIsOK) {
        console.log("OK")
        return true;

    } else {
        console.error("Pas OK");
        return false;
    }
}

function verifTitre(addTitle) {

    var isOK = verifAuMoins1Char(addTitle);
    if (isOK) {
        return true;
    } else {
        var missTitre = document.getElementById(`missTitre`);
        missTitre.textContent = `* Champ requis`;
        return false;
    }
}


function verifYear(addYear) {
  
    var isOK = verifAuMoins1Char(addYear);
    if (isOK) {
        return true;
    } else {
        var missYear = document.getElementById(`missYear`);
        missYear.textContent = `* Champ requis`;
        return false;
    }
}


function verifLabel(addLabel) {
    var isOK = verifAuMoins1Char(addLabel);
    if (isOK) {
        return true;
    } else {
        var missLabel = document.getElementById(`missLabel`);
        missLabel.textContent = `* Champ requis`;
        return false;
    }
}

function verifGender(addGender) {
    var isOK = verifAuMoins1Char(addGender);
    if (isOK) {
        return true;
    } else {
        var missGender = document.getElementById(`missGender`);
        missGender.textContent = `* Champ requis`;
        return false;
    }
}

function verifPrice(addPrice) {
    var isOK = verifAuMoins1Char(addPrice);
    if (isOK) {
        return true;
    } else {
        var missPrice = document.getElementById(`missPrice`);
        missPrice.textContent = `* Champ requis`;
        return false;
    }
}

function verifAuMoins1Char(motAVerif) {
    if (motAVerif.length > 0) {
        return true;
    } else {
        return false;
    }
}






