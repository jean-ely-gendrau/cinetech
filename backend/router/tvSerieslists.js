const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // TV Series Lists Airing Today
  router.get("/api/tv/series/lists/airing_today", async (req, res) => {
    fetchApi(req, res, "tv/airing_today?language=en-US&page=1");
  });

  // TV Series Lists On The Air
  router.get("/api/tv/series/lists/on_the_air", async (req, res) => {
    fetchApi(req, res, "tv/on_the_air?language=en-US&page=1");
  });

  // TV Series Lists Popular
  router.get("/api/tv/series/lists/popular", async (req, res) => {
    fetchApi(req, res, "tv/popular?language=en-US&page=1");
  });

  // TV Series Lists Top Rated
  router.get("/api/tv/series/lists/top_rated", async (req, res) => {
    fetchApi(req, res, "tv/top_rated?language=en-US&page=1");
  });

  return router;
};
