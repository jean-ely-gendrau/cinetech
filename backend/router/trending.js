const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Trending All
  router.get("/api/trending/all", async (req, res) => {
    fetchApi(req, res, "trending/all/day?language=en-US");
  });

  // Trending Movies
  router.get("/api/trending/movies", async (req, res) => {
    fetchApi(req, res, "trending/movie/day?language=en-US");
  });

  // Trending People
  router.get("/api/trending/people", async (req, res) => {
    fetchApi(req, res, "trending/person/day?language=en-US");
  });

  // Trending TV
  router.get("/api/trending/tv", async (req, res) => {
    fetchApi(req, res, "trending/tv/day?language=en-US");
  });

  return router;
};
