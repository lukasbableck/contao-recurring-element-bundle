<?php
namespace Lukasbableck\ContaoRecurringElementBundle\EventListener\DataContainer;

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Symfony\Component\HttpFoundation\RequestStack;

#[AsCallback(table: 'tl_content', target: 'config.onload')]
class AddRecurringFieldsCallback{

    private $requestStack;

    public function __construct(RequestStack $requestStack){
        $this->requestStack = $requestStack;
    }

    public function __invoke(DataContainer $dc = null): void{
        if (null === $dc || !$dc->id || 'edit' !== $this->requestStack->getCurrentRequest()->query->get('act')) {
            return;
        }

		foreach($GLOBALS["TL_DCA"]["tl_content"]["palettes"] as $key => $value){
			if($key == "__selector__"){
				continue;
			}
			PaletteManipulator::create()
				->addLegend('recurring_legend', 'invisible_legend', PaletteManipulator::POSITION_BEFORE)
				->addField('recurring', 'recurring_legend', PaletteManipulator::POSITION_APPEND)
				->applyToPalette($key, 'tl_content');
		}

    }
}
