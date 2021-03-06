<?php
namespace PatrickBroens\Pbsurvey\Domain\Model;

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

use PatrickBroens\Pbsurvey\Domain\Model\Item;
use PatrickBroens\Pbsurvey\Domain\Model\PageConditionGroup;

/**
 * Page
 */
class Page extends AbstractModel
{
    /**
     * The condition groups
     *
     * @var \PatrickBroens\Pbsurvey\Domain\Model\PageConditionGroup[]
     */
    protected $conditionGroups;

    /**
     * The page introduction
     *
     * @var string
     */
    protected $introduction;

    /**
     * The items
     *
     * @var \PatrickBroens\Pbsurvey\Domain\Model\Item[]
     */
    protected $items = [];

    /**
     * The page title
     *
     * @var string
     */
    protected $title;

    /**
     * Check if the page contains condition groups
     *
     * @return bool true when condition groups are available
     */
    public function hasConditionGroups()
    {
        return !empty($this->conditionGroups);
    }

    /**
     * Get the condition groups
     *
     * @return \PatrickBroens\Pbsurvey\Domain\Model\PageConditionGroup[]
     */
    public function getConditionGroups()
    {
        return $this->conditionGroups;
    }

    /**
     * Add a condition group
     *
     * @param \PatrickBroens\Pbsurvey\Domain\Model\PageConditionGroup $conditionGroup The condition group
     */
    public function addConditionGroup(PageConditionGroup $conditionGroup)
    {
        $this->conditionGroups[] = $conditionGroup;
    }

    /**
     * Add condition groups
     *
     * @param \PatrickBroens\Pbsurvey\Domain\Model\PageConditionGroup[] $conditionGroups The condition groups
     */
    public function addConditionGroups(array $conditionGroups)
    {
        foreach ($conditionGroups as $conditionGroup) {
            if ($conditionGroup instanceof \PatrickBroens\Pbsurvey\Domain\Model\PageConditionGroup) {
                $this->addItem($conditionGroup);
            }
        }
    }

    /**
     * Get the page introduction
     *
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * Set the page introduction
     *
     * @param string $introduction The page introduction
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = (string)$introduction;
    }

    /**
     * Check if the page contains items
     *
     * @return bool true when items are available
     */
    public function hasItems()
    {
        return !empty($this->items);
    }

    /**
     * Get the items
     *
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add an item
     *
     * @param \PatrickBroens\Pbsurvey\Domain\Model\Item $item The item
     * @TODO: Do check on instance
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    /**
     * Add an array of items
     *
     * @param \PatrickBroens\Pbsurvey\Domain\Model\Item[] $items The items
     * @TODO: Do check on instance
     */
    public function addItems(array $items)
    {
        foreach ($items as $item) {
            //if ($item instanceof \PatrickBroens\Pbsurvey\Domain\Model\Item) {
                $this->addItem($item);
            //}
        }
    }

    /**
     * Get the page title
     *
     * @return string The page title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the page title
     *
     * @param string $title The page title
     */
    public function setTitle($title)
    {
        $this->title = (string)$title;
    }
}