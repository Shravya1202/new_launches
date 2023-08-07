<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OtherProductsFixture
 */
class OtherProductsFixture extends TestFixture
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
                'id' => 1,
                'category_id' => 1,
                'img' => 'Lorem ipsum dolor sit amet',
                'product_info' => 'Lorem ipsum dolor sit amet',
                'product_price' => 1.5,
            ],
        ];
        parent::init();
    }
}
