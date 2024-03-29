<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductFormFieldValues Model
 *
 * @property \App\Model\Table\ProductFormFieldsTable|\Cake\ORM\Association\BelongsTo $ProductFormFields
 *
 * @method \App\Model\Entity\ProductFormFieldValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductFormFieldValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductFormFieldValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductFormFieldValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductFormFieldValue|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductFormFieldValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductFormFieldValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductFormFieldValue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductFormFieldValuesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('product_form_field_values');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductFormFields', [
            'foreignKey' => 'product_form_field_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('value')
            ->maxLength('value', 500)
            ->requirePresence('value', 'create')
            ->notEmpty('value');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['product_form_field_id'], 'ProductFormFields'));

        return $rules;
    }
}
