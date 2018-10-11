<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blurbs  Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Blurb get($primaryKey, $options = [])
 * @method \App\Model\Entity\Blurb newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Blurb[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Blurb|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blurb patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Blurb[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Blurb findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BlurbsTable extends Table
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

        $this->table('blurbs');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');



        return $validator;
    }
	
	/**
	 * Used to get blurb by id
	 *
	 * @access public
	 * @param integer $BlurbId 
	 * @return array
	 */
	public function getBlurbById($blurbId) {
		$result = $this->find()
				->where(['Blurbs.id'=>$blurbId])
				->first();
		return $result;
	}	

}
