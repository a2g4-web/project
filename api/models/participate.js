'use strict';
module.exports = (sequelize, DataTypes) => {
  const Participate = sequelize.define('participate', {
  }, {});
  Participate.associate = function(models) {
    Participate.belongsTo(models.users);
    Participate.belongsTo(models.events);
  };
  return Participate;
};