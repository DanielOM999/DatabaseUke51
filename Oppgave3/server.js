const express = require("express");
require("dotenv").config();
const syncDatabase = require("./sync");
const app = express();
const PORT = 10002;

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

syncDatabase()
  .then(() => {
    console.log("Starting the server...");
    app.listen(PORT, () => {
      console.log(`Server started on port ${PORT}`);
    });
  })
  .catch((error) => {
    console.error("Error syncing database, server not started:", error);
  });
