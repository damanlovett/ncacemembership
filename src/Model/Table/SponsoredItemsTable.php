<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SponsoredItems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sponsorships
 * @property \Cake\ORM\Association\BelongsTo $SponsoredLevels
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $Sponsors
 *
 * @method \App\Model\Entity\SponsoredItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\SponsoredItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SponsoredItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SponsoredItem|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SponsoredItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SponsoredItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SponsoredItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SponsoredItemsTable extends Table
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

        $this->table('sponsored_items');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sponsorships', [
            'foreignKey' => 'sponsorship_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SponsoredLevels', [
            'foreignKey' => 'sponsored_level_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Sponsors', [
            'foreignKey' => 'sponsored_item_id'
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
            ->integer('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['sponsorship_id'], 'Sponsorships'));
        $rules->add($rules->existsIn(['sponsored_level_id'], 'SponsoredLevels'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
