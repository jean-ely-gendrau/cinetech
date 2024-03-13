const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Networks Details
  router.get("/api/network/details", async (req, res) => {
    fetchApi(req, res, "network/network_id");
  });

  // Networks Alternative Names
  router.get("/api/network/alternative/names", async (req, res) => {
    fetchApi(req, res, "network/network_id/alternative_names");
  });

  // Networks Images
  router.get("/api/network/images", async (req, res) => {
    fetchApi(req, res, "network/network_id/images");
  });
  return router;
};
