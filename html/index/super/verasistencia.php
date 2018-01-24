<!DOCTYPE html>
<html lang="en">

  <head>
    <?php include(OVERALL.'header.php'); ?>
    <?php include(OVERALL.'navTabsasistencia.php'); ?>
    <title>San Mateo</title>

    <link rel="stylesheet" type="text/css" href="view/app/css/superInicioForm.css">
    <style>

        .btn.btn-xs

        {
          padding: 5px;
          font-size: 10px;
          color:white;
        }
          .frm_ver_asi select{
            width: 100%;
          }
          .table-responsive{
            /*background: red;*/
            overflow: auto;
          }


           .l{
            background:rgba(239, 239, 239, 0.64)!important
          }
          .m{
                background: rgba(255, 255, 255, 0.6196078431372549);
          }
          .mi{
            background:rgba(239, 239, 239, 0.64)!important

          }
          .j{
              background: rgba(255, 255, 255, 0.6196078431372549);
          }
          .v{
            background:rgba(239, 239, 239, 0.64)!important
          }

          .btn.btn-e{
            background: gray;
            color:white;
          }

          .btn.btn-tu{
            background: linear-gradient(to left ,#17A2B8,#FFC107);
            color: white;
            border: none;
          }


          /*Mesajes de alerta para cursos y semanas*/falconmasters
          .msg-semana{

          }
          .msg-curso{
            color: #dc3545;
            font-weight: bold;
            font-size: 12px;
          }

          table tbody tr td{
            position: relative;
          }



          td.m > .cajathumnail,
          td.mi > .cajathumnail,
          td.mi > .cajathumnail,
          td.j > .cajathumnail,
          td.v > .cajathumnail
          {
                background: rgba(255, 255, 255, 0.9607843137254902);
                padding: 2px 5px;
                min-width: 300px;
                min-height: 80px;
                position: absolute;
                top: -74px;
                right: 22px;
                box-shadow: 1px 1px 20px 2px rgba(0,0,0,.2);
                animation-name: anima;
                animation-duration: .1s;
                z-index: 20;
                overflow: hidden;
          }

          td.l > .cajathumnail
           {
                background: rgba(255, 255, 255, 0.9607843137254902);
                padding: 2px 5px;
                min-width: 300px;
                min-height: 80px;
                position: absolute;
                top: -74px;
                left:22px;
                box-shadow: 1px 1px 20px 2px rgba(0,0,0,.2);
                animation-name: anima;
                animation-duration: .1s;
                z-index: 20;
                overflow: hidden;
          }



        .cajathumnail .fechatu{
            display: block;
            padding-bottom: 2px;
            border-bottom: 1px solid rgba(0,0,0,.1);
          }

          @keyframes anima{
            from{opacity: 0;}
            to{opacity: 1;}
          }







          /*//////////      Estilos para modal /////////////////*/

          #informacionEstudiantePorDia label {
            color: rgb(199, 199, 199);
          }


          #informacionEstudiantePorDia #btn-open-faltas{
            text-align: left;
          }
          #informacionEstudiantePorDia #btn-open-faltas i{
            float: right;
          }

        #informacionEstudiantePorDia .nav-tabs .nav-item.show  .nav-link, #informacionEstudiantePorDia .nav-tabs .nav-link.active{
            color: rgb(73, 80, 87)  !important ;
            background-color: rgb(255, 255, 255)  !important;
            border-color: rgb(221, 221, 221) rgb(221, 221, 221) rgb(221, 221, 221) rgb(255, 255, 255)  !important;
        }
    </style>
  </head>
  <body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation Barra de navegacion horizontal y vertical-->
    <?php include(OVERALL.'navbar.php'); ?>

    <div class="content-wrapper">

      <div class="container-fluid">

        <!--TAG DE ORDEN PARA VISULAIZAR LA SAISTENCIA-->
        <?php navTags("active"); ?>

        <div class="tab-content">
            <div id="newmatricula">
              <div class="row">
                <div class="col-md-12">
                 <!-- Breadcrumbs -->
                <!-- migas de pan -->
                <br>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="?view=inicioindex">Inicio</a>
                  </li>
                  <li class="breadcrumb-item active">Buscar asistencia</li>
                </ol>

                <!-- loader -->
                <div class="center-loader ocultar-elemento"></div>

                  <div class="row">
                    <div class="col-md-12">
                      <div id="alertas"></div>
                      <!-- div.form-group>label+input.form-control[name="$"] -->
                      <form action="" id="frm_ver_asistencia" class="frm_ver_asi">
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group row">
                              <label class="col-md-2 col-form-label">Semana</label>
                              <div class="col-md-10">
                                <input placeholder="ejemplo: 2017-W40" type="week" name="semana" id="semana" class="form-control">
                                <span class="msg-semana"></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group row">
                              <label class="col-md-2 col-form-label">Curso</label>
                              <div class="col-md-10">
                                <select name="curso" id="curso" class="custom-select">
                                  <option selected value="0">Seleccione un curso</option>
                                </select>
                                <span class="msg-curso">No hay datos</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>


                    </div>
                    <div class="col-md-12">
                      <div class="msg-alertas-dia-asistencia"></div>
                      <!--respuesta de ajax datos de asistencia semana-->

                      <div class="table-responsive" id="infomarfaciondeasistencia">

                      </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </div>










      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- /.content-wrapper -->



    <div class="modal fade in" id="informacionEstudiantePorDia">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            Informacion del estudiante
            <a href="#" data-dismiss="modal" class="close">&times;</a>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3 " style="text-align: center;">
                <div class="bg-light">

                  <img src="" height="100"  width="100" class="mt-2" style="border-radius: 50%;" id="img-fot-est">
                  <br>
                  <span class="mb-4 text-secondary"><span id="info_fecha"></span></span>

                    <li href="#" class="list-group-item active mt-3">Hora de clase </li>


                    <ul class="nav flex-column nav-tabs" role="tablist" id="horas_por_clase">
                    </ul>









               </div>
              </div>
              <div class="col-md-9">

                  <div class="row">

                    <div class="col-md-9">
                      <label>Nombre: </label><span id="info_nombre"> Cristain CAmilo Romero Piñeros </span>
                    </div>
                    <div class="col-md-3">
                      <label>Curso: </label><span id="info_curso"></span>
                    </div>


                    <div class="col-md-12">
                      <a href="#" class="btn-block btn-default btn bg-light" id="btn-open-faltas">Faltas acumuladas <i class="fa fa-angle-up"></i></a>
                      <div id="info_faltas" style="overflow: auto;">
                        <table class="table table-striped table-hover table-condensed" >
                          <thead>
                            <tr>
                              <th>Periodo</th>
                              <th>Fallas</th>
                              <th>Evaciones</th>
                              <th>Retardos</th>
                              <th>Uniforme</th>
                            </tr>
                          </thead>
                          <tbody id="tabla-rta-info-alumno">

                          </tbody>
                          <tfoot>
                            <th>Total</th>
                            <th id="tot-fal"></th>
                            <th id="tot-eva"></th>
                            <th id="tot-ret"></th>
                            <th id="tot-uni"></th>
                          </tfoot>
                        </table>
                      </div>
                    </div>

                    <div class="col-md-12 mt-2">

                      <label style="color:#007bff !important;">Detalles de la clase</label>
                      <hr>
                    </div>


                    <div class="col-md-12">

                      <!-- Tab panes -->
                        <span class="fa fa-long-arrow-up btn-subir-informe" id="mostrarinfodetagsdehoras"></span>
                      <div class="tab-content" id="tab_panel_opciones">

                      </div>
                      <!-- fin paneles-->

                      <div id="frm_caja_justicar_excusa" class="tab-content" style="display:none">
                        <div class="card">
                          <div class="card-header">
                            Justificar falla
                          </div>
                          <div class="card-block" style="padding:15px">
                            <form action="#" action="" method="POST" enctype="multipart/form-data" id="frm_envio_justificacion">
                              <input type="hidden" name="fecha_inasistencia" value="">
                              <input type="hidden" name="id_alumno" value="">
                              <div class="row">
                                <div class="col-md-12">
                                    <label>Subir archivo</label>
                                    <input type="file" name="fotexcusa[]" id="fotexcusa" required multiple>
                                </div>
                                <div class="col-md-12">
                                <br>
                                    <label>Agregar una observación adicional</label>
                                    <textarea name="observacionexcusa" id="observacionexcusa" cols="30" rows="3" class="form-control" required></textarea>
                                </div>
                                <div class="col-md-12 cajavistaprevia" style="padding: 10px;">

                                </div>
                                <div class="col-md-12">
                                <br>

                                  <input type="submit"  class="btn btn-primary btn-md btn-actualizar-excuda" value="Guerdar cambios" >
                                  <input type="reset" name="rei" class="btn btn-default" value="Cancelar / Limpiar" style="margin-left: 20px;">
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>

                      </div>
                    </div>






                  </div>
              </div>

              
            </div>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

    <?php include(OVERALL.'footer.php'); ?>


    <?php include(OVERALL.'footer.html'); ?>


    <script src="<?=VAPP.'js/asistencia/justificarfalla.js'; ?>"></script>
    <script src="<?=VAPP.'js/asistencia/superverdatosporfechadelestudiante.js';?>"></script>
    <script src="<?=VAPP.'js/asistencia/superefectohoverasistencia.js'; ?>"></script>
    <script src="<?=VAPP.'js/asistencia/supervalidarverasistencia.js'; ?>"></script>
  </body>
  </html>
