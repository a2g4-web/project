const Events = require('../models').events;

module.exports = {
    create(req, res) {
        Events.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    res.status(201).send('event created');
                }
                else {
                    res.status(400).send('event already exists');
                }
            });
    },
    update(req, res) {
        Events.update(req.body, {where: req.params})
            .then(affected => {
                if(affected[0]) {
                    res.status(200).send('event updated');
                }
                else {
                    res.status(400).send('event not updated');
                }
            });
    },
    get(req, res) {
        Events.findOne({where: req.params}).then(result => {
            if(result == null) {
                res.status(404).send('event not found');
            }
            else {
                res.status(200).send(result);
            }
        });
    },
    delete(req, res) {
        Events.destroy({where: req.params}).then(result => {
            if(result === 1) {
                res.status(205).send('event deleted');
            }
            else {
                res.status(404).send('event not found');
            }
        });
    },
    all(req, res) {
        Events.findAll().then(result => {
            if(result.length !== 0) {
                res.status(200).send(result);
            }
            else {
                res.status(404).send('No events found');
            }
        });
    }
};