<?php
\Config\Services::validation()->listErrors()

?>
<div class="container ">
    <h1 class="text-center">Lista de Tarefas cadastradas</h1>
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
            // var_dump($tasks);die;   
            foreach ($tasks as $task) {

                $task = (object) $task;

                $date_to_finish = date('d/m/Y', strtotime($task->data_to_finish));
                $description = substr($task->body, 0, 30);
                echo "<tr>
                <th scope='row'>{$task->id}</th>
                <td>{$description}...</td>
                <td><span class='badge bg-success'>{$task->category_name}</span></td>
                <td>{$date_to_finish}</td>
                <td>@{$task->ownder_task}</td>
                <td>
                <a href='/task/{$task->id}'><i class='fas fa-eye' style='color:green'></i></a>
                <a href='/edit-task/{$task->id}'><i class='fas fa-pen gren'></i></a>
                <a href='/delete-task/{$task->id}' ><i class='fas fa-trash' style='color:red'></i></a>
                </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

</div>