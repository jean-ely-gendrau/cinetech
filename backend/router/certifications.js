const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Movie Certification
  router.get("/api/certification/movie/list", async (req, res) => {
    fetchApi(req, res, "certification/movie/list");
  });

  // Tv Certification
  router.get("/api/certification/tv/list", async (req, res) => {
    fetchApi(req, res, "certification/tv/list");
  });

  return router;
};
