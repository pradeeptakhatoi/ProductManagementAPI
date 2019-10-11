<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProductFormFields Model
 *
 * @property \App\Model\Table\ProductFormsTable|\Cake\ORM\Association\BelongsTo $ProductForms
 * @property \App\Model\Table\ProductAttributesTable|\Cake\ORM\Association\HasMany $ProductAttributes
 * @property \App\Model\Table\ProductFormFieldValuesTable|\Cake\ORM\Association\HasMany $ProductFormFieldValues
 *
 * @method \App\Model\Entity\ProductFormField get($primaryKey, $options = [])
 * @method \App\Model\Entity\ProductFormField newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ProductFormField[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ProductFormField|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductFormField|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ProductFormField patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ProductFormField[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ProductFormField findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProductFormFieldsTable extends Table
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

        $this->setTable('product_form_fields');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ProductForms', [
            'foreignKey' => 'product_form_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProductAttributes', [
            'foreignKey' => 'product_form_field_id'
        ]);
        $this->hasMany('ProductFormFieldValues', [
            'foreignKey' => 'product_form_field_id'
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
            ->scalar('name')
            ->maxLength('name', 256)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->notEmpty('type');

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
        $rules->add($rules->existsIn(['product_form_id'], 'ProductForms'));

        return $rules;
    }
}
