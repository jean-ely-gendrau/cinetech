const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // TV Series Details
  router.get("/api/tv/series/details", async (req, res) => {
    fetchApi(req, res, "tv/series_id?language=en-US");
  });

  // TV Series Account States
  router.get("/api/tv/series/account_states", async (req, res) => {
    fetchApi(req, res, "tv/series_id/account_states");
  });

  // TV Series Aggregate Credits
  router.get("/api/tv/series/aggregate_credits", async (req, res) => {
    fetchApi(req, res, "tv/series_id/aggregate_credits?language=en-US");
  });

  // TV Series Alternative Titles
  router.get("/api/tv/series/alternative_titles", async (req, res) => {
    fetchApi(req, res, "tv/series_id/alternative_titles");
  });

  // TV Series Changes
  router.get("/api/tv/series/changes", async (req, res) => {
    fetchApi(req, res, "tv/series_id/changes?page=1");
  });

  // TV Series Content Ratings
  router.get("/api/tv/series/content_ratings", async (req, res) => {
    fetchApi(req, res, "tv/series_id/content_ratings");
  });

  // TV Series Credits
  router.get("/api/tv/series/credits", async (req, res) => {
    fetchApi(req, res, "tv/series_id/credits?language=en-US");
  });

  // TV Series Episode Groups
  router.get("/api/tv/series/episode_groups", async (req, res) => {
    fetchApi(req, res, "tv/series_id/episode_groups");
  });

  // TV Series External IDs
  router.get("/api/tv/series/external_ids", async (req, res) => {
    fetchApi(req, res, "tv/series_id/external_ids");
  });

  // TV Series Images
  router.get("/api/tv/series/images", async (req, res) => {
    fetchApi(req, res, "tv/series_id/images");
  });

  // TV Series Keywords
  router.get("/api/tv/series/keywords", async (req, res) => {
    fetchApi(req, res, "tv/series_id/keywords");
  });

  // TV Series Latest
  router.get("/api/tv/series/latest", async (req, res) => {
    fetchApi(req, res, "tv/latest");
  });

  // TV Series Lists
  router.get("/api/tv/series/lists", async (req, res) => {
    fetchApi(req, res, "tv/series_id/lists?language=en-US&page=1");
  });

  // TV Series Recommendations
  router.get("/api/tv/series/recommendations", async (req, res) => {
    fetchApi(req, res, "tv/series_id/recommendations?language=en-US&page=1");
  });

  // TV Series Reviews
  router.get("/api/tv/series/reviews", async (req, res) => {
    fetchApi(req, res, "tv/series_id/reviews?language=en-US&page=1");
  });

  // TV Series Screened Theatrically
  router.get("/api/tv/series/screened_theatrically", async (req, res) => {
    fetchApi(req, res, "tv/series_id/screened_theatrically");
  });

  // TV Series Similar
  router.get("/api/tv/series/similar", async (req, res) => {
    fetchApi(req, res, "tv/series_id/similar?language=en-US&page=1");
  });

  // TV Series Translations
  router.get("/api/tv/series/translations", async (req, res) => {
    fetchApi(req, res, "tv/series_id/translations");
  });

  // TV Series Videos
  router.get("/api/tv/series/videos", async (req, res) => {
    fetchApi(req, res, "tv/series_id/videos?language=en-US");
  });

  // TV Series Watch Providers
  router.get("/api/tv/series/watch/providers", async (req, res) => {
    fetchApi(req, res, "tv/series_id/watch/providers");
  });

  // TV Series Add Rating
  router.post("/api/tv/series/add/rating", async (req, res) => {
    fetchApi(req, res, "tv/series_id/rating");
  });

  // TV Series Delete Rating
  router.delete("/api/tv/series/add/delete", async (req, res) => {
    fetchApi(req, res, "tv/series_id/rating");
  });
  return router;
};
