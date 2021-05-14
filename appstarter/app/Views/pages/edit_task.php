<div class="container-sm">
    <h1 class="text-center">Detalhe da Tarefa</h1>
    <div>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="validationServer01" class="form-label">Titulo</label>
                <input type="text" class="form-control " id="validationServer01" placeholder="Titulo da Tarefa" value="<?= $task->title ?>">
                <!-- <div class="valid-feedback">
                    Preenchido!
                </div> -->
            </div>
            <div class="col-md-4">
                <label for="validationServerUsername" class="form-label">Responsavel pela Tarefa</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                    <select class="form-select " id="validationServer04" aria-describedby="validationServer04Feedback" required>
                        <option selected disabled value="">Selecione um responsavel...</option>
                        <option value="<?= $task->id_owner ?>" <?php if($task->id_owner) echo "selected";?>></option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationServer03" class="form-label">Descrição</label>
                <div class="input-group">
                    <span class="input-group-text">Descrição da Tarefa</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="<?= $task->body ?>"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationServer04" class="form-label">Categoria</label>
                <select class="form-select " id="validationServer04" aria-describedby="validationServer04Feedback" required>
                    <option selected disabled value="">Escolha...</option>
                    <option value="<?= $task->id_category ?>" <?php if($task->id_owid_category) echo "selected";?>><?= $task->category ?></option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="validationServer05" class="form-label">Data para conclusão</label>
                <input type="date" class="form-control " id="validationServer05" aria-describedby="validationServer05Feedback" required>
                <!-- <div id="validationServer05Feedback" class="invalid-feedback">
                   Selecione uma data.
                </div> -->
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Cadastrar Atividade</button>
            </div>
        </form>
    </div>
</div>