'use strict';
module.exports = (sequelize, DataTypes) => {
  const Articles = sequelize.define('articles', {
    name: DataTypes.STRING,
    description: DataTypes.STRING,
    price: DataTypes.INTEGER
  }, {});
  Articles.associate = function(models) {
    Articles.belongsTo(models.categories);
    Articles.belongsToMany(models.users,{through: 'bought'});
  };
  return Articles;
};