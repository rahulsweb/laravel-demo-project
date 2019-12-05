<?php 
// change constrain during migration 
// 1:
public function up()
    {
        Schema::table('category_product', function (Blueprint $table) {
            //
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('CASCADE')->onUpdate('CASCADE');            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_product', function (Blueprint $table) {
            //
            $table->dropForeign(['category_id']);
            $table->dropForeign(['product_id']);
    
        });
    }

    