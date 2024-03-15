var cineTech = {};

// CINETECH SYSTEM
cineTech.sys = {
  imagesBG: [],
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
  // Ajoute une nouvelle classe à un élément
  // Cela ne supprime pas les autres classes, elle en ajoute simplement une nouvelle
  addClass: function (name) {
    for (var i = 0; i < this.elems.length; i++) {
      this.elems[i].className += " " + name; // C'est ici qu'on ajoute la nouvelle classe
    }
    return this; // Renvoie this dans l'ordre d'appel
  },
  delClass: function (name) {
    for (var i = 0; i < this.elems.length; i++) {
      if (this.elems[i].classList.contains(name)) {
        this.elems[i].classList.remove(name); // retire la class
      }
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
  loadLazyImg: function () {
    let imagesToLoad = document.querySelectorAll("img[data-src]");
    const loadImages = (image) => {
      image.setAttribute("src", image.getAttribute("data-src"));
      image.onload = () => {
        image.removeAttribute("data-src");
      };
    };
    imagesToLoad.forEach((img) => {
      this.imagesBG.push(img.getAttribute("data-src"));
      loadImages(img);
    });
    return this;
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
    return this;
  },
  fetchApiNode: async function ({ endpoint, bodyParams, method = "POST" }) {
    const response = fetch(`http://localhost:81/${endpoint}`, {
      method: method,
      headers: {
        "Content-Type": "application/json",
      },
      body: bodyParams ? JSON.stringify(bodyParams) : "{}",
    });
    return this;
  },
};

cineTech.images = {
  randNumber: [],
  getNumber: function (index) {
    return cineTech.images.randNumber(index);
  },
  getRandomInt: function (max) {
    var rand = Math.floor(Math.random() * max);
    if (!this.randNumber.includes(rand)) {
      this.randNumber.push(rand);
    } else {
      arguments.callee(cineTech.sys.imagesBG.length);
    }
    return this;
  },
  createBG: function () {
    /* Taille de votre image*/
    var canvas = document.getElementById("canvas");
    var pWidth = canvas.width;
    var pHeight = canvas.height;

    var imgs = cineTech.sys.getBySelectorAll("img[data-src]");
    //create an image
    var imgs = new Image();
    imgs.src = cineTech.sys.imagesBG[0];

    imgs.onload = function () {
      for (var i = 1; i <= 3; i++) {
        cineTech.images.getRandomInt(cineTech.sys.imagesBG.length);
        var ctx = canvas.getContext("2d");
        var img = new Image();
        console.log(cineTech.images.randNumber[i - 1]);
        img.src = cineTech.sys.imagesBG[cineTech.images.randNumber[i - 1]];

        var iWidth = img.width;
        var iHeight = img.height;

        //ON prend le plus faible ratio
        var iRatioWidth = img.width / (pWidth / 2);
        if (i == 2) {
          //L'image du milieu est un peu plus large  que les autres
          iRatioWidth = img.width / ((pWidth * 4) / 6);
        }
        var iRatioHeight = img.height / pHeight;
        var iRatio = iRatioWidth;
        if (iRatioHeight < iRatio) {
          iRatio = iRatioHeight;
        }

        ctx.save();

        //define the polygon
        ctx.beginPath();
        switch (i) {
          case 1:
            ctx.moveTo(0, 0);
            ctx.lineTo(pWidth / 2, 0);
            ctx.lineTo((pWidth * 1) / 6, pHeight);
            ctx.lineTo(0, pHeight);

            //draw the image
            ctx.clip();
            ctx.drawImage(img, 0, 0, img.width / iRatio, img.height / iRatio);
            break;
          case 2:
            ctx.moveTo((pWidth * 1) / 6, pHeight);
            ctx.lineTo((pWidth * 5) / 6, pHeight);
            ctx.lineTo(pWidth / 2, 0);

            //draw the image
            ctx.clip();
            ctx.drawImage(
              img,
              (pWidth * 1) / 6,
              0,
              img.width / iRatio,
              img.height / iRatio
            );
            break;
          case 3:
            ctx.moveTo(pWidth / 2, 0);
            ctx.lineTo((pWidth * 5) / 6, pHeight);
            ctx.lineTo(pWidth, pHeight);
            ctx.lineTo(pWidth, 0);

            //draw the image
            ctx.clip();
            ctx.drawImage(
              img,
              pWidth / 2,
              0,
              img.width / iRatio,
              img.height / iRatio
            );
            break;
        }

        ctx.closePath();
        //fill and stroke are still available for overlays and borders
        ctx.lineWidth = 1;
        ctx.strokeStyle = "#cccccc";
        ctx.stroke(); //Contour
        ctx.restore();
      }
    };
  },
};
// LOAD MODULE
if (typeof module != "undefined" && module.exports) {
  module.exports = cineTech;
}

cineTech.sys.loadLazyImg();
