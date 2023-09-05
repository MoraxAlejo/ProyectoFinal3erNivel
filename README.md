# ProyectoFinal3erNivel
Factores a tener en cuenta 
existen muchos usuarios para darle color a la web, mas los usuarios con los que se puede ingresar son los siguientes:
admin@admin 
contraseña = admin 
alumno@alumno 
contraseña = alumno 
maestro@maestro 
contraseña = maestro 

los profesores vinculados a un curso no pueden ser eliminados directamente. Tienen que ser desvinculados de los cursos para ser eliminados (esto se debe a la foreing key) y eso se puede
con la opcion de editar maestro. No se le puede asignar a un maestro no estar vinculado a ninguna clase, mas se puede hacer que otro profesor tenga la clase de ese profesor
y asi el profesor al que le quitaron la clase ya no tiene nada asignado. 

Se pueden tener varios profesores asignados a una misma clase pero esto no es correcto. El programa no esta diseñado para esto y cuando el profesor vea la tabla de sus alumnos 
lo que traera de la base de datos sera de una sola tabla por lo que no recomiendo que haya un profesor vinculado a varias clases. Sin embargo mas de un profesor puede estar
vinculado al mismo curso (no hay problema)

los permisos no funcionan, ya que no me dio tiempo de hacerlos (pero si trae la lista de los roles de cada usuario mas no se pueden modificar)

cometi un error al principio y me di cuenta muy tarde. Para los registros de usuarios no use una sola tabla sino una tabla por cada rol lo que hizo imposible el modificarlo nuevamente
ya que ya habia avanzado mucho y si lo modificaba tendria que modificar todo el codigo y eso me llevaria mas tiempo 

lo demas funciona, es estable

cosas extras: 
-no puedes ingresar a ninguna vista arbitrariamnete, debes si o si iniciar sesion.
-cuando el admin crea un maestro o un estudiante, crea un perfil con email y contraseña hasheada
-no puedes crear una cuenta con un usuario ya existente porque no te lo permitira 



