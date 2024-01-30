<?php

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurring"] = [
	"exclude" => true,
	"inputType" => "checkbox",
	"eval" => ["tl_class" => "w50"],
	"sql" => "char(1) NOT NULL default ''",
];

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurringInterval"] = [
	"exclude" => true,
	"inputType" => "select",
	"options" => ["daily", "weekly", "monthly", "yearly"],
	"reference" => &$GLOBALS["TL_LANG"]["tl_content"]["recurringInterval"],
	"eval" => ["tl_class" => "w50", "includeBlankOption" => true, "submitOnChange" => true],
	"sql" => "varchar(32) NOT NULL default ''",
];

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurringIntervalCount"] = [
	"exclude" => true,
	"inputType" => "text",
	"eval" => ["tl_class" => "w50", "rgxp" => "digit"],
	"sql" => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurringStart"] = [
	"exclude" => true,
	"inputType" => "text",
	"eval" => ['rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'],
	"sql" => "varchar(10) NOT NULL default ''",
];

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurringEnd"] = [
	"exclude" => true,
	"inputType" => "text",
	"eval" => ['rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'],
	"sql" => "varchar(10) NOT NULL default ''",
];

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurringWeekdays"] = [
	"exclude" => true,
	"inputType" => "checkbox",
	"options" => ["monday", "tuesday", "wednesday", "thursday", "friday", "saturday", "sunday"],
	"reference" => &$GLOBALS["TL_LANG"]["tl_content"]["recurringWeekdays"],
	"eval" => ["tl_class" => "clr", "multiple" => true],
	"sql" => "blob NULL",
];

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurringMonthdays"] = [
	"exclude" => true,
	"inputType" => "checkbox",
	"options" => range(1, 31),
	"eval" => ["tl_class" => "clr", "multiple" => true],
	"sql" => "blob NULL",
];

$GLOBALS["TL_DCA"]["tl_content"]["fields"]["recurringMonths"] = [
	"exclude" => true,
	"inputType" => "checkbox",
	"options" => range(1, 12),
	"eval" => ["tl_class" => "clr", "multiple" => true],
	"sql" => "blob NULL",
];


PaletteManipulator::create()
	->addLegend('recurring_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE)
	->addField('recurring', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->addField('recurringInterval', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->addField('recurringIntervalCount', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->addField('recurringStart', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->addField('recurringEnd', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->addField('recurringWeekdays', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->addField('recurringMonthdays', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->addField('recurringMonths', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
	->applyToPalette('default', 'tl_content')
	->applyToPalette('headline', 'tl_content')
	->applyToPalette('text', 'tl_content')
	->applyToPalette('html', 'tl_content')
	->applyToPalette('unfiltered_html', 'tl_content')
	->applyToPalette('list', 'tl_content')
	->applyToPalette('description_list', 'tl_content')
	->applyToPalette('table', 'tl_content')
	->applyToPalette('accordion', 'tl_content')
	->applyToPalette('element_group', 'tl_content')
	->applyToPalette('accordionStart', 'tl_content')
	->applyToPalette('accordionStop', 'tl_content')
	->applyToPalette('accordionSingle', 'tl_content')
	->applyToPalette('swiper', 'tl_content')
	->applyToPalette('sliderStart', 'tl_content')
	->applyToPalette('sliderStop', 'tl_content')
	->applyToPalette('code', 'tl_content')
	->applyToPalette('markdown', 'tl_content')
	->applyToPalette('template', 'tl_content')
	->applyToPalette('hyperlink', 'tl_content')
	->applyToPalette('toplink', 'tl_content')
	->applyToPalette('image', 'tl_content')
	->applyToPalette('gallery', 'tl_content')
	->applyToPalette('player', 'tl_content')
	->applyToPalette('youtube', 'tl_content')
	->applyToPalette('vimeo', 'tl_content')
	->applyToPalette('download', 'tl_content')
	->applyToPalette('downloads', 'tl_content')
	->applyToPalette('alias', 'tl_content')
	->applyToPalette('article', 'tl_content')
	->applyToPalette('teaser', 'tl_content')
	->applyToPalette('form', 'tl_content')
	->applyToPalette('module', 'tl_content');