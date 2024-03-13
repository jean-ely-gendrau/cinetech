const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // List Add Movie
  router.post("/api/list/add/movie", async (req, res) => {
    fetchApi(req, res, "list/list_id/add_item");
  });

  // List Check item status
  router.get("/api/list/check/items/status", async (req, res) => {
    fetchApi(req, res, "list/list_id/item_status?language=en-US");
  });

  // List Clear
  router.get("/api/list/clear", async (req, res) => {
    fetchApi(req, res, "list/list_id/clear?confirm=false");
  });

  // List Create
  router.post("/api/list/create", async (req, res) => {
    fetchApi(req, res, "list");
  });

  // List Delete
  router.delete("/api/list/delete", async (req, res) => {
    fetchApi(req, res, "list/list_id");
  });

  // List Remove Movie
  router.get("/api/list/remove/movie", async (req, res) => {
    fetchApi(req, res, "list/list_id/remove_item");
  });

  return router;
};
