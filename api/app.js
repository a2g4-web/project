var express = require('express');
var logger = require('morgan');
const bodyParser = require('body-parser');

var app = express();
var router = express.Router();

app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));
app.use('/', router);

var models = require('./models');

models.sequelize.sync().then(() => {
    console.log('Database connected');
}).catch((err) => {
    console.log(err, 'Error !');
});

require('./routes')(router);

app.listen(8000);

module.exports = app;