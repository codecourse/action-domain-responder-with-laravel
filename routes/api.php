<?php

Route::post('/topics', App\Forum\Actions\CreateTopicAction::class);
Route::get('/topics', App\Forum\Actions\ListTopicAction::class);
