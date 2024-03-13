const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // People Details
  router.get("/api/person/details", async (req, res) => {
    fetchApi(req, res, "person/person_id?language=en-US");
  });

  // People Changes
  router.get("/api/person/changes", async (req, res) => {
    fetchApi(req, res, "person/person_id/changes?page=1");
  });

  // People Combined Credits
  router.get("/api/person/combined/credits", async (req, res) => {
    fetchApi(req, res, "person/person_id/combined_credits?language=en-US");
  });

  // People External ID
  router.get("/api/person/external/id", async (req, res) => {
    fetchApi(req, res, "person/person_id/external_ids");
  });

  // People Images
  router.get("/api/person/images", async (req, res) => {
    fetchApi(req, res, "person/person_id/images");
  });

  // People Latest
  router.get("/api/person/latest", async (req, res) => {
    fetchApi(req, res, "person/latest");
  });

  // People Movie Credits
  router.get("/api/person/movie/credits", async (req, res) => {
    fetchApi(req, res, "person/person_id/movie_credits?language=en-US");
  });

  // People TV Credits
  router.get("/api/person/tv/credits", async (req, res) => {
    fetchApi(req, res, "person/person_id/tv_credits?language=en-US");
  });

  // People Tagged Images
  router.get("/api/person/tagged/images", async (req, res) => {
    fetchApi(req, res, "person/person_id/tagged_images?page=1");
  });

  // People Translations
  router.get("/api/person/translations", async (req, res) => {
    fetchApi(req, res, "person/person_id/translations");
  });

  return router;
};
