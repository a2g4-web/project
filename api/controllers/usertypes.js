const Usertypes = require('../models').usertypes;
module.exports = {
    create(req, res) {
        Usertypes.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    res.status(201).send('User type created');
                }
                else {
                    res.status(400).send('User type already exists');
                }
            });
    },
    update(req, res) {
        Usertypes.update(req.body, {where: req.params})
            .then(affected => {
                if(affected[0]) {
                    res.status(200).send('User type updated');
                }
                else {
                    res.status(400).send('User type not updated');
                }
            });
    },
    get(req, res) {
        Usertypes.findOne({where: req.params}).then(result => {
            if(result == null) {
                res.status(404).send('User type not found');
            }
            else {
                res.status(200).send(result);
            }
        });
    },
    delete(req, res) {
        Usertypes.destroy({where: req.params}).then(result => {
            if(result === 1) {
                res.status(205).send('User type deleted');
            }
            else {
                res.status(404).send('User type not found');
            }
        });
    },
    all(req, res) {
        Usertypes.findAll().then(result => {
            if(result.length !== 0) {
                res.status(200).send(result);
            }
            else {
                res.status(404).send('No user types found');
            }
        });
    }
};