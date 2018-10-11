<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Registration Entity
 *
 * @property int $id
 * @property int $conference_id
 * @property string $member_status
 * @property string $renewed_membership
 * @property string $first_time
 * @property string $registration_type
 * @property string $lunch_plans
 * @property int $user_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $footer_text
 * @property int $processed
 *
 * @property \App\Model\Entity\Conference $conference
 * @property \App\Model\Entity\User $user
 */
class Registration extends Entity
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
