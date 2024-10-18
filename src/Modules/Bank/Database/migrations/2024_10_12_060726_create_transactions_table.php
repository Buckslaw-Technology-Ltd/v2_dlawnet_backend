<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Bank\Database\Enums\ServiceTypeEnum;
use Modules\Bank\Database\Enums\TransactionStatusEnum;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->string('status')->default(TransactionStatusEnum::PENDING);
            $table->string('service_type')->default(ServiceTypeEnum::WALLET_TOP_UP);
            $table->float('amount', 10, 4);
            $table->string('proof_of_payment')->nullable();
            $table->integer('user_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
