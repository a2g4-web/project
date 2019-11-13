var express = require('express');
var logger = require('morgan');
const bodyParser = require('body-parser');
const dotenv = require('dotenv');
dotenv.config();

var app = express();
var router = express.Router();

app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));
app.use(function(req, res, next) {
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Request-With, Content-type, Accept");
    console.log('header');
    next();
});
app.options('/api/*', function(req, res, next) {
    res.header('Access-Control-Allow-Methods', 'GET, PUT, POST, DELETE, OPTIONS');
    next();
});
app.disable('etag');
app.use('/', router);

var models = require('./models');

models.sequelize.sync().then(() => {
    console.log('Database connected');
}).catch((err) => {
    console.log(err, 'Error !');
});

require('./routes')(router);

app.listen(8001);

module.exports = app;