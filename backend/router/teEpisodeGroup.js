const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function () {
  // TV Episode Group Details
  router.get("/api/tv/episode/group", async (req, res) => {
    fetchApi(req, res, "tv/episode_group/tv_episode_group_id");
  });

  return router;
};
