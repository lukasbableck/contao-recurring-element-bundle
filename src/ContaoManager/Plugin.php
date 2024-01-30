<?php
namespace Lukasbableck\ContaoRecurringElementBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Lukasbableck\ContaoRecurringElementBundle\ContaoRecurringElementBundle;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\HttpKernel\KernelInterface;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array{
        return [BundleConfig::create(ContaoRecurringElementBundle::class)->setLoadAfter([ContaoCoreBundle::class])];
    }

}