<?php

function navTags($item1="",$item2="",$item3="",$item4=""){
    ?>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a  class="nav-link <?=$item1; ?>" href="?view=superinicio&pagin=visualizarasistencia"><i class="fa fa-user"></i> Informe semanal</a>
        </li>
        <li class="nav-item">
            <a  class="nav-link <?=$item2; ?>" href="?view=superinicio&pagin=justificarfalla"><i class="fa fa-user"></i> Justificar Falla</a>
        </li>
        <li class="nav-item">
            <a  class="nav-link <?=$item3; ?>" href="?view=superinicio&pagin=visualizarasistencia"><i class="fa fa-copy"> Editar Informe</i> </a>
        </li>
        <li class="nav-item">
            <a  class="nav-link <?=$item4; ?>" href="?view=superinicio&pagin=visualizarasistencia"><i class="fa fa-copy"> Generar estadisticas</i> </a>
        </li>
    </ul>
    <?php
}