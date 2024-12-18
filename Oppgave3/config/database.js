const { Sequelize } = require("sequelize");
require("dotenv").config();

const sequelize = new Sequelize({
  dialect: "postgres",
  host: "localhost",
  port: 5432,
  username: "postgres",
  password: process.env.SERVER_LOGIN,
  database: process.env.SERVER_NAME,
  pool: {
    max: 5,
    min: 0,
    acquire: 3000,
    idle: 1000,
  },
});

module.exports = sequelize;
