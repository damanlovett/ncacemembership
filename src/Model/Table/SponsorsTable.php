<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sponsors Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $SponsoredItems
 * @property \Cake\ORM\Association\BelongsTo $Sponsorships
 *
 * @method \App\Model\Entity\Sponsor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sponsor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sponsor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sponsor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sponsor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SponsorsTable extends Table
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

        $this->table('sponsors');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Usrs', [
            'foreignKey' => 'usr_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SponsoredItems', [
            'foreignKey' => 'sponsored_item_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sponsorships', [
            'foreignKey' => 'sponsorship_id',
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
            ->boolean('processed')
            ->requirePresence('processed', 'create')
            ->notEmpty('processed');

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
        $rules->add($rules->existsIn(['usr_id'], 'Usrs'));
        $rules->add($rules->existsIn(['sponsored_item_id'], 'SponsoredItems'));
        $rules->add($rules->existsIn(['sponsorships_id'], 'Sponsorships'));

        return $rules;
    }
}