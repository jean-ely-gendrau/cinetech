const router = require("express").Router();
const fs = require("fs");

module.exports = function () {
  // TV Episode Group Details
  router.get("/api/g/images/", async (req, res) => {
    /* backslash for windows, in unix it would be forward slash */
    const routes_directory = "./images/";

    let files = fs.readdirSync(routes_directory);

    try {
      res.json(
        `http://localhost:81/static/${
          files[Math.floor(Math.random() * files.length)]
        }`
      );
    } catch (error) {
      res.status(500).json({ error: "Ooops erreur 500" });
    }
  });

  router.get("/api/g/images/bg", async (req, res) => {
    /* backslash for windows, in unix it would be forward slash */
    const routes_directory = "./images/bg";

    let files = fs.readdirSync(routes_directory);

    try {
      res.json(
        `http://localhost:81/static/bg/${
          files[Math.floor(Math.random() * files.length)]
        }`
      );
    } catch (error) {
      res.status(500).json({ error: "Ooops erreur 500" });
    }
  });

  return router;
};
