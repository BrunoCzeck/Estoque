<title>Planilha Unidade</title>

<?php
session_start();
include_once("conexao.php");
    $arquivo = 'Planilha_Unidades.xls';
    $html = '';
    $html .='<table border="1">';
    $html .='<tr>';
    $html .='<td colspan="5">Relatorio de Unidade</tr>';
    $html .='</tr>';

    $html .= '<tr>';
    $html .='<td><b>Unidade</b></td>';
    $html .=utf8_decode('<td><b>Código de Barras</b></td>');
    $html .='<td><b>Produto</b></td>';
    $html .=utf8_decode('<td><b>Situação</b></td>');
    $html .='<td><b>Empresa</b></td>';
    $html .='</tr>';
    
    foreach($_POST['pesquisa'] as $id => $pesquisa){
    $sql ="SELECT * FROM post WHERE id = $id";
    $sql_tables = mysqli_query($conn, $sql);
    while ($row_sql = mysqli_fetch_assoc($sql_tables)){
        $html .= '<tr>';
        $html .='<td>' .$row_sql['sub_categorias_post_id'].'</td>';
        $html .='<td>' .$row_sql['codigo'].'</td>';
        $html .='<td>' .$row_sql['produto'].'</td>';
        $html .='<td>' .$row_sql['situacao'].'</td>';
        $html .='<td>' .$row_sql['empresa'].'</td>';
    }
}
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/xls");
    header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
    header ("Content-Description: PHP Generated Data" );
    echo $html;
    exit;
?>    
