const express = require("express");
const fs = require("fs");
//require("dotenv").config(); // Load environment variables

const app = express();
const port = 8887;

// Serve the index.html page
/*
app.get("/", (req, res) => {
  res.sendFile("index.php", { root: __dirname });
});
*/
app.use("/static", express.static("images/"));
app.use("/static/bg", express.static("images/bg"));
/* backslash for windows, in unix it would be forward slash */
const routes_directory = require("path").resolve(__dirname) + "/router/";

fs.readdirSync(routes_directory).forEach((route_file) => {
  try {
    app.use("/", require(routes_directory + route_file)());
  } catch (error) {
    console.log(`Une erreur viens de ce produire : ${route_file}`);
    console.log(error);
  }
});

/*
function print(path, layer) {
  if (layer.route) {
    layer.route.stack.forEach(
      print.bind(null, path.concat(split(layer.route.path)))
    );
  } else if (layer.name === "router" && layer.handle.stack) {
    layer.handle.stack.forEach(
      print.bind(null, path.concat(split(layer.regexp)))
    );
  } else if (layer.method) {
    console.log(
      "%s /%s",
      layer.method.toUpperCase(),
      path.concat(split(layer.regexp)).filter(Boolean).join("/")
    );
  }
}

function split(thing) {
  if (typeof thing === "string") {
    return thing.split("/");
  } else if (thing.fast_slash) {
    return "";
  } else {
    var match = thing
      .toString()
      .replace("\\/?", "")
      .replace("(?=\\/|$)", "$")
      .match(/^\/\^((?:\\[.*+?^${}()|[\]\\\/]|[^.*+?^${}()|[\]\\\/])*)\$\//);
    return match
      ? match[1].replace(/\\(.)/g, "$1").split("/")
      : "<complex:" + thing.toString() + ">";
  }
}

app._router.stack.forEach(print.bind(null, []));
*/
app.listen(port, () => {
  console.log(`Le serveur est démarrée :  http://localhost:${port}`);
});
