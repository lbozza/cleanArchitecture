<?php
$app->get('/probe', function ($request, $response) {
       return    $response->withStatus(200);
    });
$app->post('/registerProduct', \App\App\Action\RegisterProductAction::class);

