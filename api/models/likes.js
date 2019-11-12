'use strict';
module.exports = (sequelize, DataTypes) => {
  const Likes = sequelize.define('likes', {
  }, {});
  Likes.associate = function(models) {
    Likes.belongsTo(models.images);
    Likes.belongsTo(models.users);
  };
  return Likes;
};