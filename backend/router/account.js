const router = require("express").Router();
const { fetchApi } = require("../components/fetchApi");

module.exports = function ({ id }) {
  // Account Details
  router.get("/api/account/details", async (req, res) => {
    fetchApi(req, res, `account/${id}`);
  });

  // Account Add Favoris
  router.post("/api/account/add/favorite", async (req, res) => {
    fetchApi(req, res, `account/${id}/favorite`);
  });

  // Account Add Watchlist
  router.post("/api/account/add/watchlist", async (req, res) => {
    fetchApi(req, res, `account/${id}/watchlist`);
  });

  // Account Favorite Movies
  router.get("/api/account/favorite/movie", async (req, res) => {
    fetchApi(
      req,
      res,
      `account/${id}/favorite/movies?language=en-US&page=1&sort_by=created_at.asc`
    );
  });

  // Account Favorite TV
  router.get("/api/account/favorite/tv", async (req, res) => {
    fetchApi(
      req,
      res,
      `account/${id}/favorite/tv?language=en-US&page=1&sort_by=created_at.asc`
    );
  });

  // Account Lists
  router.get("/api/account/lists", async (req, res) => {
    fetchApi(req, res, `account/${id}/lists?page=1`);
  });

  // Account Rated Movies
  router.get("/api/account/rated/movies", async (req, res) => {
    fetchApi(
      req,
      res,
      `account/${id}/rated/movies?language=en-US&page=1&sort_by=created_at.asc`
    );
  });

  // Account Rated TV
  router.get("/api/account/rated/tv", async (req, res) => {
    fetchApi(
      req,
      res,
      `account/${id}/rated/tv?language=en-US&page=1&sort_by=created_at.asc`
    );
  });

  // Account Rated TV Episodes
  router.get("/api/account/rated/tv/episode", async (req, res) => {
    fetchApi(
      req,
      res,
      `account/${id}/rated/tv/episodes?language=en-US&page=1&sort_by=created_at.asc`
    );
  });

  // Account Watchlist Movies
  router.get("/api/account/watchlist/movies", async (req, res) => {
    fetchApi(
      req,
      res,
      `account/${id}/watchlist/movies?language=en-US&page=1&sort_by=created_at.asc`
    );
  });

  // Account Watchlist Movies
  router.get("/api/account/watchlist/tv", async (req, res) => {
    fetchApi(
      req,
      res,
      `account/${id}/watchlist/tv?language=en-US&page=1&sort_by=created_at.asc`
    );
  });

  return router;
};
