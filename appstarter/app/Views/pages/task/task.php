<div class="container-sm">
    <h1 class="text-center">Visualizar Tarefa</h1>
    <div>
        <form class="row g-3">
            <?= csrf_field() ?>
            <div class="col-md-6">
                <label for="validationServer01" class="form-label">Titulo</label>
                <input type="text" class="form-control " name="id" value="<?= $task->id ?>" hidden <?php if ($task->id) { echo "disabled"; } ?>>
                <input type="text" class="form-control " id="validationServer01" name="title" placeholder="Titulo da Tarefa" value="<?= $task->title ?>" <?php if ($task->title) { echo "disabled"; } ?>>
            </div>
            <div class="col-md-4">
                <label for="validationServerUsername" class="form-label">Responsavel pela Tarefa</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                    <select class="form-select " id="validationServer04" name="id_owner" aria-describedby="validationServer04Feedback" required <?php if ($owners) { echo "disabled"; } ?>>
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
                    <textarea class="form-control" aria-label="With textarea" name="body" <?php if ($task->body) { echo "disabled"; } ?>><?= $task->body ?></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <label for="validationServer04" class="form-label">Categoria</label>
                <select class="form-select " id="validationServer04" name="id_category" aria-describedby="validationServer04Feedback" <?php if ($categoryes) { echo "disabled"; } ?> required>
                    <option selected disabled value="">Escolha...</option>

                    <?php foreach ($categoryes as $category) : ?>
                        <option value="<?= $category['id'] ?>" 
                        <?php if ($category['id'] == $task->id_category) { echo "selected"; } ?>><?= $category['title'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="validationServer05" class="form-label">Data para conclusão</label>
                <input type="date" class="form-control " id="validationServer05" name="data_to_finish" aria-describedby="validationServer05Feedback" <?php if ($task->data_to_finish) { echo "disabled"; } ?> required value="<?= substr($task->data_to_finish, 0, 10,) ?>">
            </div>
            <div class="col-12">
            <a  class="btn btn-primary" href="/tasks">Voltar</a>
            </div>
        </form>
    </div>
</div>