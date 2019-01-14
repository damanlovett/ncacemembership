<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SponsoredLevels Model
 *
 * @property \Cake\ORM\Association\HasMany $SponsoredItems
 *
 * @method \App\Model\Entity\SponsoredLevel get($primaryKey, $options = [])
 * @method \App\Model\Entity\SponsoredLevel newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SponsoredLevel[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SponsoredLevel|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SponsoredLevel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SponsoredLevel[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SponsoredLevel findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SponsoredLevelsTable extends Table
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

        $this->table('sponsored_levels');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('SponsoredItems', [
            'foreignKey' => 'sponsored_level_id'
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
            ->allowEmpty('description');

        $validator
            ->integer('placement')
            ->requirePresence('placement', 'create')
            ->notEmpty('placement');

        return $validator;
    }
}
