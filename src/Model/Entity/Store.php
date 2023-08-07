<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Store Entity
 *
 * @property int $store_id
 * @property int|null $id
 * @property string|null $store_logo
 * @property string|null $store_price
 * @property string|null $store_url
 *
 * @property \App\Model\Entity\OtherProduct $other_product
 */
class Store extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id' => true,
        'store_logo' => true,
        'store_price' => true,
        'store_url' => true,
        'other_product' => true,
    ];
}