<?php
  $id=$_POST['idusuario'];
$modelo=new Observador();
$a=$modelo->getAllObservador($id);


  ?>
  <div class="view-formulario" style="background:white; box-shadow:1px 1px 5px rgba(0,0,0,.2);padding:10px">
       <div class="row">
         <div class="col-md-12">
           <div class="thumbnail" style="text-align:center">
             <img src="view/app/imagenes/s pertenencia/escudo.png" alt="" width="156px">
             <div class="caption" >
               <h5>Instituación Educativa San Mateo <br> <small>¡Hacia la Inteligencia Exitosa ...! </small></h5>
             </div>
           </div>
         </div>
       </div>
       <br>
       <hr>
       <br>
       <div class="row">
         <div class="col-md-5 c-comtent-text">
           <div class="form-group">
             <label for="" style="">Apellido: </label><span> <?=$a['000apellidos']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Nombre: </label><span> <?=$a['000nombres']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Tipo de documento: </label><span> <?=$a['0019desTipo']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Documento: </label><span> <?=$a['000documento']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Curso: </label><span> <?=$a['0020desCurso']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Fecha de nacimiento: </label><span> <?=$a['000fecNacimiento']; ?> </span>
           </div>
           <div class="form-group">
             <label for="" style="">Sede: </label><span> <?=$a['0022desSede']; ?> </span>
           </div>
           <div class="form-group">
             <label for="" style="">Jornada: </label><span> <?=$a['0015desJornada']; ?> </span>
           </div>
         </div>
         <div class="col-md-5 c-comtent-text">

           <div class="form-group">
             <label for="" style="">Rh: </label><span> <?=$a['0023desRh']; ?> </span>
           </div>
           <div class="form-group">
             <label for="" style="">Genero: </label><span> <?=$a['001desGenero']; ?> </span>
           </div>
           <div class="form-group">
             <label for="" style="">Correo: </label><span><?=$a['000email']; ?> </span>
           </div>
           <div class="form-group">
             <label for="" style="">Celular: </label><span><?=$a['000celular']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Eps: </label><span><?=$a['002desEps']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Tel Fijo: </label><span><?=$a['000telFijo']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Dirección: </label><span><?=$a['000direccion']; ?></span>
           </div>
           <div class="form-group">
             <label for="" style="">Barrio: </label><span><?=$a['0010desBarrio']; ?></span>
           </div>
         </div>
         <div class="col-md-2">
           <div class="thumbnail" style="text-align:center">
             <img src="<?=$a['000foto']; ?>" class="img-thumbnail img-circle" alt="" height="100" width="100">
           </div>
         </div>

       </div>
       <br>
       <div class="row">
                  <div class="col-sm-12 ">
                    <button class="accordion" id="btn-info-padres">Datos familiares <i class="fa fa-plus" id="iconos" style="float:right"></i></button>
                    <div class="panel">
                      <br>
                      <div class="row animated fadeIn">
                        <div class="col-md-4">
                          <h5>Informacion de la madre</h5>
                          <hr>
                          <div class="form-group">
                            <label for="" style="">Nombre: </label><span> <?=$a['000nomMad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Apellido: </label><span> <?=$a['000apelMad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Celular: </label><span> <?=$a['000celMad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Fijo: </label><span> <?=$a['000fijoMad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Correo: </label><span> <?=$a['000emailMad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">TIpo Documemto: </label><span><?=$a['000tipDocMad']; ?> </span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Documento: </label><span> <?=$a['000docMad']; ?></span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <h5>Información del padre</h5>
                          <hr>
                          <div class="form-group">
                            <label for="" style="">Nombre: </label><span> <?=$a['000nomPad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Apellido: </label><span> <?=$a['000apelPad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Celular: </label><span> <?=$a['000celPad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Fijo: </label><span> <?=$a['000fijoPad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Correo: </label><span> <?=$a['000emailPad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">TIpo Documemto: </label><span> <?=$a['000tipDocPad']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Documento: </label><span> <?=$a['000docPad']; ?> </span>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <h5>Información del acudiente</h5>
                          <hr>
                          <div class="form-group">
                            <label for="" style="">Nombre: </label><span> <?=$a['000nomAcu']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Apellido: </label><span><?=$a['000apelAcu']; ?> </span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Celular: </label><span> <?=$a['000celAcu']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Fijo: </label><span> <?=$a['000fijoAcu']; ?></span>
                          </div>
                          <div class="form-group">
                            <label for="" style="">Correo: </label><span> <?=$a['000emailAcu']; ?></span>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        <br>
        <div class="row">
          <div class="col-md-6 mb-3">
                <h5><i class="fa fa-user"></i> Informacion Convivencial</h5>
                <hr><br>
                <a href="#modal-caramelo" class="mb-3" data-toggle="modal"><i class="fa fa-plus"></i> Hacer llamado de atención</a>
                <br>


                  <!-- <a href="#" ><li class="list-group-item" >Vestibulum at eros</li></a> -->



            <div class="card alto-caja-llamados mt-3" >
              <div class="card-header ">
                <a href="#" id="click_total_atencion" style="text-decoration:none;"><h5>  <i class="fa fa-percent"></i> Total llamados de atención <span class="badge" style="float:right" id="tot_llamados"><?=totalLlamadosAtencion($a['000id']); ?></span></h5></a>
              </div>
              <!-- <div class="card-body items-enlace" id="total-llamados"> -->
              <ul class="list-group" id="total-llamados" style="overflow:auto; max-height:400px;">
                <?=listaLlamadosAtencionAnioActual($a['000id']); ?>
              </ul>

              <!-- </div>  ul listas-->
              <div class="card-footer">
                <a href="#modal-caramelo" class="mb-3" data-toggle="modal"><i class="fa fa-clock-o"></i> Ver Registros anteriores</a>
                &nbsp;<a href="#modal-caramelo" class="mb-3" data-toggle="modal"><i class="fa fa-search"></i> Buscar</a>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header">
                <h5>  <i class="fa fa-calendar"></i> Informacion Academica</h5>
              </div>
              <div class="card-body items-enlace">
                <ul class="list-group list-group-flush" >
                  <a href="#"><li class="list-group-item" >Comentaris de felicitacion <span class="badge" style="float:right">0</span>  </li></a>
                  <a href="#"><li class="list-group-item" >Materias reprobadas <span class="badge" style="float:right">5</span></li></a>
                  <a href="#"><li class="list-group-item" >Puesto de rendimiento academico del salón <span class="badge" style="float:right">30/28</span></li></a>
                </ul>
              </div>
            </div>
          </div>
        </div>

  </div>

   <br><br>
   <!-- <div class="row">
     <div class="col-md-6">
       <div class="card mb-3 bg-primary">
         <div class="card-header">
           <i class="fa fa-area-chart"></i>
             Informacion Academica
         </div>
         <div class="card-body">

         </div>
       <div>
     </div>
   </div> -->

   <!-- ventana modal para registrar un caramelo -->
   <div class="modal fade in frmcaramelodesenfocar" id="modal-caramelo">
     <div class="modal-dialog ">
       <div class="modal-content">

         <div class="modal-header bg-primary text-center text-white" style="text-align:center">
           <h5>Llamado de atención </h5><small style="text-align: right" ><?=date('d/m/Y'); ?> </small>
         <a href="#" class="close" data-dismiss="modal">&times;</a>
         </div>

         <div class="modal-body">
           
           <form class="" id="frm-caramelo-add" action="" method="post">
             <p><strong>Información del alumno</strong></p>
             <hr>
             <div class="info-adicional">
               <div class="form-group mt-2">
                 <label for="">Nombre: </label><span>  <?=ucwords($a['000apellidos'])."  ".ucwords($a['000nombres']); ?></span>
               </div>
               <div class="form-group">
                 <label for="">Curso: </label><span> <?=$a['0020desCurso']; ?></span>
               </div>
             </div>
             <hr>
             <div class="form-group  mt-3 mb-3">
               <label for="">Motivo</label>
               <input type="hidden" name="id_alumno" value="<?=$a['000id']; ?>">
               <textarea name="motivo" class="form-control" rows="2" cols="80" placeholder="Ingrese el motivo del llamado de atención"></textarea>
             </div>
             <div class="form-group mb-3">
               <label for="">Descargo</label>
               <textarea name="descargo" class="form-control" rows="2" cols="80" placeholder="Diligencie el descargo"></textarea>
             </div>
             <div class="form-group mb-3">
               <label for="">Falta:</label>
               <div class="custom-controls-stacked radios-aling" >
                <label class="custom-control custom-radio radio-inline">
                  <input id="radioStacked3" name="tipo" type="radio" class="custom-control-input" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Tipo 1</span>
                </label>
                <label class="custom-control custom-radio radio-inline">
                  <input id="radioStacked4" name="tipo" type="radio" class="custom-control-input" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Tipo 2</span>
                </label>
                <label class="custom-control custom-radio radio-inline">
                  <input id="radioStacked4" name="tipo" type="radio" class="custom-control-input" value="3">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Tipo 3</span>
                </label>
              </div>

             </div>
             <div class="form-group mb-3">
               <label for="">Estrategia formativa</label>
               <textarea name="estrategia" class="form-control" rows="2" cols="80" placeholder="Diligencie la extrategia formativa"></textarea>
             </div>
              <input type="hidden" name="fechacitacion" value="00/00/0000">
             <div class="form-group mb-3">
               <label for="">Citar acudiente</label>
                <div class="custom-controls-stacked radios-aling" >
                   <label class="custom-control custom-radio radio-inline">
                     <input id="radioStacked3" name="c_acudiente" type="radio" class="custom-control-input" value="si">
                     <span class="custom-control-indicator"></span>
                     <span class="custom-control-description">Si citar</span>
                   </label>
                   <label class="custom-control custom-radio radio-inline">
                     <input id="radioStacked4" name="c_acudiente" type="radio" class="custom-control-input" value="no">
                     <span class="custom-control-indicator"></span>
                     <span class="custom-control-description">No citar</span>
                   </label>
                </div>




               <!-- <select class="custom-select" name="c_acudiente" id="jj" style="width:100%">
                 <option selected="">Seleccione una opcion</option>
                 <option value="0">No</option>
                 <option value="1">Si</option>
               </select> -->
             </div>
             
             <div class="form-group" id="rta-ajax-claves">

             </div>
             <div id="rta-ajax-reg-caramelo">

             </div>
             <div class="form-group">
               <div class="row">
                <div class="col-md-6">
                  <label for="">Clave Instructor</label>
                  <input type="password" name="clave_instructor" class="form-control" placeholder="Clave del instructor">
                </div>
                <div class="col-md-6">
                  <label for="">Clave del alumno</label>
                  <input type="password" name="clave_alumno" class="form-control" placeholder="Clave del alumno">
                </div>
               </div>

             </div>
             <div class="form-group mb-3 mt-4">
               <div class="row">
                 <div class="col-sm-6">
                   <div class="form-group">
                      <a href="#" class="btn  btn-default btn-block" data-dismiss="modal"><i class="fa fa-logout"></i> Cerrar</a>
                    </div>
                 </div>
                 <div class="col-sm-6">
                   <div class="form-group">
                      <button type="button" id="btn-add-caramelo" class="btn btn-sm  btn-block btn-primary"><i class="fa fa-check  "></i> Aceptar</button>
                    </div>
                 </div>
               </div>
             </div>
           </form>

       </div>
       </div>
     </div>
   </div>


   <!-- modal para mostrar la informacion del caramelo  -->


  <!--modal para mostar la iinformacion deun cairamero, o llamado de akrnand-->
  <div class="modal fade in" id="info_caremelo_detalles">
    <div class="modal-dialog">
      <div class="modal-content">
        <div  class="modal-header bg-primary text-white">
          Informacion del informe
        </div>
        <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Fecha de citacion :</label><span id="ic_fecha"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Motivo de citacion :</label><span id="ic_motivo"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Descargo :</label><span id="ic_descargo"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Falta al manual - Tipo :</label><span id="ic_falta"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Estrategia :</label><span id="ic_estrategia"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Citado :</label><span id="ic_citado"></span>
                </div>
              </div>
               <div class="col-md-6">
                <div class="form-group">
                  <label for="">Fecha de citación :</label><span id="ic_fecitacion"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Asistencia padre de familia :</label><span id="ic_asipadre"></span>
                </div>
              </div>
              <div class="col-md-12">
                 <div class="form-group">
                   <a class="btn btn-primary col-sm-4 btn-block col-sm-offset-8" href="#" data-dismiss="modal">Ok</a>
                 </div>
               </div>
            </div>
        </div>
     
      </div>
    </div>
  </div>







   <!--modal para escojes el horaio del profesor para cita-->
   <div class="modal fade in " data-backdrop="static" data-keyboard="false" id="modal_horario_profesor">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h4>Horario de instructor</h4>
          <a href="#" class="close bt-cerrar-horarios" data-dismiss="modal">&times;</a>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            
            <table class="table table-striped table-condensed table-hover table-bordered">
              <thead>
                <tr>
                  <th>Día disponible</th>
                  <th>Hora de atencion</th>
                  <th>Jornada</th>
                  <th>Observación</th>
                </tr>
              </thead>
              <tbody>
                <?php echo listarHorariosDeInstructorSegunElInicioSesion($_SESSION['usuario'][0]); ?>
              </tbody>
            </table>

          </div>
             <div class="form-group mt-4" id="citar_acudiente_opcion">
               <label for="">Fecha de citación</label>
               <input type="date" class="form-control" id="fet_cita" name="fechacitacion1" value="">
             </div>          
        </div>
        <div class="modal-footer">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <button type="button"  class="btn btn-default btn-cancelar-horario">Cancelar</button>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <button type="button" class="btn btn-success btn-guardar-fecha-citacion">Guardar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
   



<script type="text/javascript">
  // operacionesinicioobservador();

  var ff=document.querySelector("#fet_cita");
  ff.onchange=function(){
  document.querySelector("[name='fechacitacion']").value=ff.value;
  }
interfazdatosobservador();  
</script>


  <!-- id -->


  <!-- otros -->
