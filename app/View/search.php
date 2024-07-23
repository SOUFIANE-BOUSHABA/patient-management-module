

<?php foreach ($searchResults as $task) : ?>
    <tr>
        <td><?= $task->id ?></td>
        <td><?= $task->name ?></td>
        <td><?= $task->description ?></td>
        <td><?= $task->status ?></td>
        <td><?= $task->deadline ?></td>
       
        <td>
            <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#addTaskModala<?= $task->id ?>">Modifier</a>
            <a href="?uri=home/deletTask/<?= $task->id ?>" class="btn btn-danger btn-sm">Supprimer</a>
        </td>
    </tr>
<?php endforeach; ?>
