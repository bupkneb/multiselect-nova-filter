<?php

namespace bupkneb\Filters;

use InvalidArgumentException;
use Laravel\Nova\Filters\Filter;

abstract class MultiselectFilter extends Filter
{
    public const CLEAR_ON_SELECT = 'clearOnSelect';
    public const CLOSE_ON_SELECT = 'closeOnSelect';
    public const DESELECT_LABEL = 'deselectLabel';
    public const NO_OPTIONS_LABEL = 'noOptionsLabel';
    public const NO_RESULT_LABEL = 'noResultLabel';
    public const PLACEHOLDER = 'placeholder';
    public const SELECT_LABEL = 'selectLabel';
    public const SELECTED_LABEL = 'selectedLabel';
    public const SHOW_LABELS = 'showLabels';

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'multiselect-filter';

    public function __construct(array $configuration = [])
    {
        $this->configure($configuration);
    }

    protected function configure(array $configuration): void
    {
        if (empty($configuration)) {
            return;
        }

        foreach ($configuration as $property => $value) {
            if (!in_array($property, self::getProperties(), true)) {
                throw new InvalidArgumentException('Invalid property: ' . $property);
            }

            $this->withMeta([$property => $value]);
        }
    }

    /**
     * @return string[]
     */
    public static function getProperties(): array
    {
        return [
            self::CLEAR_ON_SELECT,
            self::CLOSE_ON_SELECT,
            self::DESELECT_LABEL,
            self::NO_OPTIONS_LABEL,
            self::NO_RESULT_LABEL,
            self::PLACEHOLDER,
            self::SELECT_LABEL,
            self::SELECTED_LABEL,
            self::SHOW_LABELS,
        ];
    }
}
