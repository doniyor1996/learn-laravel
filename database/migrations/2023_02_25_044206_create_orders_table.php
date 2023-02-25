<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)
                ->constrained('users');

            $table->foreignIdFor(Status::class)
                ->constrained('statuses');

            $table->decimal('amount', 16);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Product::class)
                ->constrained('products');

            $table->foreignIdFor(Order::class)
                ->constrained('orders');

            $table->decimal('price', 16);
            $table->integer('quantity', unsigned: true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
