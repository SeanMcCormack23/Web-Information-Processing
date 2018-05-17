const Express = require('express');
const User = require('./app/models/user');

let server = Express.Router();

server.post('/user', function(request,response){

  console.log('POST Request - /user');

  let UserDetails = request.body;

  let NewUser = new User ({
    name:UserDetails.name,
    age: UserDetails.age,
    email: UserDetails.email
  });

  console.log('Created User');

  NewUser.save(function(error,user){


    if(error){
      response.json({message:'Could not create user',error:error});

    }
    else {
      response.json({message:'User Created',user:user});

    }
  });
});


server.get('/user',function(request,response){
  console.log('GET REQUEST -/user');

  User.find(function(error,users){
    if(error){
      response.json({message:"Could not retrieve users",error:error});
    }
    else {
      response.json({message:"Users Retrieved",users:users});

    }
  });
});

server.get('/newUser',(request,response)=>{

response.sendfile('public/index.html');


});

server.get('/user/:email', function(request,response){
  console.log('GET REQUEST - /user/:email');

  let UserDetails = request.params;
  User.findOne({email:UserDetails.email}, function (error, user){
    if (error){
      response.json({message:'could not find',error:error});
    }
    else {
      response.json({message:'found',user:user});
    }
  });
});


module.exports = server;
