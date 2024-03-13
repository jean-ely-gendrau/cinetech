const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Review Details
  router.get("/api/find", async (req, res) => {
    fetchApi(req, res, "review/review_id");
  });

  return router;
};
