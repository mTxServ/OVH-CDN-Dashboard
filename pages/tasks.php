<?php
$tasks = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/tasks');
?>

<h1 class="page-header">Tasks</h1>
<div class="col-xs-12">
    <table class="table">
        <thead>
            <tr>
                <th>Function</th>
                <th>Comment</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $taskId): ?>
            <tr>
                <?php
                $task = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/tasks/' . $taskId);
                ?>
                <td><?=$task->function ?></td>
                <td><?=$task->comment ?></td>
                <td><?=$task->status ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
