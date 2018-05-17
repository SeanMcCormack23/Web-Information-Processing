const Express = require('express');
const Mongoose = require('mongoose');
const BodyParser = require('body-parser');
// const MethodOverride = require('method-override');

const Configuration = require('./server-config');

const Routes = require('./routes');

let port = Configuration.port;

Mongoose.connect(Configuration.databaseUrl);

let server = Express();

server.use(BodyParser.json());
server.use('/',Routes)

server.listen(port, function(){
  console.log('Server started on port '+port);
});

server.get('*', function(request,response){
  response.json({message:"Hello Stephen"});
});
