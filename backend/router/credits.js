const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Credits
  router.get("/api/credit", async (req, res) => {
    fetchApi(req, res, "credit/credit_id");
  });

  return router;
};
