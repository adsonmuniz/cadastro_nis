<div class="items">
    <div class="dvData">
        <form method="post" action="?page=data">
            <input id="search_numNis" name="search_numNis" type="text" maxlength="11" 
            onkeypress="return event.charCode>=48 && event.charCode <=57"
            placeHolder="DIGITE NÚMERO NIS" />
            <input type="submit" value="BUSCAR" id="btn_search" class="button">
        </form>
    </div>
</div>
<a id="btn_create" class="button" href="?page=form&i=null">CADASTRAR</a>