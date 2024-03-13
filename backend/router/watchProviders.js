const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Watch Providers Available Regions
  router.get("/api/watc/providers/regions", async (req, res) => {
    fetchApi(req, res, "watch/providers/regions?language=en-US");
  });

  // Watch Providers Movie
  router.get("/api/watc/providers/movie", async (req, res) => {
    fetchApi(req, res, "watch/providers/movie?language=en-US");
  });

  // Watch Providers TV
  router.get("/api/watc/providers/tv", async (req, res) => {
    fetchApi(req, res, "watch/providers/tv?language=en-US");
  });

  return router;
};
