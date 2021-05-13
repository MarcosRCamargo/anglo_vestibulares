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
    <div class="fluid">
        <a href="/add_category">
            <button type="button" class="btn btn-primary add-category">Adicionar Categoria</button>
        </a>
    </div>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tasks as $task) {

                echo "<tr>
         <th scope='row'>{$task->id}</th>
         <td>$task->category</td>
         </tr>";
            }
            ?>
        </tbody>
    </table>
</div>