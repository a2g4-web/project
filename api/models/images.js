'use strict';
module.exports = (sequelize, DataTypes) => {
  const Images = sequelize.define('images', {
    url: DataTypes.STRING
  }, {});
  Images.associate = function(models) {
    Images.belongsToMany(models.users, {through: 'likes'});
    Images.belongsTo(models.events);
    Images.hasMany(models.commentaries);
  };
  return Images;
};