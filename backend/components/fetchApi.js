// Handle the API request
const axios = require("axios");

const API_ADDR = "https://api.themoviedb.org/3";

exports.fetchApi = async (req, res, endpoint) => {
  try {
    const apiKey = process.env.API_KEY;
    // Make the API request using the apiKey
    const response = await axios.get(`${API_ADDR}/${endpoint}`, {
      headers: {
        accept: "application/json",
        Authorization: `Bearer ${apiKey}`,
      },
    });

    res.json(response.data);
  } catch (error) {
    res
      .status(500)
      .json({ error: "Ooops erreur 500 : " + error.response.status });
  }
};
