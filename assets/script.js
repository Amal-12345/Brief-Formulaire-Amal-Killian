// Récupération des 3 grandes séctions de réservations

const reservation = document.querySelector("#reservation");
const options = document.querySelector("#options");
const coordonnees = document.querySelector("#coordonnees");
//Section des jour du pass UN jour
const pass1JourDate = document.querySelector("#pass1jourDate");
//Les bouton radio du pass  jour
const boutonRadiopass1JourDate =
  pass1JourDate.querySelectorAll(`input[type="radio"]`);

//Section des jour du pass DEUX jour
const pass2JoursDate = document.querySelector("#pass2joursDate");
//Les bouton radio du pass DEUX jour
const boutonRadiopass2JoursDate =
  pass2JoursDate.querySelectorAll(`input[type="radio"]`);
const choixJour = document.querySelectorAll("div.choixJour");

//Section tarif reduit
const tarifReduit = document.querySelector("#tarifReduit");
//Bouton radio des tarifs reduit
const tarifsReduit = document.querySelectorAll(".tarifsReduit");

const pass1Jour = document.querySelector("#pass1jour");
const pass2Jours = document.querySelector("#pass2jours");
const pass3Jours = document.querySelector("#pass3jours");

pass1JourDate.style.display = "none";
pass2JoursDate.style.display = "none";

reservation.style.display = "";
options.style.display = "none";
coordonnees.style.display = "none";

tarifsReduit.forEach((tarifsReduit) => {
  tarifsReduit.style.display = "none";
});

choixJour.forEach((choixJour) => {
  choixJour.style.display = "";
});

pass1Jour.addEventListener("change", () => {
  if (pass1Jour.checked) {
    pass1JourDate.style.display = "";
    pass2JoursDate.style.display = "none";
    boutonRadiopass2JoursDate.forEach((boutonRadiopass2JoursDate) => {
      boutonRadiopass2JoursDate.checked = false;
    });
  }
});

pass2Jours.addEventListener("change", () => {
  if (pass2Jours.checked) {
    pass2JoursDate.style.display = "";
    pass1JourDate.style.display = "none";
    boutonRadiopass1JourDate.forEach((boutonRadiopass1JourDate) => {
      boutonRadiopass1JourDate.checked = false;
    });
  }
});
pass3Jours.addEventListener("change", () => {
  if (pass3Jours.checked) {
    displayNoneTarif();
  }
  function displayNoneTarif() {
    pass2JoursDate.style.display = "none";
    pass1JourDate.style.display = "none";
    boutonRadiopass1JourDate.forEach((boutonRadiopass1JourDate) => {
      boutonRadiopass1JourDate.checked = false;
    });
    boutonRadiopass2JoursDate.forEach((boutonRadiopass2JoursDate) => {
      boutonRadiopass2JoursDate.checked = false;
    });
  }
});
function resetReservation() {
  let boutonRadioSelection = document.querySelectorAll(
    'input[type="radio"][name="passSelection"]'
  );
  boutonRadioSelection.forEach(function (boutonRadioSelection) {
    boutonRadioSelection.checked = false;
  });

  let boutonRadioSelectionDate = document.querySelectorAll(
    'input[type="radio"][name="passSelectionDate"]'
  );
  boutonRadioSelectionDate.forEach(function (boutonRadioSelectionDate) {
    boutonRadioSelectionDate.checked = false;
  });

  pass1JourDate.style.display = "none";
  pass2JoursDate.style.display = "none";
}

tarifReduit.addEventListener("change", () => {
  resetReservation();
  if (tarifsReduit[0].style.display == "none") {
    choixJour.forEach((choixJour) => {
      choixJour.style.display = "none";
    });
    tarifsReduit.forEach((tarifsReduit) => {
      tarifsReduit.style.display = "";
    });
  } else {
    choixJour.forEach((choixJour) => {
      choixJour.style.display = "";
    });
    tarifsReduit.forEach((tarifsReduit) => {
      tarifsReduit.style.display = "none";
    });
  }
});

const pass1JourReduit = document.querySelector("#pass1jourreduit");
const pass2JoursReduit = document.querySelector("#pass2joursreduit");
document.addEventListener("DOMContentLoaded", function () {
  const pass1JourReduit = document.querySelector("#pass1jourreduit");
  const pass1JourDate = document.querySelector("#pass1jourDate");
  const pass2JoursReduit = document.querySelector("#pass2joursreduit");
  const pass2JoursDate = document.querySelector("#pass2joursDate");
  const boutonRadiopass1JourDate = pass1JourDate.querySelectorAll(
    'input[type="radio"]'
  );

  pass1JourReduit.addEventListener("change", () => {
    if (pass1JourReduit.checked) {
      pass1JourDate.style.display = "";
      pass2JoursDate.style.display = "none";
      boutonRadiopass1JourDate.forEach((boutonRadiopass1JourDate) => {
        boutonRadiopass1JourDate.checked = false;
      });
    } else {
      pass1JourDate.style.display = "none";
    }
  });

  pass2JoursReduit.addEventListener("change", () => {
    if (pass2JoursReduit.checked) {
      pass2JoursDate.style.display = "";
      pass1JourDate.style.display = "none";
      boutonRadiopass2JoursDate.forEach((boutonRadiopass2JoursDate) => {
        boutonRadiopass2JoursDate.checked = false;
      });
    } else {
      pass2JoursDate.style.display = "none";
    }
  });
});

