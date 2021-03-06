<?php
namespace PatrickBroens\Pbsurvey\Domain\Repository;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;
use PatrickBroens\Pbsurvey\Domain\Model\PageConditionRule;

/**
 * Page condition rule repository
 */
class PageConditionRuleRepository extends AbstractRepository
{
    /**
     * @param int $pageConditionGroupUid The uid of the page condition group
     * @param array $loadObjects The nested models which should be loaded
     * @return \PatrickBroens\Pbsurvey\Domain\Model\PageConditionGroup[]
     */
    public function findByPageConditionGroup($pageConditionGroupUid, $loadObjects = [])
    {
        $pageConditionRules = [];

        $databaseResource = $this->getDatabaseConnection()->exec_SELECTquery(
            '
                uid,
                item,
                item_option,
                item_option_additional,
                operator
            ',
            'tx_pbsurvey_page_condition_rule',
            '
                parentid = ' . (int)$pageConditionGroupUid . '
                AND hidden = 0
                AND deleted = 0
            ',
            '',
            'sorting ASC'
        );

        if ($this->getDatabaseConnection()->sql_error()) {
            $this->getDatabaseConnection()->sql_free_result($databaseResource);
            return $pageConditionRules;
        }

        while ($record = $this->getDatabaseConnection()->sql_fetch_assoc($databaseResource)) {
            $pageConditionRules[] = $this->setPageConditionRuleFromRecord($record, $loadObjects);
        }

        $this->getDatabaseConnection()->sql_free_result($databaseResource);

        return $pageConditionRules;
    }

    /**
     * Set an page condition rule from a database record
     *
     * @param array $record The database record
     * @param array $loadObjects The nested models which should be loaded
     * @return \PatrickBroens\Pbsurvey\Domain\Model\PageConditionRule The page condition rule
     */
    protected function setPageConditionRuleFromRecord($record, $loadObjects)
    {
        $pageConditionRule = GeneralUtility::makeInstance(PageConditionRule::class);
        $pageConditionRule->fill($record);

        return $pageConditionRule;
    }
}