const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Movie Lists NOW Playing
  router.get("/api/movie/now", async (req, res) => {
    fetchApi(req, res, "movie/now_playing?language=en-US&page=1");
  });

  // Movie Lists Popular
  router.get("/api/movie/popular", async (req, res) => {
    fetchApi(req, res, "movie/popular?language=en-US&page=1");
  });

  // Movie Lists Top Rated
  router.get("/api/movie/top/rated", async (req, res) => {
    fetchApi(req, res, "movie/top_rated?language=en-US&page=1");
  });

  // Movie Lists Upcoming
  router.get("/api/movie/upcoming", async (req, res) => {
    fetchApi(req, res, "movie/upcoming?language=en-US&page=1");
  });

  return router;
};
