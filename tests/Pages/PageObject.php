<?php

namespace Pages;

class PageObject
{
    public function getSelector(string $selector)
    {
        return $this->selector[$selector];
    }

    public function getData(string $data)
    {
        return $this->data[$data];
    }
}