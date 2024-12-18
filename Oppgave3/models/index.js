const sequelize = require("../config/database");
const Actor = require("./actorTable");
const Movie = require("./movieTable");
const genreTable = require("./genreTable");

Movie.belongsToMany(Actor, { through: "MovieActor" });
Movie.belongsTo(genreTable, { foreignKey: "genreId" });
genreTable.hasMany(Movie, { foreignKey: "genreId" });
Actor.belongsToMany(Movie, { through: "MovieActor" });

module.exports = { sequelize, Actor, Movie };
