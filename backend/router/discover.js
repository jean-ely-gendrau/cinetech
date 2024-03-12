const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Movie Discover
  router.get("/api/movie/discover", async (req, res) => {
    fetchApi(
      req,
      res,
      "discover/movie?include_adult=false&include_video=false&language=fr-FR&page=1&sort_by=popularity.desc"
    );
  });

  // TV Discover
  router.get("/api/movie/list", async (req, res) => {
    fetchApi(
      req,
      res,
      "discover/tv?include_adult=false&include_null_first_air_dates=false&language=fr-FR&page=1&sort_by=popularity.desc"
    );
  });

  return router;
};
