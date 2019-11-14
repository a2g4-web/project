'use strict';
module.exports = (sequelize, DataTypes) => {
  const Images = sequelize.define('images', {
    url: DataTypes.STRING
  }, {});
  Images.associate = function(models) {
    Images.belongsTo(models.events);
  };
  return Images;
};