const { DataTypes } = require("sequelize");
const sequelize = require("../config/database");

const genreTable = sequelize.define(
  "genreTable",
  {
    id: {
      type: DataTypes.UUID,
      defaultValue: DataTypes.UUIDV4,
      primaryKey: true,
      allowNull: false,
    },
    name: {
      type: DataTypes.STRING,
      allowNull: false,
      unique: true,
    },
  },
  {
    tableName: "genreTable",
    timestamps: true,
  }
);

module.exports = genreTable;
