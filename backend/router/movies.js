const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Movie Details
  router.get("/api/movie", async (req, res) => {
    fetchApi(req, res, "movie/movie_id?language=en-US");
  });

  // Movie Account States
  router.get("/api/movie", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/account_states");
  });

  // Movie Alternative title
  router.get("/api/movie/alternative/title", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/alternative_titles");
  });

  // Movie Change
  router.get("/api/movie/change", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/changes?page=1");
  });

  // Movie Credits
  router.get("/api/movie/credits", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/credits?language=en-US");
  });

  // Movie External IDs
  router.get("/api/movie/external/id", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/external_ids");
  });

  // Movie Images
  router.get("/api/movie/images", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/images");
  });

  // Movie Keywords
  router.get("/api/movie/keywords", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/keywords");
  });

  // Movie latest
  router.get("/api/movie/latest", async (req, res) => {
    fetchApi(req, res, "movie/latest");
  });

  // Movie Lists
  router.get("/api/movie/lists", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/lists?language=en-US&page=1");
  });

  // Movie Recommendations
  router.get("/api/movie/recommendations", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/recommendations?language=en-US&page=1");
  });

  // Movie Release Dates
  router.get("/api/movie/release/dates", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/release_dates");
  });

  // Movie Similar
  router.get("/api/movie/similar", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/similar?language=en-US&page=1");
  });

  // Movie Translations
  router.get("/api/movie/translations", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/translations");
  });

  // Movie Videos Clip
  router.get("/api/movie/videos", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/videos?language=en-US");
  });

  // Movie Watch Providers
  router.get("/api/movie/watch/providers", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/watch/providers");
  });

  // Movie Add Rating
  router.post("/api/movie/add/rating", async (req, res) => {
    fetchApi(req, res, "movie/movie_id/rating");
  });

  // Movie Delete Rating
  router.delete("/api/movie/delete/rating", async (req, res) => {
    fetchApi(req, res, "/movie/movie_id/rating");
  });

  return router;
};
