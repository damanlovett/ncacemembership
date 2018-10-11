<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Membership Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $status
 * @property string $otype
 * @property int $member_year
 * @property string $membership_type
 * @property string $type_payment
 * @property float $due_amount
 * @property string $members_included
 * @property string $account_questions
 * @property int $mentor_program
 * @property int $processed
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 */
class Membership extends Entity
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
