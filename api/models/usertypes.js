'use strict';
module.exports = (sequelize, DataTypes) => {
  const Usertypes = sequelize.define('usertypes', {
    type: DataTypes.STRING
  }, {});
  Usertypes.associate = function(models) {
    Usertypes.hasMany(models.users);
  };
  return Usertypes;
};