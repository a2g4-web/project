const Users = require('../models').users;
const Usertypes = require('../models').usertypes;
const Campus = require('../models').campus;

const jwt = require('jsonwebtoken');

function getUser(userId, res) {
    Users.findOne({where: {id: userId}, include: [Usertypes, Campus]}).then(result => {
        if(result == null) {
            res.status(404).send('user not found');
        }
        else {
            res.status(200).send(result);
        }
    });
}

module.exports = {
    create(req, res) {
        Users.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    res.status(201).json({success: 'user created'});
                }
                else {
                    res.status(400).send('user already exists');
                }
            });
    },
    get(req, res) {
        getUser(req.params.id, res);
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
    },
    login(req, res) {
        Users.findOne({where: req.body}).then(result => {
            if(result == null) {
                res.status(404).json({error: 'user not found'});
            }
            else {
                res.status(200).send(jwt.sign({
                    userId: result['id']
                }, process.env.JWT_SECRET, {
                    expiresIn: '24h'
                }));
            }
        });
    },
    me(req, res) {
        var token = req.headers.authorization;
        if(token != null) {
            token = token.replace('Bearer ', '');
            jwt.verify(token, process.env.JWT_SECRET, (err, decoded) => {
                if(err) {
                    res.status(500).json({error: 'invalid token'});
                }
                else {
                    var userId = decoded['userId'];
                    getUser(userId, res);
                }
            });
        }
        else {
            res.status(500).json({error: 'token required'});
        }
    }
};