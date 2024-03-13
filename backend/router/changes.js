const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Movie List
  router.get("/api/movie/changes", async (req, res) => {
    fetchApi(req, res, "movie/changes?page=1");
  });

  // People List
  router.get("/api/person/changes", async (req, res) => {
    fetchApi(req, res, "person/changes?page=1");
  });

  // TV List
  router.get("/api/tv/changes", async (req, res) => {
    fetchApi(req, res, "tv/changes?page=1");
  });

  return router;
};
