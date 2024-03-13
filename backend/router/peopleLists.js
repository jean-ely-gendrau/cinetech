const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // People Lists Popular
  router.get("/api/person/popular", async (req, res) => {
    fetchApi(req, res, "person/popular?language=en-US&page=1");
  });

  return router;
};
