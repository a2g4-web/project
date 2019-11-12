'use strict';
module.exports = (sequelize, DataTypes) => {
  const Categories = sequelize.define('categories', {
    name: DataTypes.STRING,
  }, {});
  Categories.associate = function(models) {
    Categories.hasMany(models.articles);
  };
  return Categories;
};