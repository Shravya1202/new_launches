<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OtherProducts Model
 *
 * @property \App\Model\Table\CategoriesTable&\Cake\ORM\Association\BelongsTo $Categories
 *
 * @method \App\Model\Entity\OtherProduct newEmptyEntity()
 * @method \App\Model\Entity\OtherProduct newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OtherProduct[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OtherProduct get($primaryKey, $options = [])
 * @method \App\Model\Entity\OtherProduct findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OtherProduct patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OtherProduct[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OtherProduct|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OtherProduct saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OtherProduct[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OtherProduct[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OtherProduct[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OtherProduct[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OtherProductsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('other_products');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Stores', [
            'foreignKey' => 'id'
        ]);

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('category_id')
            ->notEmptyString('category_id');

        $validator
            ->scalar('img')
            ->maxLength('img', 255)
            ->allowEmptyString('img');

        $validator
            ->scalar('product_info')
            ->maxLength('product_info', 255)
            ->allowEmptyString('product_info');

        $validator
            ->decimal('product_price')
            ->allowEmptyString('product_price');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }
}