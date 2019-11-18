const Bought = require('../models').bought;
const Users = require('../models').users;
const Articles = require('../models').articles;
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
                    var articleId = req.params.id;
                    Bought.create({defaults: {userId: userId, articleId: articleId}})
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
        Bought.findAll({include: [Users, Articles]})
            .then(results => {
                if(results.length !== 0) {
                    res.status(200).send(results);
                }
                else {
                    res.status(404).json({error: 'No bought found'});
                }
            });
    }
};