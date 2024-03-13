const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Keyword Details
  router.get("/api/keyword", async (req, res) => {
    fetchApi(req, res, "keyword/keyword_id");
  });

  // Keyword Movies
  router.get("/api/keyword/movies", async (req, res) => {
    fetchApi(
      req,
      res,
      "keyword/keyword_id/movies?include_adult=false&language=en-US&page=1"
    );
  });

  return router;
};
