<?php

namespace DevEcommercePL\FilamentTranslateResourceLabels\Tests\Stubs\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StubModel extends Model {
    protected $table = 'stub_models';

    protected $guarded = ['id'];

    public static function migrate(): void {
        Schema::create('stub_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('foo');
            $table->timestamps();
        });
    }
}
