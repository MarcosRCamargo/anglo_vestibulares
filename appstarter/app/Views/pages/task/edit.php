<div class="container-sm">
    <h1 class="text-center">Editar Tarefa</h1>
    <div>
        <form class="row g-3" action="/task/update" method="post">
            <?= csrf_field() ?>
            <div class="col-md-6">
                <label for="validationServer01" class="form-label">Titulo</label>
                <input type="text" class="form-control " name="id" value="<?= $task->id ?>" hidden>
                <input type="text" class="form-control " id="validationServer01" name="title" placeholder="Titulo da Tarefa" value="<?= $task->title ?>">
            </div>
            <div class="col-md-4">
                <label for="validationServerUsername" class="form-label">Responsavel pela Tarefa</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                    <select class="form-select " id="validationServer04" name="id_owner" aria-describedby="validationServer04Feedback" required>
                        <option selected disabled value="">Selecione um responsavel...</option>
                        <?php foreach ($owners as $owner) : ?>
                            <option value="<?= $owner['id'] ?>" <?php if ($owner['id'] == $task->id_owner) {
                                                                    echo "selected";
                                                                } ?>><?= $owner['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationServer03" class="form-label">Descrição</label>
                <div class="input-group">
                    <span class="input-group-text">Descrição da Tarefa</span>
                    <textarea class="form-control" aria-label="With textarea" name="body"><?= $task->body ?></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationServer04" class="form-label">Categoria</label>
                <select class="form-select " id="validationServer04" name="id_category" aria-describedby="validationServer04Feedback" required>
                    <option selected disabled value="">Escolha...</option>

                    <?php foreach ($categoryes as $category) : ?>
                        <option value="<?= $category['id'] ?>" 
                        <?php if ($category['id'] == $task->id_category) { echo "selected"; } ?>><?= $category['title'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="validationServer05" class="form-label">Data para conclusão</label>
                <input type="date" class="form-control " id="validationServer05" name="data_to_finish" aria-describedby="validationServer05Feedback" required value="<?= substr($task->data_to_finish, 0, 10,) ?>">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Atualizar Atividade</button>
            </div>
        </form>
    </div>
</div>