pass1JourReduit.addEventListener("change", () => {
  if (pass1JourReduit.checked) {
    pass1JourDate.style.display = "";
    boutonRadiopass1JourDate.forEach((boutonRadiopass1JourDate) => {
      boutonRadiopass1JourDate.checked = false;
    });
  } else {
    pass1JourDate.style.display = "none";
  }
});

pass2JoursReduit.addEventListener("change", () => {
  if (pass2JoursReduit.checked) {
    pass2JoursDate.style.display = "";
    pass1JourDate.style.display = "none";
    boutonRadiopass1JourDate.forEach((boutonRadiopass1JourDate) => {
      boutonRadiopass1JourDate.checked = false;
    });
  }
});
pass3Jours.addEventListener("change", () => {
  if (pass3Jours.checked) {
    displayNoneTarif();
  }
  function displayNoneTarif() {
    pass2JoursDate.style.display = "none";
    pass1JourDate.style.display = "none";
    boutonRadiopass1JourDate.forEach((boutonRadiopass1JourDate) => {
      boutonRadiopass1JourDate.checked = false;
    });
    boutonRadiopass2JoursDate.forEach((boutonRadiopass2JoursDate) => {
      boutonRadiopass2JoursDate.checked = false;
    });
  }
});

pass1JourReduit.addEventListener("change", () => {
  if (pass1JourDate.style.display == "none") {
    pass1JourDate.style.display = "";
  } else {
    pass1JourDate.style.display = "none";
  }
});

pass2JoursReduit.addEventListener("change", () => {
  if (pass2JoursDate.style.display == "none") {
    pass2JoursDate.style.display = "";
  } else if (pass2JoursDate.style.display == "") {
    pass2JoursDate.style.display = "none";
  }
});

let boutonSuivant = document.querySelector("#boutonSuivant");
let boutonRetour = document.querySelector("#boutonRetour");

let i = 1;
//Incrémentation et décrémentation de I pour afficher ou non les differents bloc Reservation/Options/Coordonnées
function suivant() {
  i++;

  if (i == 2) {
    reservation.style.display = "none";
    options.style.display = "";
    coordonnees.style.display = "none";
  }

  if (i == 3) {
    reservation.style.display = "none";
    options.style.display = "none";
    coordonnees.style.display = "";
  }

  if (i == 1) {
    reservation.style.display = "";
    options.style.display = "none";
    coordonnees.style.display = "none";
  }
}
function retour() {
  i--;

  console.log(i);

  if (i == 2) {
    reservation.style.display = "none";
    options.style.display = "";
    coordonnees.style.display = "none";
  }
  if (i == 3) {
    reservation.style.display = "none";
    options.style.display = "none";
    coordonnees.style.display = "";
  }
  if (i == 1) {
    reservation.style.display = "";
    options.style.display = "none";
    coordonnees.style.display = "none";
  }
}

// Désactiver les bouton suivant et Retour quand on est au début ou a la fin

const casqueEnfant = document.querySelector("#casqueEnfant");
casqueEnfant.style.display = "none";

const enfantsOui = document.querySelector("#enfantsOui");
const enfantsNon = document.querySelector("#enfantsNon");

enfantsOui.addEventListener("change", () => {
  if (enfantsOui.checked) {
    casqueEnfant.style.display = "";
  }
});

enfantsNon.addEventListener("change", () => {
  if (enfantsNon.checked) {
    casqueEnfant.style.display = "none";
  }
});

let tente3Nuits = document.querySelector("#tente3Nuits");

let tenteNuit1 = document.querySelector("#tenteNuit1");
let tenteNuit2 = document.querySelector("#tenteNuit2");
let tenteNuit3 = document.querySelector("#tenteNuit3");

tente3Nuits.addEventListener("change", () => {
  if (tente3Nuits.checked == true) {
    tenteNuit1.checked = false;
    tenteNuit2.checked = false;
    tenteNuit3.checked = false;
  }
});

function uncheckTente3Nuits() {
  tente3Nuits.checked = false;
}

tenteNuit1.addEventListener("change", uncheckTente3Nuits);
tenteNuit2.addEventListener("change", uncheckTente3Nuits);
tenteNuit3.addEventListener("change", uncheckTente3Nuits);

let van3Nuits = document.querySelector("#van3Nuits");

let vanNuit1 = document.querySelector("#vanNuit1");
let vanNuit2 = document.querySelector("#vanNuit2");
let vanNuit3 = document.querySelector("#vanNuit3");

van3Nuits.addEventListener("change", () => {
  if (van3Nuits.checked == true) {
    vanNuit1.checked = false;
    vanNuit2.checked = false;
    vanNuit3.checked = false;
  }
});

function uncheckVan3Nuits() {
  van3Nuits.checked = false;
}

vanNuit1.addEventListener("change", uncheckVan3Nuits);
vanNuit2.addEventListener("change", uncheckVan3Nuits);
vanNuit3.addEventListener("change", uncheckVan3Nuits);
