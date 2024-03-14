var observe = {};

// CINETECH SYSTEM
observe.sys = {
  elems: [], // Tableau pour sauvegarder tous les éléments ajouter par callbackObserve
  callbackObserve: function (entries, observer) {
    var tempElems = []; // tableau temporaire pour sauvegarder les éléments observer à action unique
    entries.forEach((entry) => {
      // Si l'intersection est vrai et que l'id de l'élément ne ce trouve pas dans le tableau elems alors on déclanche l'action
      if (
        entry.isIntersecting &&
        this.elems?.includes(entry.target?.id) !== true
      ) {
        tempElems.push(entry.target?.id); //  ajout de l'élément au tableau
        this.elems = tempElems;
      }
      // chaque élément de entries correspond à une variation
      // d'intersection pour un des éléments cible:
      //   entry.boundingClientRect
      //   entry.intersectionRatio
      //   entry.intersectionRect
      //   entry.isIntersecting
      //   entry.rootBounds
      //   entry.target
      //   entry.time
    });
  },
  createObserver: function () {
    var observer;

    var options = {
      root: null,
      rootMargin: "0px",
      threshold: 0.8,
    };

    observer = new IntersectionObserver(this.callbackObserve, options);
    observer.observe(arguments[0]);
  },
  getBySelector: function () {
    var tempElems = []; // tableau temporaire pour sauvegarder les éléments trouvés
    for (var i = 0; i < arguments.length; i++) {
      if (typeof arguments[i] === "string") {
        // Vérifie que le paramètre est une chaine
        tempElems.push(document.querySelector(arguments[i])); // Ajoute l'élément à tempElems
      }
    }
    this.elems = tempElems; // Tous les éléments sont copiés dans la propriété elems
    return this; // Renvoie this dans l'ordre d'appel
  },
  getBySelectorAll: function () {
    var tempElems = []; // tableau temporaire pour sauvegarder les éléments trouvés
    for (var i = 0; i < arguments.length; i++) {
      if (typeof arguments[i] === "string") {
        // Vérifie que le paramètre est une chaine
        tempElems.push(document.querySelectorAll(arguments[i])); // Ajoute l'élément à tempElems
      }
    }
    this.elems = tempElems; // Tous les éléments sont copiés dans la propriété elems
    return this; // Renvoie this dans l'ordre d'appel
  },
};

// LOAD MODULE
if (typeof module != "undefined" && module.exports) {
  module.exports = observe;
}

window.addEventListener(
  "load",
  function (event) {
    boxElement = document.querySelector("footer");

    observe.sys.createObserver(boxElement);
  },
  false
);
