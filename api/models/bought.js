'use strict';
module.exports = (sequelize, DataTypes) => {
  const Bought = sequelize.define('bought', {
  }, {});
  Bought.associate = function(models) {
    Bought.belongsTo(models.users);
    Bought.belongsTo(models.articles);
  };
  return Bought;
};