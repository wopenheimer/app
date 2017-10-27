 <form action="/paciente/edit" method="POST">
    <div class="form-group">
        <label for="cpf">Cpf</label>
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Cpf" value="<?=$args->getCpf()?>" required>
    </div>


    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?=$args->getNome()?>"  required>
    </div>

    <div class="form-group">
        <label for="datanasc">Data de Nascimento</label>
        <div class="input-group date" id="datetimepicker1">
            <input type="text" class="form-control" id="datanasc" name="datanasc" placeholder="Data de Nascimento" value="<?=$args->getDatanasc()?>" required>
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>


    </div>

    <div class="form-group">
        <label for="altura">Peso</label>
        <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso" value="<?=$args->getPeso()?>" required>
    </div>

    <div class="form-group">
        <label for="altura">Altura</label>
        <input type="text" class="form-control" id="altura" name="altura" placeholder="Altura" value="<?=$args->getAltura()?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>

</form> 

<script type="text/javascript">
    
        
    
    $(function () {        
            $('#datetimepicker1').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        inline: true
    });
    });
</script>