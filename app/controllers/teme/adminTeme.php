<?php

function _adminTeme() {
    isUserLoggedIn();
    switch ($_POST['actiune']) {


        case 'add':


            $tema = new Teme(getDbh());
            $materii = new Materii(getdbh());
            // $fetch = $materii->getMateriiDetails($_POST['grupaID']);
            $fetch = $materii->getMateriiDetails(1);

            if ($_FILES['fileToUpload']['name'] != '') {
                if ($_FILES['fileToUpload']['size'] > 5242880) {
                    redirect('teme1');
                }
                $file = $_FILES['fileToUpload']['tmp_name'];
                $new_file_name = strtolower($_FILES['fileToUpload']['name']);
                $FileType = pathinfo($new_file_name, PATHINFO_EXTENSION);


                if ($FileType != "xml" && $FileType != "png" && $FileType != "bmp" && $FileType != "jpg" && $FileType != "gif" && $FileType != "doc" && $FileType != "docx" && $FileType != "pdf") {
                    echo "Sorry, only JPG, PNG, GIF, DOC, DOCX, BMP, PDF, XML files are allowed.";
                    redirect('teme2');
                }
            }


            if ($_FILES['fileToUpload']['name'] != '') {
                $result = $tema->addTema($fetch['ID_USER'], $_POST['grupaID'], $_POST['materie'], $_POST['denumire'], $_POST['detalii'], $file);
            } else {

                $result = $tema->addTema($fetch['ID_USER'], $_POST['grupaID'], $_POST['materie'], $_POST['denumire'], $_POST['detalii']);
            }
            if ($result) {
                $data['msg'][] = "Tema de licenta a fost adaugata  cu success";
                $data['redirect'][] = 'teme';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            } else {
                $data['msg'][] = "Eroare la adaugare";
                $data['redirect'][] = 'teme';
                View::do_dump(VIEW_PATH . 'layout.php', $data);
            }
            break;

        case 'edit':


        case 'delete':

            break;

        default:
            //echo "wrong action"
            break;
    }
}
