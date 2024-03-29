<?php
namespace Lukasbableck\ContaoRecurringElementBundle\EventListener;

use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Model;
use Contao\StringUtil;
use Contao\System;

#[AsHook('isVisibleElement')]
class IsVisibleElementListener{

    public function __invoke(Model $element, bool $isVisible): bool{
		if(System::getContainer()->get('request_stack')->getCurrentRequest()->get('_route') == "contao_backend") return $isVisible;
		
        if ($element instanceof ContentModel) {
			if($element->recurring){
				return $this->isElementActive($element);
			}
        }

        return $isVisible;
    }

	private function isElementActive(ContentModel $element): bool{
		
		$now = new \DateTime();
		$weekday = strtolower($now->format('l'));
		$monthday = $now->format('j');
		$month = $now->format('n');

		if($element->recurringWeekdays){
			$weekdays = StringUtil::deserialize($element->recurringWeekdays);
			if(!in_array($weekday, $weekdays)){
				return false;
			}
		}
		if($element->recurringMonthdays){
			$monthdays = StringUtil::deserialize($element->recurringMonthdays);
			if(!in_array($monthday, $monthdays)){
				return false;
			}
		}
		if($element->recurringMonths){
			$months = StringUtil::deserialize($element->recurringMonths);
			if(!in_array($month, $months)){
				return false;
			}
		}

		if($element->recurringStart){
			$start = new \DateTime();
			$start->setTimestamp($element->recurringStart);
			if($now < $start){
				return false;
			}
		}
		if($element->recurringEnd){
			$end = new \DateTime();
			$end->setTimestamp($element->recurringEnd);
			if($now > $end){
				return false;
			}
		}
		
		if($element->recurringInterval){
			if($element->recurringIntervalCount){
				$intervalCount = $element->recurringIntervalCount;
			}else{
				$intervalCount = 1;
			}
			switch($element->recurringInterval){
				case 'daily':
					$interval = new \DateInterval('P' . $intervalCount . 'D');
					break;
				case 'weekly':
					$interval = new \DateInterval('P' . $intervalCount . 'W');
					break;
				case 'monthly':
					$interval = new \DateInterval('P' . $intervalCount . 'M');
					break;
				case 'yearly':
					$interval = new \DateInterval('P' . $intervalCount . 'Y');
					break;
			}
			if(!isset($end)){
				$end = $now;
			}
			$daterange = new \DatePeriod($start, $interval, $end);
			foreach($daterange as $date){
				$duration = 1;
				if($element->recurringIntervalDuration) {
					$duration = $element->recurringIntervalDuration - 1;
				}
				$range = new \DatePeriod($date, new \DateInterval('P1D'), $duration);
				foreach($range as $day){
					if(date('Y-m-d', $day->getTimestamp()) == date('Y-m-d', $now->getTimestamp())){
						return true;
					}
				}
			}
		}

		return false;
	}

}
