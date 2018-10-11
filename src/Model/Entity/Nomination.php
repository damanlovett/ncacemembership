<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Nomination Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $award_id
 * @property string $organization_name
 * @property string $first_name
 * @property string $last_name
 * @property string $nominee_phone
 * @property string $nomination
 * @property string $contact
 * @property string $contact_phone
 * @property string $contact_email
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $visible
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Award $award
 * @property \App\Model\Entity\Vote[] $votes
 */
class Nomination extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
