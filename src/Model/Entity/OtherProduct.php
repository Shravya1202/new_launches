<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OtherProduct Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string|null $img
 * @property string|null $product_info
 * @property string|null $product_price
 *
 * @property \App\Model\Entity\Category $category
 */
class OtherProduct extends Entity
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
        'category_id' => true,
        'img' => true,
        'product_info' => true,
        'product_price' => true,
        'category' => true,
    ];
}
