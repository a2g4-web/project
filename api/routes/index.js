const controller = require('../controllers');
const categoriesController = controller.categories;
const articleController = controller.articles;
const usersController = controller.users;
const usertypesController = controller.usertypes;
const campusController = controller.campus;
const imagesController = controller.images;
const eventsController = controller.events;
const commentariesController = controller.commentaries;
const participateController = controller.participate;
const likesController = controller.likes;

const jwt = require('jsonwebtoken');

function checkToken(req, res, next) {
    var auth = req.headers['authorization'];
    if(auth != null) {
        auth = auth.replace('Bearer ', '');
        jwt.verify(auth, process.env.JWT_SECRET, (err, decoded) => {
            if(!err) {
                next();
            }
            else {
                res.status(500).json({error: err});
            }
        });
    }
    else {
        res.status(500).json({error: 'Token required'});
    }
}

module.exports = (app) => {
    app.get('/api', (req, res) => res.status(200).send({
        message: 'Welcome to Web project API'
    }));

    app.post('/api/category', categoriesController.create);
    app.put('/api/category/:id', categoriesController.update);
    app.get('/api/category/:id', categoriesController.get);
    app.delete('/api/category/:id', categoriesController.delete);
    app.get('/api/categories', categoriesController.all);

    app.post('/api/article', checkToken, articleController.create);
    app.put('/api/article/:id', checkToken, articleController.update);
    app.get('/api/article/:id', articleController.get);
    app.delete('/api/article/:id', checkToken, articleController.delete);
    app.get('/api/articles', articleController.all);

    app.post('/api/user', usersController.create);
    app.put('/api/user/:id', checkToken, usersController.update);
    app.get('/api/user/me', usersController.me);
    app.get('/api/user/login', usersController.login);
    app.delete('/api/user/:id', checkToken, usersController.delete);
    app.get('/api/user/:id', usersController.get);
    //app.get('/api/users', usersController.all);


    //app.post('/api/usertype', usertypesController.create);
    //app.put('/api/usertype/:id', usertypesController.update);
    //app.get('/api/usertype/:id', usertypesController.get);
    //app.delete('/api/usertype/:id', usertypesController.delete);
    app.get('/api/usertypes', usersController.all);


    //app.post('/api/campus', campusController.create);
    //app.put('/api/campus/:id', campusController.update);
    //app.get('/api/campus/:id', campusController.get);
    //app.delete('/api/campus/:id', campusController.delete);
    app.get('/api/campuses', campusController.all);

    app.post('/api/image', checkToken, imagesController.create);
    //app.put('/api/image/:id', imagesController.update);
    app.get('/api/image/:id', imagesController.get);
    app.delete('/api/image/:id', checkToken, imagesController.delete);
    app.get('/api/images', imagesController.all);
    app.post('/api/image/:id/like', likesController.create);

    app.post('/api/event', checkToken, eventsController.create);
    app.put('/api/event/:id', checkToken, eventsController.update);
    app.get('/api/event/:id', eventsController.get);
    app.delete('/api/event/:id', checkToken, eventsController.delete);
    app.get('/api/events', eventsController.all);
    app.post('/api/event/:id/register', participateController.create);
    app.get('/api/event/:id/participants', participateController.all);
    app.get('/api/event/:id/likes', likesController.all);

    app.post('/api/commentary', checkToken, commentariesController.create);
    app.put('/api/commentary/:id', checkToken, commentariesController.update);
    app.get('/api/commentary/:id', commentariesController.get);
    app.delete('/api/commentary/:id', checkToken, commentariesController.delete);
    app.get('/api/commentaries', commentariesController.all);
};