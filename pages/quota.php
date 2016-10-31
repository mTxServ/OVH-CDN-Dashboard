<?php
$quotas = $api->get('/cdn/dedicated/' . $cdn . '/quota?period=day');
?>

<h1 class="page-header">Quota</h1>
<div class="col-xs-12">
    
    <div id="quota-graph" style="min-width: 310px; height: 300px; margin: 0 auto; margin-bottom: 60px;"></div>
    
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Bande passante restante</th>
            </tr>
        </thead>
        <tbody>
            <?php $graph = array(); ?>
            <?php foreach ($quotas as $values): ?>
                <?php
                $dt = new DateTime($values->date);
                ?>
                <?php $graph[] = array($dt->format('U') * 1000, (float) formatBytes($values->value)) ?>
            <tr>
                <td><?=$dt->format('d-M-Y H:i:s') ?></td>
                <td><?=formatBytes($values->value) ?>Mo</td>
            </tr>
            <?php endforeach; ?>
            <?php $graph = array_reverse($graph) ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(function () {
        $('#quota-graph').highcharts({
            title: {
                text: 'Bande passante restante',
                x: -20 //center
            },
            yAxis: {
                title: {
                    text: 'Bande passante restante'
                }
            },
            xAxis: {
                type: 'datetime'
            },
            tooltip: {
                valueSuffix: 'Mo'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Bande passante',
                data: <?php echo json_encode($graph) ?>
            }]
        });
    });
</script>
