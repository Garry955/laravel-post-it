<?php

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
        Schema::create('friends', function(Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->constrained();
            $table->foreignIdFor(User::class, 'friend_id' )->constrained('users');
            $table->enum('status', ['pending', 'accepted'])->default('pending');
            $table->date('friends_since')->nullable();
            $table->timestamps();
        });

        // TODO FRIENDSHIPS TABLE REMAKE @ BOOKMARK
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
};
