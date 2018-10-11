<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Conferences Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Fees
 * @property \Cake\ORM\Association\HasMany $Registrations
 *
 * @method \App\Model\Entity\Conference get($primaryKey, $options = [])
 * @method \App\Model\Entity\Conference newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Conference[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Conference|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Conference patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Conference[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Conference findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ConferencesTable extends Table
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

        $this->table('conferences');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Fees', [
            'foreignKey' => 'conference_id'
        ]);
        $this->hasMany('Registrations', [
            'foreignKey' => 'conference_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('header_text', 'create')
            ->notEmpty('header_text');

        $validator
            ->requirePresence('member_text', 'create')
            ->notEmpty('member_text');

        $validator
            ->requirePresence('renewed_text', 'create')
            ->notEmpty('renewed_text');

        $validator
            ->requirePresence('first_time', 'create')
            ->notEmpty('first_time');

        $validator
            ->requirePresence('first_text', 'create')
            ->notEmpty('first_text');

        $validator
            ->requirePresence('registration_text', 'create')
            ->notEmpty('registration_text');

        $validator
            ->requirePresence('lunch_text', 'create')
            ->notEmpty('lunch_text');

        $validator
            ->requirePresence('footer_text', 'create')
            ->notEmpty('footer_text');

        $validator
            ->integer('visible')
            ->requirePresence('visible', 'create')
            ->notEmpty('visible');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
