const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Find By ID
  router.get("/api/find", async (req, res) => {
    fetchApi(req, res, "find/external_id?external_source=");
  });

  return router;
};
