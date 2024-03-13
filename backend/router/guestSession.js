const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Guest SESSION Related Movies
  router.get("/api/guest/session/related/movies", async (req, res) => {
    fetchApi(
      req,
      res,
      "guest_session/guest_session_id/rated/movies?language=en-US&page=1&sort_by=created_at.asc"
    );
  });

  // Guest SESSION Related TV
  router.get("/api/guest/session/related/tv", async (req, res) => {
    fetchApi(
      req,
      res,
      "guest_session/guest_session_id/rated/tv?language=en-US&page=1&sort_by=created_at.asc"
    );
  });

  // Guest SESSION Related TV Episodes
  router.get("/api/guest/session/related/tv/episodes", async (req, res) => {
    fetchApi(
      req,
      res,
      "guest_session/guest_session_id/rated/tv/episodes?language=en-US&page=1&sort_by=created_at.asc"
    );
  });

  return router;
};
