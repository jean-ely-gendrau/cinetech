const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Create Guest Session
  router.get("/api/auth/guest_session/new", async (req, res) => {
    fetchApi(req, res, "authentication/guest_session/new");
  });

  // Create Request Token
  router.get("/api/auth/token/new", async (req, res) => {
    fetchApi(req, res, "authentication/token/new");
  });

  // Create Session
  router.post("/api/auth/session/new", async (req, res) => {
    fetchApi(req, res, "authentication/session/new");
  });

  // Create Session With Login
  router.post("/api/auth/token/login", async (req, res) => {
    fetchApi(req, res, "authentication/token/validate_with_login");
  });

  // Delete Session
  router.delete("/api/auth/delete/session", async (req, res) => {
    fetchApi(req, res, "authentication/session");
  });

  // Validate Key
  router.get("/api/auth", async (req, res) => {
    fetchApi(req, res, "authentication");
  });

  return router;
};
