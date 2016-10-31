<?php
$ssl = $api->get('/cdn/dedicated/' . $cdn . '/ssl');
?>

<h1 class="page-header">Config SSL</h1>
<div class="col-xs-12">
    <table class="table">
        <tbody>
            <tr>
                <td>Name</td>
                <td><?=$ssl->name ?></td>
            </tr>
            <tr>
                <td>Domain</td>
                <td><?=$ssl->cn ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?=$ssl->status ?></td>
            </tr>
            <tr>
                <td>Certificate Start Date</td>
                <td><?php $dt = new DateTime($ssl->certificateValidFrom); echo $dt->format('d-M-Y H:i:s'); ?></td>
            </tr>
            <tr>
                <td>Certificate End Date</td>
                <td><?php $dt = new DateTime($ssl->certificateValidTo); echo $dt->format('d-M-Y H:i:s'); ?></td>
            </tr>
        </tbody>
    </table>
</div>
