<?php

namespace DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Resources;

use Illuminate\Contracts\Support\MessageBag as MessageBagContract;
use Illuminate\Support\MessageBag;

trait HasErrorBag {
    protected ?MessageBagContract $errorBag = null;

    public function getErrorBag(): MessageBagContract {
        if ($this->errorBag instanceof MessageBagContract) {
            return $this->errorBag;
        }

        return new MessageBag;
    }
}
