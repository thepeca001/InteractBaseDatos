const mongoose = require('mongoose')
const Schema = mongoose.Schema

let UserSchema = new Schema({
  nombre: { type: String, required: true },
  usuario: { type: String, required: true},
  password: { type: String, required: true},
  estado: { type: String, required: true, enum: ['Activo', 'Inactivo']}
});

let UserModel = mongoose.model('Usuario', UserSchema);
module.exports = UserModel;

var PrimerUsuario =  new UserModel({
    nombre: 'Juan Perez',
    usuario: 'admin',
    password: '123',
    estado: 'Activo',
});

PrimerUsuario.save(function(err, doc){
   if(err){
      console.log(err);
   }else{
   	 console.log('usuario admin - 123 creado');
   }
});

