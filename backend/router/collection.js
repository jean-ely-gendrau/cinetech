const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // Collection Details
  router.get("/api/collection/details", async (req, res) => {
    fetchApi(req, res, "collection/collection_id?language=en-US");
  });

  // Collection Images
  router.get("/api/collection/images", async (req, res) => {
    fetchApi(req, res, "collection/collection_id/images");
  });

  // Collection Translations
  router.get("/api/collection/translations", async (req, res) => {
    fetchApi(req, res, "collection/collection_id/translations");
  });

  return router;
};
