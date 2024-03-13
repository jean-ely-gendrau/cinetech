const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Configuration Details
  router.get("/api/config/details", async (req, res) => {
    fetchApi(req, res, "configuration");
  });

  // Configuration Countries
  router.get("/api/config/countries", async (req, res) => {
    fetchApi(req, res, "configuration/countries?language=en-US");
  });

  // Configuration Jobs
  router.get("/api/config/jobs", async (req, res) => {
    fetchApi(req, res, "configuration/jobs");
  });

  // Configuration Languages
  router.get("/api/config/jobs", async (req, res) => {
    fetchApi(req, res, "configuration/languages");
  });

  // Configuration Primary Translation
  router.get("/api/config/trans/primary", async (req, res) => {
    fetchApi(req, res, "configuration/primary_translations");
  });

  // Configuration Timezones
  router.get("/api/config/timezones", async (req, res) => {
    fetchApi(req, res, "configuration/timezones");
  });

  return router;
};
