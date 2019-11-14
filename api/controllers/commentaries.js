const Commentaries = require('../models').commentaries;
const Events = require('../models').events;
const Users = require('../models').users;

module.exports = {
    create(req, res) {
        Commentaries.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    res.status(201).send('commentary created');
                }
                else {
                    res.status(400).send('commentary already exists');
                }
            });
    },
    update(req, res) {
        Commentaries.update(req.body, {where: req.params})
            .then(affected => {
                if(affected[0]) {
                    res.status(200).send('commentary updated');
                }
                else {
                    res.status(400).send('commentary not updated');
                }
            });
    },
    get(req, res) {
        Commentaries.findOne({where: req.params, include: [Users, Events]}).then(result => {
            if(result == null) {
                res.status(404).send('commentary not found');
            }
            else {
                res.status(200).send(result);
            }
        });
    },
    delete(req, res) {
        Commentaries.destroy({where: req.params}).then(result => {
            if(result === 1) {
                res.status(205).send('commentary deleted');
            }
            else {
                res.status(404).send('commentary not found');
            }
        });
    },
    all(req, res) {
        Commentaries.findAll({include: [Users, Events]}).then(result => {
            if(result.length !== 0) {
                res.status(200).send(result);
            }
            else {
                res.status(404).send('No commentaries found');
            }
        });
    }
};