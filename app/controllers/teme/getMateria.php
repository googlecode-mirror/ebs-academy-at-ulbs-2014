<?php

function _getMateria() {

    $materii = new Materii(getdbh());
    $result = $materii->fetchGrupaMaterii($_POST['id']);
    echo json_encode($result);
}
