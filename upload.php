
<?php
// Nas versões do PHP anteriores a 4.1.0, deve ser usado $HTTP_POST_FILES
// ao invés de $_FILES.

$uploaddir = '/var/www/uploads/';
$uploadfile = $uploaddir . $_FILES['file']['name'];
print "<pre>";
if (move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir . $_FILES['file']['name'])) {
    print "O arquivo e valido e foi carregado com sucesso. Aqui esta alguma informacao:\n";
    print_r($_FILES);
} else {
    print "Possivel ataque de upload! Aqui esta alguma informacao:\n";
    print_r($_FILES);
}
print "</pre>";
?>
