<?php

declare(strict_types=1);

namespace Yusr\BladeYusrIcons\Components;

use Closure;
use Illuminate\View\Component;

final class Svg extends Component
{
    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $data['attributes']->getIterator()->getArrayCopy();

            $class = $attributes['class'] ?? '';

            unset($attributes['class']);

            return yusrSvg($this->componentName, $class, $attributes)->toHtml();
        };
    }
}