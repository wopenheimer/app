 <form action="?module=paciente&page=edit" method="POST">
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
        <input type="date" class="form-control" id="datanasc" name="datanasc" placeholder="Data de Nascimento" value="<?=$args->getDatanasc()?>" required>
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