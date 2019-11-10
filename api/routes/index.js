const controller = require('../controllers');
const categoriesController = controller.categories;
const articleController = controller.articles;
const usersController = controller.users;
const usertypesController = controller.usertypes;
const campusController = controller.campus;
const imagesController = controller.images;
const eventsController = controller.events;
const commentariesController = controller.commentaries;

module.exports = (app) => {
    app.get('/api', (req, res) => res.status(200).send({
        message: 'Welcome to Web project API'
    }));

    app.post('/api/category', categoriesController.create);
    app.put('/api/category/:id', categoriesController.update);
    app.get('/api/category/:id', categoriesController.get);
    app.delete('/api/category/:id', categoriesController.delete);
    app.get('/api/categories', categoriesController.all);

    app.post('/api/article', articleController.create);
    app.put('/api/article/:id', articleController.update);
    app.get('/api/article/:id', articleController.get);
    app.delete('/api/article/:id', articleController.delete);
    app.get('/api/articles', articleController.all);

    app.post('/api/user', usersController.create);
    app.put('/api/user/:id', usersController.update);
    app.get('/api/user/:id', usersController.get);
    app.delete('/api/user/:id', usersController.delete);
    app.get('/api/users', usersController.all);

    app.post('/api/usertype', usertypesController.create);
    app.put('/api/usertype/:id', usertypesController.update);
    app.get('/api/usertype/:id', usertypesController.get);
    app.delete('/api/usertype/:id', usertypesController.delete);
    app.get('/api/usertypes', usersController.all);

    app.post('/api/campus', campusController.create);
    app.put('/api/campus/:id', campusController.update);
    app.get('/api/campus/:id', campusController.get);
    app.delete('/api/campus/:id', campusController.delete);
    app.get('/api/campuses', campusController.all);

    app.post('/api/image', imagesController.create);
    app.put('/api/image/:id', imagesController.update);
    app.get('/api/image/:id', imagesController.get);
    app.delete('/api/image/:id', imagesController.delete);
    app.get('/api/images', imagesController.all);

    app.post('/api/event', eventsController.create);
    app.put('/api/event/:id', eventsController.update);
    app.get('/api/event/:id', eventsController.get);
    app.delete('/api/event/:id', eventsController.delete);
    app.get('/api/events', eventsController.all);

    app.post('/api/commentary', commentariesController.create);
    app.put('/api/commentary/:id', commentariesController.update);
    app.get('/api/commentary/:id', commentariesController.get);
    app.delete('/api/commentary/:id', commentariesController.delete);
    app.get('/api/commentaries', commentariesController.all);
};