'use strict';
module.exports = (sequelize, DataTypes) => {
  const Articles = sequelize.define('articles', {
    name: DataTypes.STRING,
    description: DataTypes.STRING,
    price: DataTypes.INTEGER,
    imageUrl: DataTypes.STRING
  }, {});
  Articles.associate = function(models) {
    Articles.belongsTo(models.categories);
    Articles.hasMany(models.bought);
  };
  return Articles;
};