const controller = require('../controllers');
const categoriesController = controller.categories;
const articleController = controller.articles;

module.exports = (app) => {
    app.get('/api', (req, res) => res.status(200).send({
        message: 'Welcome to Web project API'
    }));

    app.post('/api/category', categoriesController.create);
    app.put('/api/category/:id', categoriesController.update);
    app.get('/api/category/:id', categoriesController.get);
    app.delete('/api/category/:id', categoriesController.delete);

    app.post('/api/article', articleController.create);
    app.put('/api/article/:id', articleController.update);
    app.get('/api/article/:id', articleController.get);
    app.delete('/api/article/:id', articleController.delete);
};