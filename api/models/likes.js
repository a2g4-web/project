'use strict';
module.exports = (sequelize, DataTypes) => {
  const Likes = sequelize.define('likes', {
  }, {});
  Likes.associate = function(models) {
    Likes.belongsTo(models.events);
    Likes.belongsTo(models.users);
  };
  return Likes;
};