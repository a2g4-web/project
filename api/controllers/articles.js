const Articles = require('../models').articles;
const Categories = require('../models').categories;
module.exports = {
    create(req, res) {
        Articles.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    res.status(201).send('article created');
                }
                else {
                    res.status(400).send('article already exists');
                }
            });
    },
    update(req, res) {
        Articles.update(req.body, {where: req.params})
            .then(affected => {
                if(affected[0]) {
                    res.status(200).send('article updated');
                }
                else {
                    res.status(400).send('article not updated');
                }
            });
    },
    get(req, res) {
        Articles.findOne({where: req.params, include: [Categories]}).then(result => {
            if(result == null) {
                res.status(404).send('article not found');
            }
            else {
                res.status(200).send(result);
            }
        });
    },
    delete(req, res) {
        Articles.destroy({where: req.params}).then(result => {
            if(result === 1) {
                res.status(205).send('article deleted');
            }
            else {
                res.status(404).send('article not found');
            }
        });
    }
};