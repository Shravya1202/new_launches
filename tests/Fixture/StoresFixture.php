<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StoresFixture
 */
class StoresFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'store_id' => 1,
                'other_product_id' => 1,
                'store_logo' => 'Lorem ipsum dolor sit amet',
                'store_price' => 1.5,
                'store_url' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
