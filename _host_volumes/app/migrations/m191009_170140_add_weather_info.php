<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m191009_170140_add_weather_info
 */
class m191009_170140_add_weather_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('weather',[
			'id' => Schema::TYPE_PK,
            'city' => Schema::TYPE_STRING . ' NOT NULL',
            'temp' => Schema::TYPE_STRING . ' NOT NULL',
		]);

		$weather = new \app\models\Weather();
		$weather->city = 'chelyabinsk';
		$weather->temp = '0';
        $weather->save(false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('weather');
		
		echo "m191009_170140_add_weather_info cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191009_170140_add_weather_info cannot be reverted.\n";

        return false;
    }
    */
}
