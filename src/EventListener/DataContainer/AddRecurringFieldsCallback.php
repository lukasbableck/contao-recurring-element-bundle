<?php
namespace Lukasbableck\ContaoRecurringElementBundle\EventListener\DataContainer;

use Contao\ContentModel;
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
			$GLOBALS["TL_DCA"]["tl_content"]["palettes"][$key] = str_replace("{expert_legend", "{recurring_legend},recurring;{expert_legend", $value);
		}

    }
}