<?php


    it('person can register', function () {
        $response = $this->get('/');

        $response->assertSee('Register Now');
        $response->assertStatus(200);
    });
