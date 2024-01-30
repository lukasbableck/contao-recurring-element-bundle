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

$palette = "{recurring_legend},recurring,recurringInterval,recurringIntervalCount,recurringStart,recurringEnd,recurringWeekdays,recurringMonthdays,recurringMonths;";

foreach($GLOBALS["TL_DCA"]["tl_content"]["palettes"] as $key => $value){
	if($key == "__selector__"){
		continue;
	}
	$GLOBALS["TL_DCA"]["tl_content"]["palettes"][$key] = str_replace("{expert_legend:hide}", $palette . "{expert_legend:hide}", $value);
}