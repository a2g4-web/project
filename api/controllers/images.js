const Images = require('../models').images;
const Events = require('../models').events;

module.exports = {
    create(req, res) {
        Images.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    res.status(201).send('image created');
                }
                else {
                    res.status(400).send('image already exists');
                }
            });
    },
    update(req, res) {
        Images.update(req.body, {where: req.params})
            .then(affected => {
                if(affected[0]) {
                    res.status(200).send('image updated');
                }
                else {
                    res.status(400).send('image not updated');
                }
            });
    },
    get(req, res) {
        Images.findOne({where: req.params, include: [Events]}).then(result => {
            if(result == null) {
                res.status(404).send('image not found');
            }
            else {
                res.status(200).send(result);
            }
        });
    },
    delete(req, res) {
        Images.destroy({where: req.params}).then(result => {
            if(result === 1) {
                res.status(205).send('image deleted');
            }
            else {
                res.status(404).send('image not found');
            }
        });
    },
    all(req, res) {
        Images.findAll({where: {eventId: req.params.id}, include: [Events]}).then(result => {
            if(result.length !== 0) {
                res.status(200).send(result);
            }
            else {
                res.status(404).send('No images found');
            }
        });
    }
};