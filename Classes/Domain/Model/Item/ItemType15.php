<?php
namespace PatrickBroens\Pbsurvey\Domain\Model\Item;

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

use PatrickBroens\Pbsurvey\Domain\Model\Item\Abstracts\AbstractOpenEnded;
use PatrickBroens\Pbsurvey\Domain\Model\Item\Traits\LengthMaximumTrait;
use PatrickBroens\Pbsurvey\Domain\Model\Item\Traits\OptionRowsTrait;
use PatrickBroens\Pbsurvey\Domain\Model\Item\Traits\OptionsResponsesTrait;

/**
 * Item type 15: Open Ended - One or More Lines
 */
class ItemType15 extends AbstractOpenEnded
{
    /**
     * TRAIT: LengthMaximumTrait
     *
     * FIELDS:
     * $lengthMaximum
     */
    use LengthMaximumTrait;

    /**
     * TRAIT: OptionsResponsesTrait
     *
     * FIELDS:
     * $optionsResponsesMaximum
     * $optionsResponsesMinimum
     */
    use OptionsResponsesTrait;

    /**
     * TRAIT: OptionRowsTrait
     *
     * FIELDS:
     * $optionRows
     */
    use OptionRowsTrait;
}