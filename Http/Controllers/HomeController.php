<?php

class HomeController 
{
    public function __construct() {

    }

    public function __invoke() {
        return $this::class;
    }
}