const Participate = require('../models').participate;
const Users = require('../models').users;

const jwt = require('jsonwebtoken');

module.exports = {
    create(req, res) {
        var token = req.headers.authorization;
        if(token != null) {
            token = token.replace('Bearer ', '');
            jwt.verify(token, process.env.JWT_SECRET, (err, decoded) => {
                if(err) {
                    res.status(500).json({error: 'Invalid token'});
                }
                else {
                    var userId = decoded['userId'];
                    var eventId = req.params.id;
                    Participate.findOrCreate({where: {eventId: eventId, userId: userId}, defaults: {userId: userId, eventId: eventId}})
                        .then(result => {
                            if(result[1]) {
                                res.status(201).send(result[0]);
                            }
                            else {
                                res.status(400).json({error: 'User already participate to this event'});
                            }
                        });
                }
            });
        }
        else {
            res.status(400).json({error: 'token required'});
        }
    },
    all(req, res) {
        Participate.findAll({where: {eventId: req.params.id}, include: [Users]}).then(results => {
           if(results.length !== 0) {
               res.status(200).send(results);
           }
           else {
               res.status(404).json({error: 'No participants found'});
           }
        });
    },
    delete(req, res) {
        var token = req.headers.authorization;
        if(token != null) {
            token = token.replace('Bearer ', '');
            jwt.verify(token, process.env.JWT_SECRET, (err, decoded) => {
                if(err) {
                    res.status(500).json({error: 'Invalid token'});
                }
                else {
                    var userId = decoded['userId'];
                    var eventId = req.params.id;
                    Participate.destroy({where: {eventId: eventId, userId: userId}})
                        .then(result => {
                            if(result === 1) {
                                res.status(205).json({success: 'participation deleted'});
                            }
                            else {
                                res.status(400).json({error: 'User already participate to this event'});
                            }
                        });
                }
            });
        }
        else {
            res.status(400).json({error: 'token required'});
        }
    }
};