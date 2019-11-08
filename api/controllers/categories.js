const Categories = require('../models').Categories;
module.exports = {
    create(req, res) {
        return Categories.create({
            name: req.body.name
        }).then(categories => res.status(201).send(categories))
            .catch(error => res.status(400).send(error));
    }
};