const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // TV Season Details
  router.get("/api/tv/series/season/details", async (req, res) => {
    fetchApi(
      req,
      res,
      `tv/${req.query.series_id}/season/${req.query.season_number}?language=fr-FR&region=fr&append_to_response=videos,images,similar,recommendations,credits`
    );
  });

  // TV Season Account States
  router.get("/api/tv/series/season/account_states", async (req, res) => {
    fetchApi(req, res, "tv/series_id/season/season_number/account_states");
  });

  // TV Season Aggregate Credits
  router.get("/api/tv/series/season/aggregate_credits", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/aggregate_credits?language=en-US"
    );
  });

  // TV Season Changes
  router.get("/api/tv/series/season/changes", async (req, res) => {
    fetchApi(req, res, "tv/season/season_id/changes?page=1");
  });

  // TV Season Credits
  router.get("/api/tv/series/season/credits", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/credits?language=en-US"
    );
  });

  // TV Season Externals IDs
  router.get("/api/tv/series/season/external_ids", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/episode/episode_number/external_ids"
    );
  });

  // TV Season Images
  router.get("/api/tv/series/season/external_ids", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/episode/episode_number/images"
    );
  });

  // TV Season Translations
  router.get("/api/tv/series/season/translations", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/episode/episode_number/translations"
    );
  });

  // TV Season Videos
  router.get("/api/tv/series/season/translations", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/episode/episode_number/videos?language=en-US"
    );
  });

  // TV Season Add Rating
  router.post("/api/tv/series/season/add/rating", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/episode/episode_number/rating"
    );
  });

  // TV Season Delete Rating
  router.delete("/api/tv/series/season/add/rating", async (req, res) => {
    fetchApi(
      req,
      res,
      "tv/series_id/season/season_number/episode/episode_number/rating"
    );
  });
  return router;
};
