const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Genres Movie List
  router.get("/genre/movie/list", async (req, res) => {
    fetchApi(req, res, "genre/movie/list?language=en");
  });

  // Genres TV List
  router.get("/genre/tv/list", async (req, res) => {
    fetchApi(req, res, "genre/tv/list?language=en");
  });
  return router;
};
