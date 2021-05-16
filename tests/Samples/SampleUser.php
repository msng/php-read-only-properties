<?php

namespace msng\ReadOnlyProperties\Tests\Samples;

use msng\ReadOnlyProperties\ReadOnlyProperties;

/**
 * 3. Mark as read-only for code editors
 * @property-read int $id
 * @property-read string $name
 */
class SampleUser
{
    use ReadOnlyProperties;

    // 1. Declare properties as private
    private int $id;
    private string $name;

    // 2. Initialize
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
