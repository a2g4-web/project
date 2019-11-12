'use strict';
module.exports = (sequelize, DataTypes) => {
  const Campus = sequelize.define('campus', {
    location: DataTypes.STRING
  }, {});
  Campus.associate = function(models) {
    Campus.hasMany(models.users);
  };
  return Campus;
};