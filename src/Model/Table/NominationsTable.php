<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Nominations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Awards
 * @property \Cake\ORM\Association\HasMany $Votes
 *
 * @method \App\Model\Entity\Nomination get($primaryKey, $options = [])
 * @method \App\Model\Entity\Nomination newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Nomination[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Nomination|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Nomination patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Nomination[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Nomination findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class NominationsTable extends Table
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

        $this->table('nominations');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Awards', [
            'foreignKey' => 'award_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Votes', [
            'foreignKey' => 'nomination_id'
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
            ->requirePresence('organization_name', 'create')
            ->notEmpty('organization_name');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->requirePresence('nominee_phone', 'create')
            ->notEmpty('nominee_phone');

        $validator
            ->requirePresence('nomination', 'create')
            ->notEmpty('nomination');

        $validator
            ->requirePresence('contact', 'create')
            ->notEmpty('contact');

        $validator
            ->requirePresence('contact_phone', 'create')
            ->notEmpty('contact_phone');

        $validator
            ->requirePresence('contact_email', 'create')
            ->notEmpty('contact_email');

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
        $rules->add($rules->existsIn(['award_id'], 'Awards'));

        return $rules;
    }
}
