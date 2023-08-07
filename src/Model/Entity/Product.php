<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $product_id
 * @property int|null $category_id
 * @property string|null $product_name
 * @property string|null $product_description
 *
 * @property \App\Model\Entity\Category $category
 */
class Product extends Entity
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
        'product_name' => true,
        'product_description' => true,
        'category' => true,
    ];
}
