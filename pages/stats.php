<?php
$cdnRequest     = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/statistics?period=day&type=cdn&value=request');
$backendRequest = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/statistics?period=day&type=backend&value=request');

$cdnBandwidth     = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/statistics?period=day&type=cdn&value=bandwidth');
$backendBandwidth = $api->get('/cdn/dedicated/' . $cdn . '/domains/' . $domain . '/statistics?period=day&type=backend&value=bandwidth');
?>

<h1 class="page-header">Stats</h1>
<div class="col-xs-12">
    
    <h2>CDN - Request</h2>
    <div id="cdn-request-graph" style="min-width: 310px; height: 300px; margin: 0 auto; margin-bottom: 60px;"></div>
    
    <h2>Backend - Request</h2>
    <div id="backend-request-graph" style="min-width: 310px; height: 300px; margin: 0 auto; margin-bottom: 60px;"></div>
    
    <h2>CDN - Bandwidth</h2>
    <div id="cdn-bandwidth-graph" style="min-width: 310px; height: 300px; margin: 0 auto; margin-bottom: 60px;"></div>
    
    <h2>Backend - Bandwidth</h2>
    <div id="backend-bandwidth-graph" style="min-width: 310px; height: 300px; margin: 0 auto; margin-bottom: 60px;"></div>
    
    <?php $graphCdnRequest = []; ?>
    <?php foreach ($cdnRequest as $values): ?>
        <?php $dt                = new DateTime($values->date); ?>
        <?php $graphCdnRequest[] = [$dt->format('U') * 1000, $values->value] ?>
     <?php endforeach; ?>
     <?php $graphCdnRequest = array_reverse($graphCdnRequest) ?>
    
    <?php $graphBackendRequest = []; ?>
    <?php foreach ($backendRequest as $values): ?>
        <?php $dt                    = new DateTime($values->date); ?>
        <?php $graphBackendRequest[] = [$dt->format('U') * 1000, $values->value] ?>
     <?php endforeach; ?>
     <?php $graphBackendRequest = array_reverse($graphBackendRequest) ?>
    
    <?php $graphCdnBandwidth = []; ?>
    <?php foreach ($cdnBandwidth as $values): ?>
        <?php $dt                  = new DateTime($values->date); ?>
        <?php $graphCdnBandwidth[] = [$dt->format('U') * 1000, formatBytes($values->value)] ?>
     <?php endforeach; ?>
     <?php $graphCdnBandwidth = array_reverse($graphCdnBandwidth) ?>
    
    <?php $graphBackendBandwidth = []; ?>
    <?php foreach ($backendBandwidth as $values): ?>
        <?php $dt                      = new DateTime($values->date); ?>
        <?php $graphBackendBandwidth[] = [$dt->format('U') * 1000, formatBytes($values->value)] ?>
     <?php endforeach; ?>
     <?php $graphBackendBandwidth = array_reverse($graphBackendBandwidth) ?>
</div>

<script type="text/javascript">
    $(function () {
        $('#cdn-bandwidth-graph').highcharts({
            title: {
                text: 'CDN - Bandwidth',
                x: -20 //center
            },
            yAxis: {
                title: {
                    text: 'CDN - Bandwidth'
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
                data: <?php echo json_encode($graphCdnBandwidth) ?>
            }]
        });
        
        $('#backend-bandwidth-graph').highcharts({
            title: {
                text: 'Backend - Bandwidth',
                x: -20 //center
            },
            yAxis: {
                title: {
                    text: 'Backend - Bandwidth'
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
                data: <?php echo json_encode($graphBackendBandwidth) ?>
            }]
        });
        
        $('#backend-request-graph').highcharts({
            title: {
                text: 'Backend - Request',
                x: -20 //center
            },
            yAxis: {
                title: {
                    text: 'Backend - Request'
                }
            },
            xAxis: {
                type: 'datetime'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Requetes',
                data: <?php echo json_encode($graphBackendRequest) ?>
            }]
        });
        
        $('#cdn-request-graph').highcharts({
            title: {
                text: 'CDN - Request',
                x: -20 //center
            },
            yAxis: {
                title: {
                    text: 'CDN - Request'
                }
            },
            xAxis: {
                type: 'datetime'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Requetes',
                data: <?php echo json_encode($graphCdnRequest) ?>
            }]
        });
    });
</script>
