<?php

declare(strict_types=1);

namespace Yusr\BladeYusrIcons\Concerns;

use Illuminate\Support\Str;

trait RendersAttributes
{
    private array $attributes;

    public function attributes(): array
    {
        return $this->attributes;
    }

    private function renderAttributes(): string
    {
        if (count($this->attributes) == 0) {
            return '';
        }

        return ' '.collect($this->attributes)->map(function (string $value, $attribute) {
            if (is_int($attribute)) {
                return $value;
            }

            return sprintf('%s="%s"', $attribute, $value);
        })->implode(' ');
    }

    public function __call(string $method, array $arguments): self
    {
        if (count($arguments) === 0) {
            $this->attributes[] = Str::snake($method, '-');
        } else {
            $this->attributes[Str::snake($method, '-')] = $arguments[0];
        }

        return $this;
    }
}
