'use strict';
module.exports = (sequelize, DataTypes) => {
  const Events = sequelize.define('events', {
    name: DataTypes.STRING,
    location: DataTypes.STRING,
    date: DataTypes.DATE,
    description: DataTypes.TEXT,
    price: {
      type: DataTypes.INTEGER,
      defaultValue: 0
    }
  }, {});
  Events.associate = function(models) {
    Events.hasMany(models.images);
    Events.belongsToMany(models.users, {through: 'participate'})
  };
  return Events;
};