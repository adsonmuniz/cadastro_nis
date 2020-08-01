<div class="items">
    <?php
        require_once 'source/controller/pessoaController.php';
        
        $controller = new PessoaController();
        // $obj = $controller->listar();

        // if (mysqli_num_rows($obj) == 0) {
        //     echo('<label>Não existe nenhuma pasta.</label>');
        // }
        
        // while($row = mysqli_fetch_array($obj))
        // {
        //     echo('<div class="item">
        //         <a href="?page=child&p='.$row['id'].'">'.$row['name'].'</a>
        //         <a class="button" href="?page=edit&i='.$row['id'].'&p='.$row['id_parent'].'">Editar</a>
        //         <a class="button" href="?page=delete&i='.$row['id'].'&p='.$row['id_parent'].'">Deletar</a>
        //     </div>');
        // }
    ?>
    <form method="post" action="views/data.php">
        <input id="search_numNis" name="search_numNis" type="text" maxlength="11" 
        onkeypress="return event.charCode>=48 && event.charCode <=57"
        placeHolder="DIGITE NÚMERO NIS" />
        <input type="submit" value="BUSCAR" id="btn_search" class="button">
    </form>
</div>
<a id="btn_create" class="button" href="?page=form&p=null">CADASTRAR</a>