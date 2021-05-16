<?php

namespace msng\ReadOnlyProperties;

trait ReadOnlyProperties
{
    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}
