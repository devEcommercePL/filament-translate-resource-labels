<?php

arch()
    ->preset()
    ->php();

arch()
    ->preset()
    ->security();

arch()
    ->expect(['dd', 'dump'])
    ->not
    ->toBeUsed();
