const Users = require('../models').users;
const Usertypes = require('../models').usertypes;
const Campus = require('../models').campus;

const jwt = require('jsonwebtoken');

module.exports = {
    create(req, res) {
        Users.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    var created = result[0];
                    res.status(201).send(jwt.sign({
                        userId: created['id'],
                        name: created['first_name'] + ' ' + created['last_name'],
                        email: created['email']
                    }, process.env.JWT_SECRET, {
                        expiresIn: '24h'
                    }));
                }
                else {
                    res.status(400).send('user already exists');
                }
            });
    },
    update(req, res) {
        Users.update(req.body, {where: req.params})
            .then(affected => {
                if(affected[0]) {
                    res.status(200).send('user updated');
                }
                else {
                    res.status(400).send('user not updated');
                }
            });
    },
    get(req, res) {
        Users.findOne({where: req.params, include: [Usertypes, Campus]}).then(result => {
            if(result == null) {
                res.status(404).send('user not found');
            }
            else {
                res.status(200).send(result);
            }
        });
    },
    delete(req, res) {
        Users.destroy({where: req.params}).then(result => {
            if(result === 1) {
                res.status(205).send('user deleted');
            }
            else {
                res.status(404).send('user not found');
            }
        });
    },
    all(req, res) {
        Users.findAll({include: [Usertypes, Campus]}).then(result => {
            if(result.length !== 0) {
                res.status(200).send(result);
            }
            else {
                res.status(404).send('No users found');
            }
        });
    }
};