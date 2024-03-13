const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Company Details
  router.get("/api/company", async (req, res) => {
    fetchApi(req, res, "company/company_id");
  });

  // Company Alternative Names
  router.get("/api/company/alternative_names", async (req, res) => {
    fetchApi(req, res, "company/company_id/alternative_names");
  });

  // Company Images
  router.get("/api/company/images", async (req, res) => {
    fetchApi(req, res, "company/company_id/images");
  });

  return router;
};
