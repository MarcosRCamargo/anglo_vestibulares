<?php
\Config\Services::validation()->listErrors()

?>
<div class="container ">
    <h1 class="text-center">Lista de Responsáveis cadastrados</h1>
    <table class='table'>
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>nome</th>
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
                <td>
                <a href='/task/{$task->id}'><i class='fas fa-eye' style='color:green'></i></a>
                <a href='/edit/{$task->id}'><i class='fas fa-pen gren'></i></a>
                <a href='/delete/{$task->id}' ><i class='fas fa-trash' style='color:red'></i></a>
                </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</div>