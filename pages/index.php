<?php
$infos = $api->get('/cdn/dedicated/' . $cdn . '/serviceInfos');
?>

<h1 class="page-header">Overview</h1>
<div class="col-xs-12">
    <table class="table">
        <tbody>
            <tr>
                <td>Domain</td>
                <td><?=$infos->domain ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><?=$infos->status ?></td>
            </tr>
            <tr>
                <td>Expire At</td>
                <td><?php $dt = new DateTime($infos->expiration); echo $dt->format('d-M-Y') ?></td>
            </tr>
            <tr>
                <td>Contact Billing</td>
                <td><?=$infos->contactBilling ?></td>
            </tr>
            <tr>
                <td>Contact Admin</td>
                <td><?=$infos->contactAdmin ?></td>
            </tr>
        </tbody>
    </table>
</div>
