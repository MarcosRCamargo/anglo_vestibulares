<?php
$tasks = json_encode([
    [
        'id' => "1",
        'category' => "DEV",
    ],
    [
        'id' => "2",
        'category' => "TEST",
    ]
]);
$tasks = json_decode($tasks);
?>

<div class="container ">
<h1 class="text-center">Categorias</h1>
    
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/add_category">
            <button type="button" class="btn btn-primary add-category align-left">Adicionar Categoria</button>
        </a>
    </div>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Categoria</th>
                <th scope='col'>Opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tasks as $task) {

                echo "<tr>
         <th scope='row'>{$task->id}</th>
         <td>$task->category</td>
         <td><a href='/category/{$task->id}'><i class='fas fa-pen'></i></a></td>
         </tr>";
            }
            ?>
        </tbody>
    </table>
</div>