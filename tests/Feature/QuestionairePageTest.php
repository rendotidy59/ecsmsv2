<?php

test('questionaire create page loads', function () {
    $response = $this->get('/questionaire/create');
    $response->assertStatus(200);
});
