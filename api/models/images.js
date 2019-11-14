'use strict';
module.exports = (sequelize, DataTypes) => {
  const Images = sequelize.define('images', {
    url: DataTypes.STRING
  }, {});
  Images.associate = function(models) {
    Images.hasMany(models.likes);
    Images.belongsTo(models.events);
  };
  return Images;
};