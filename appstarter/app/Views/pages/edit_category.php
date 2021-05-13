
<?php
$category = json_encode([
        'id' => "1",
        'title' => "DEV",
    ]);
$category = json_decode($category);
?>
<div class="container-sm">

    <h1 class="text-center">Editar Categoria</h1>
    <div>
        <form class="row g-3">
            <div class="col-md-6">
                <label for="validationServer01" class="form-label">Titulo</label>
                <input type="text" class="form-control is-valid" id="validationServer01" value="<?php echo $category->title?>" required>
                <div class="valid-feedback">
                    Preenchido!
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Cadastrar Categoria</button>
            </div>
        </form>
    </div>
</div>