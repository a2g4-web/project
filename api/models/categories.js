'use strict';
module.exports = (sequelize, DataTypes) => {
  const Categories = sequelize.define('Categories', {
    name: DataTypes.STRING,
  }, {});
  Categories.associate = function(models) {

  };
  return Categories;
};