
<?php 
include'../autoload.php';
$session = new Session();
$session->validity();

$assets = new Assets();
$assets->header("..","usuarios");
$assets->nav("..");
$assets->breadcrumbs("Usuario","Administrador");
 ?>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title">
                   
                <i class="fas fa-list"></i> 
                  Listado de usuarios
                </h3>
                  <div id="estilo">
                  <a class="btn btn-dark" href="<?php echo URL ?>docs/pdf/reporte/" target="blank" ><i class="fa fa-file-pdf"></i> Reportes</a>
                     <a class="btn-excel btn btn-success" href="<?php echo URL ?>sources/usuarios.php?op=5">
                    <i class="fa fa-file-excel"></i>
                    Excel
                   </a>
                  
                   <button  class="btn-agregar btn btn-danger" >
                    <i class="fa fa-plus"></i>
                  Agregar usuario
                   </button>  </div>
              </div>
              <div class="card-body">
                
               <div class="table-responsive">
               		<table id="consulta"  class="table table-hover table-condensend" style="font-size: 12px">
               		<thead>
               			<tr class="table-primary">
               				<td>Nombres</td>
               				<td>Apellidos</td>
               				<td>Usuarios</td>
               				<td>Correo</td>
               				<td>Dni</td>
               				<td>Fono</td>
                      <td>Acciones</td>
               			</tr>
               		</thead>
               	</table>
               </div>
               
                
               
              </div>
              <!-- /.card -->
            </div>




          </div>
          <!-- /.col -->
        </div>
        <!-- ./row -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->


<!-- Modal Pecil -->
<form id="pencil" autocomplete="off">
<div class="modal fade" id="modal-pencil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

     <input type="hidden" name="id" class="id">
      
     <div class="row">
     <div class="col-md-6">
     <div class="form-group">
     <label>Ingresar Contraseña</label>
     <input type="password" name="pass1"  class="pass1 form-control"  >
     </div>
     </div>
     <div class="col-md-6">
     <div class="form-group">
     <label>Confirmar Contraseña</label>
     <input type="password" name="pass2"  class="pass2 form-control"  >
     </div> 
     </div>
     </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</form>





<form id="agregar" autocomplete="off">
    <div class="modal fade" id="modal-agregar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <input type="hidden" class="id" name="id">
              <input type="hidden" class="accion" name="accion">

              <div class="row">
                <div class="col-md-6">
                  <label for="">Nombres</label>
                  <input type="text" name="nombres" class="nombres form-control" onchange="Mayusculas(this)" required>
                </div>
                <div class="col-md-6">
                  <label for="">Apellidos</label>
                  <input type="text" name="apellidos" class="apellidos form-control" onchange="Mayusculas(this)" required>
                </div>
              </div>
              <label for="">Correo</label>
              <input type="email" name="correo" class="correo form-control" required>
               <div class="row">
                <div class="col-md-6">
                  <label for="">Usuarios</label>
                  <input type="text" name="user" class="user form-control"  required>
                </div>
                <div class="col-md-6">
                  <label for="">Password</label>
                  <input type="password" name="pass" class="pass form-control"  required>
                </div>
              </div>
               <div class="row">
                <div class="col-md-6">
                  <label for="">Dni</label>
                  <input type="text" maxlength="8" name="dni" class="dni form-control"  required>
                </div>
                <div class="col-md-6">
                  <label for="">Celular</label>
                  <input type="text" name="fono" maxlength="9" class="fono form-control"  required>
                </div>
              </div>
            </div>
            <div class="modal-footer ">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i> Cancelar</button>
              <button  class="btn btn-primary btn-submit">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

</form>


 <?php 

$assets->footer("..");
  ?>

  <script>
    function loadData(){

  $(document).ready(function(){
  $("#consulta").dataTable().fnDestroy();  
  $("#consulta").dataTable({
    "destroy": true,
    "bAutoWidth" : false,
    "deferRender": true,
    "bProcessing": true,
    "sAjaxSource" : "../sources/usuarios.php?op=1",
    "aoColumns" : [
    {mData : "nombres"},
    {mData : "apellidos"},
    {mData : "user"},
    {mData : "correo"},
    {mData : "dni"},
    {mData : "fono"},
    {mData : null,render : function(data){

      acciones ='<button  data-id='+data.id+'  class="btn-pencil btn btn-default btn-sm"><i class="fa fa-pen"></i></button>  ';
      acciones +='<button  data-id='+data.id+'  class="btn-edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></button> ';
      
      return acciones;
    }}

    ],
    "language":{

    "url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"


   }
  });
  });

    }

   loadData();

//modal pencil
$(document).on("click",".btn-pencil",function(){
  id=$(this).data("id");
  $(".id").val(id);
  $(".pass1").val("");
  $(".pass2").val("");
  $(".btn-submit").html('<i class="fa fa-save"></i> Actualizar');
  $(".modal-title").html('<i class="fa fa-edit"></i> Actualizar Contraseña');
  $("#modal-pencil").modal("show");
});

//actualizar pencil


$(document).on('submit','#pencil',function (e){

id    = $('.id').val();
pass1 = $('.pass1').val();
pass2 = $('.pass2').val();

url   = "../sources/usuarios.php?op=4";

if(pass1==pass2)
{

$.ajax({
  url : "../sources/usuarios.php?op=4",
  type : "POST",
  data : {"id":id,"pass":pass1},

  success : function(data){
  $('.pass1').val('');
  $('.pass2').val('');
  $('.pass1').focus();
   Swal.fire({

  title: "Buen Trabajo",
  icon:  "info",
  text:  "Contraseñas Actualizadas",
  timer: 3000,
  showConfirmButton: false
  })

  }
});

}
else
{

Swal.fire({
  title: "Las contraseñas no coinceden",
  icon:  "info",
  text:  "Intente de Nuevo",
  timer: 3000,
  showConfirmButton: false
  })

}

e.preventDefault();
});


// momdal agregar
$(document).on("click",".btn-agregar",function(){
 $("#agregar")[0].reset();
 $(".accion").val("agregar");

 $(".pass").removeAttr("readonly");
 $(".btn-submit").html('<i class="fa fa-save"> Agregar');
 $(".modal-title").html('<i class="fa fa-user"></i> Agregar');
 $("#modal-agregar").modal("show"); 
})



//modal editar
$(document).on("click",".btn-edit",function(){
 id = $(this).data("id");
 $(".id").val(id);
$(".accion").val("actualizar");

url ="../sources/usuarios.php?op=3";
$.getJSON(url,{"id":id},function(data){
 $(".nombres").val(data.nombres);
 $(".apellidos").val(data.apellidos);
 $(".user").val(data.user);
 $(".correo").val(data.correo);
 $(".dni").val(data.dni);
 $(".fono").val(data.fono);
 $(".pass").val('123456');
 $(".pass").attr("readonly","readonly");
});

 $(".btn-submit").html('<i class="fa fa-save"> Actualizar');
 $(".modal-title").html('<i class="fa fa-edit"></i> Actualizar');
 $("#modal-agregar").modal("show"); 
})






$(document).on("submit","#agregar",function(e){
  parametros = $(this).serialize();
  $.ajax({
    url : "../sources/usuarios.php?op=2",
    type : "POST",
    data : parametros,
    dataType : "JSON",
    success : function(data){
     Swal.fire({
     icon: data.icon,
     title: data.title,
     text: data.text,
     timer : 3000,
     showConfirmButton : false
      });
     loadData();
     $("#modal-agregar").modal("hide");
    }
  });
  e.preventDefault();
});

  </script>
  
