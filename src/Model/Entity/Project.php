<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Cake\I18n\Date $deadline
 * @property string|null $management_tool_link
 * @property \Cake\I18n\Date $last_checked_date
 * @property bool $is_completed
 * @property int $organisation_id
 * @property int|null $contractor_id
 *
 * @property \App\Model\Entity\Organisation $organisation
 * @property \App\Model\Entity\Contractor $contractor
 * @property \App\Model\Entity\Skill[] $skills
 */
class Project extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'description' => true,
        'deadline' => true,
        'management_tool_link' => true,
        'last_checked_date' => true,
        'is_completed' => false, // Protect 'is_completed' from being mass-assigned
        'organisation_id' => true,
        'contractor_id' => true,
        'organisation' => true,
        'contractor' => true,
        'skills' => true,
    ];

    /**
     * A virtual field for project's completion status
     *
     * @return string
     */
    protected function _getCompletionStatus(): string
    {
        return $this->is_completed ? 'Done' : 'In Progress';
    }
}
