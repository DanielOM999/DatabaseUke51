const { sequelize } = require("./models");

const syncDatabase = async () => {
  try {
    await sequelize.authenticate();
    console.log("Database connected successfully.");
    await sequelize.sync({ alter: true });
    console.log("Database synchronized.");
  } catch (error) {
    console.error("Error syncing database:", error);
    throw error;
  }
};

module.exports = syncDatabase;
