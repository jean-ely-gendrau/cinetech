const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Search Collection
  router.get("/api/search/collection", async (req, res) => {
    fetchApi(
      req,
      res,
      "search/collection?include_adult=false&language=en-US&page=1"
    );
  });

  // Search Company
  router.get("/api/search/company", async (req, res) => {
    fetchApi(req, res, "search/company?page=1");
  });

  // Search Keyword
  router.get("/api/search/keyword", async (req, res) => {
    fetchApi(req, res, "search/keyword?page=1");
  });

  // Search Movie
  router.get("/api/search/movie", async (req, res) => {
    fetchApi(
      req,
      res,
      "search/movie?include_adult=false&language=en-US&page=1"
    );
  });

  // Search Person
  router.get("/api/search/person", async (req, res) => {
    fetchApi(req, res, "person?include_adult=false&language=en-US&page=1");
  });

  // Search Tv
  router.get("/api/search/tv", async (req, res) => {
    fetchApi(req, res, "search/tv?include_adult=false&language=en-US&page=1");
  });

  return router;
};
