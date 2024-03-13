var cineTech = {};

// CINETECH SYSTEM
cineTech.sys = {
  elems: [], // Tableau pour sauvegarder tous les éléments trouvés par les fonctions getById, getByClass
  // Récupère tous les éléments par ID
  // Peut prendre plus d'un paramètre
  getById: function () {
    var tempElems = []; // tableau temporaire pour sauvegarder les éléments trouvés
    for (var i = 0; i < arguments.length; i++) {
      if (typeof arguments[i] === "string") {
        // Vérifie que le paramètre est une chaine
        tempElems.push(document.getElementById(arguments[i])); // Ajoute l'élément à tempElems
      }
    }
    this.elems = tempElems; // Tous les éléments sont copiés dans la propriété elems
    return this; // Renvoie this dans l'ordre d'appel
  },

  // Ajoute une nouvelle classe à un élément
  // Cela ne supprime pas les autres classes, elle en ajoute simplement une nouvelle
  addClass: function (name) {
    for (var i = 0; i < this.elems.length; i++) {
      this.elems[i].className += " " + name; // C'est ici qu'on ajoute la nouvelle classe
    }
    return this; // Renvoie this dans l'ordre d'appel
  },

  // Ajoute un événement aux éléments trouvés par la méthode : getById et getByClass
  //-- Action est un type d'événement comme 'click', 'mouseover', 'mouseout', etc.
  //-- Callback est la fonction à exécuter lorsque l'événement est déclenché
  on: function (action, callback) {
    if (this.elems[0].addEventListener) {
      for (var i = 0; i < this.elems.length; i++) {
        this.elems[i].addEventListener(action, callback, false); //Ajout de l'événement du W3C pour Firefox,Safari,Opera...
      }
    } else if (this.elems[0].attachEvent) {
      for (var i = 0; i < this.elems.length; i++) {
        this.elems[i].attachEvent("on" + action, callback); // Ajout de l'événement pour Internet Explorer :(
      }
    }
    return this; // Renvoie this dans l'ordre d'appel
  },

  // Ajout du texte sur les éléments
  // text est la chaine à insérer
  appendText: function (text) {
    text = document.createTextNode(text); // Crée un nouveau noeud texte avec la chaine fournie
    for (var i = 0; i < this.elems.length; i++) {
      this.elems[i].appendChild(text); // Ajoute le texte à l'élément
    }
    return this; // Renvoie this dans l'ordre d'appel
  },

  // Affiche ou masque les éléments trouvés
  toggleHide: function (e) {
    if (e) {
      console.log(e);
      e.preventDefault();
    }
    for (var i = 0; i < this.elems.length; i++) {
      this.elems[i].style["display"] =
        this.elems[i].style["display"] === "none" || "" ? "block" : "none";
      // Vérifie le statut de l'élément pour savoir s’il peut être affiché ou masqué
    }
    return this; // Renvoie this dans l'ordre d'appel
  },
};

cineTech.request = {
  fetchApiPhp: async function ({ endpoint, bodyParams, method = "POST" }) {
    const response = fetch(
      `${window.location.protocol}://${window.location.hostname}/${endpoint}`,
      {
        method: method,
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: Object.entries(bodyParams)
          .map(([key, val], index) => {
            return `${key}=${val}`;
          })
          .join("&"),
      }
    );
  },
  fetchApiNode: async function ({ endpoint, bodyParams, method = "POST" }) {
    const response = fetch(`http://localhost:81/${endpoint}`, {
      method: method,
      headers: {
        "Content-Type": "application/json",
      },
      body: bodyParams ? JSON.stringify(bodyParams) : "{}",
    });
  },
};
// LOAD MODULE
if (typeof module != "undefined" && module.exports) {
  module.exports = cineTech;
}
