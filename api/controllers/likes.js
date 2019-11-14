const Likes = require('../models').likes;
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
                    var eventId = req.body.eventId;
                    var userId = decoded['userId'];
                    Likes.findOrCreate({where: {eventId: eventId, userId: userId}, defaults: {eventId: eventId, userId: userId}})
                        .then(result => {
                           if(result[1]) {
                               res.status(201).send(result[0]);
                           }
                           else {
                               res.status(400).json({error: 'user already like this image'});
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
        Likes.findAll({where: {eventId: req.params.id}}).then(results => {
            if(results.length !== 0) {
                res.status(200).send(results);
            }
            else {
                res.status(404).json({error: 'no results found'});
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
                    var eventId = req.body.eventId;
                    var userId = decoded['userId'];
                    Likes.destroy({where: {userId: userId, eventId: eventId}})
                        .then(result => {
                            if(result === 1) {
                                res.status(205).json({success: 'like deleted'});
                            }
                            else {
                                res.status(500).json({error: 'no like found'})
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
