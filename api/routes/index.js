const categoriesController = require('../controllers').categories;

module.exports = (app) => {
    app.get('/api', (req, res) => res.status(200).send({
        message: 'Welcome to Web project API'
    }));

    app.post('/api/category', categoriesController.create);
};