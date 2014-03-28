<?php
if (isset($_GET['flush'])) {
    $api->post('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/flush', null);
}

$rules = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/cacheRules');
?>

<h1 class="page-header">Cache Rules</h1>
<div class="col-xs-12">

    <?php if (isset($_GET['flush'])): ?>
    <div class="alert alert-success">
        Cache flushed
    </div>
    <?php else: ?>
    <div class="text-right">
        <a href="index.php?page=rules&flush" class="btn btn-danger">Flush Cache</a>
    </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>cacheType</th>
                <th>fileType</th>
                <th>fileMatch</th>
                <th>ttl</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rules as $ruleId): ?>
            <tr>
                <?php
                $rule = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/cacheRules/' . $ruleId);
                ?>
                <td><?=$rule->cacheType ?></td>
                <td><?=$rule->fileType ?></td>
                <td><?=$rule->fileMatch ?></td>
                <td><?=$rule->ttl ?></td>
                <td><?=$rule->status ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
