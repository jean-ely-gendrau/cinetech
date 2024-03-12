const express = require("express");
//require("dotenv").config(); // Load environment variables

const app = express();
const port = 8887;

// Serve the index.html page
app.get("/", (req, res) => {
  res.sendFile("index.php", { root: __dirname });
});

const fs = require("fs");
/* backslash for windows, in unix it would be forward slash */
const routes_directory = require("path").resolve(__dirname) + "/router/";

fs.readdirSync(routes_directory).forEach((route_file) => {
  try {
    app.use("/", require(routes_directory + route_file)());
  } catch (error) {
    console.log(`Encountered Error initializing routes from ${route_file}`);
    console.log(error);
  }
});

app.listen(port, () => {
  console.log(`Server is running on http://localhost:${port}`);
});
