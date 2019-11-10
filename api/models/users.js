'use strict';
module.exports = (sequelize, DataTypes) => {
  const Users = sequelize.define('users', {
    last_name: DataTypes.STRING,
    first_name: DataTypes.STRING,
    email: DataTypes.STRING,
    password: DataTypes.STRING
  }, {});
  Users.associate = function(models) {
    Users.belongsToMany(models.articles, {through: 'bought'});
    Users.belongsToMany(models.images, {through: 'likes'});
    Users.belongsToMany(models.events, {through: 'participate'});
    Users.belongsTo(models.usertypes);
    Users.belongsTo(models.campus);
    Users.hasMany(models.commentaries);
  };
  return Users;
};