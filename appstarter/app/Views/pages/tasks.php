<?php
$tasks = json_encode([
    [
        'id' => "1",
        'user_name' => "Marcos",
        'category' => "DEV",
        'description' => "Desenvolvimento de projeto para este na Anglo Vestibulares",
        'date' => date('d/m/Y')
    ],
    [
        'id' => "2",
        'user_name' => "José",
        'category' => "TEST",
        'description' => "Teste de projeto para este na Anglo Vestibulares",
        'date' => date('d/m/Y')
    ]
]);
$tasks = json_decode($tasks);
?>
<div class="container ">
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Tarefa</th>
                <th scope='col'>Categoria</th>
                <th scope='col'>data</th>
                <th scope='col'>Responsavel</th>
                <th scope='col'>Detalhar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($tasks as $task) {

                echo "<tr>
         <th scope='row'>{$task->id}</th>
         <td>$task->description</td>
         <td><span class='badge bg-success'>{$task->category}</span></td>
         <td>{$task->date}</td>
         <td>@{$task->user_name}</td>
         <td><a href='/task/{$task->id}'><i class='fas fa-eye'></i></a></td>
         </tr>";
            }
            ?>
        </tbody>
    </table>
    
</div>