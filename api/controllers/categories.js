const Categories = require('../models').categories;
module.exports = {
    create(req, res) {
        Categories.findOrCreate({where: req.body, defaults: req.body})
            .then(result => {
                if(result[1]) {
                    res.status(201).send('category created');
                }
                else {
                    res.status(400).send('category already exists');
                }
            });
    },
    update(req, res) {
        Categories.update({name: req.body.name}, {where: req.params})
            .then(affected => {
                console.log(affected);
                if(affected[0]) {
                    res.status(200).send('category updated');
                }
                else {
                    res.status(400).send('category not updated');
                }
            });
    },
    get(req, res) {
        Categories.findOne({where: req.params}).then(result => {
            if(result == null) {
                res.status(404).send('category not found');
            }
            else {
                res.status(200).send(result);
            }
        });
    },
    delete(req, res) {
        Categories.destroy({where: req.params}).then(result => {
            if(result === 1) {
                res.status(205).send('category deleted');
            }
            else {
                res.status(404).send('category not found');
            }
        });
    }
};