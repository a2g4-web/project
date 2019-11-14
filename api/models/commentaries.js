'use strict';
module.exports = (sequelize, DataTypes) => {
  const Commentaries = sequelize.define('commentaries', {
    commentary: DataTypes.TEXT
  }, {});
  Commentaries.associate = function(models) {
    Commentaries.belongsTo(models.events);
    Commentaries.belongsTo(models.users);
  };
  return Commentaries;
};