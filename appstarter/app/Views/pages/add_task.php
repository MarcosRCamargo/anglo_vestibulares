<div class="container-sm">
    <h1 class="text-center">Cadastre uma nova Tarefa</h1>
    <div>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="validationServer01" class="form-label">Titulo</label>
                <input type="text" class="form-control " id="validationServer01" placeholder="Titulo da Tarefa" required>
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
                        <option>...</option>
                    </select>
                    <!-- <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        Por favor Selecione um responsável.
                    </div> -->
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationServer03" class="form-label">Descrição</label>
                <div class="input-group">
                    <span class="input-group-text">Descrição da Tarefa</span>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>
                <!-- <div id="validationServer03Feedback" class="invalid-feedback">
                    Por favor preencha a descrição.
                </div> -->
            </div>
            <div class="col-md-3">
                <label for="validationServer04" class="form-label">Categoria</label>
                <select class="form-select " id="validationServer04" aria-describedby="validationServer04Feedback" required>
                    <option selected disabled value="">Escolha...</option>
                    <option>...</option>
                </select>
                <!-- <div id="validationServer04Feedback" class="invalid-feedback">
                    Selecione uma categoria.
                </div> -->
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