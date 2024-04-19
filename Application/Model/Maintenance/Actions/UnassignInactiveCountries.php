<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

declare(strict_types=1);

namespace D3\ModCfg\Application\Model\Maintenance\Actions;

use Doctrine\DBAL\Driver\Exception as DoctrineDriverException;
use Doctrine\DBAL\Exception as DoctrineException;
use Doctrine\DBAL\Query\QueryBuilder;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class UnassignInactiveCountries extends AbstractAction
{
    /**
     * @return int
     * @throws ContainerExceptionInterface
     * @throws DoctrineDriverException
     * @throws DoctrineException
     * @throws NotFoundExceptionInterface
     */
    public function getAffectedRows(): int
    {
        $oQB = $this->getBaseQuery('oc');
        $oQB->select('count(*)')
            ->setMaxResults(1);

        return (int) $oQB->execute()->fetchOne();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws DoctrineDriverException
     * @throws DoctrineException
     * @throws NotFoundExceptionInterface
     */
    public function fixIt(): void
    {
        $this->fixAction(
            $this->getBaseQuery('oc'),
            'oc.oxid',
            'oxobject2delivery',
            'D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES_SUCC'
        );
        $this->fixAction(
            $this->getBaseQuery('oc'),
            'oc.oxid',
            'oxobject2payment',
            'D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES_SUCC'
        );
    }

    /**
     * @param string $tableAlias
     *
     * @return QueryBuilder
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getBaseQuery(string $tableAlias): QueryBuilder
    {
        $oQB = $this->getQueryBuilder();
        $oQB->from('oxcountry', $tableAlias)
            ->leftJoin(
                $tableAlias,
                'oxobject2delivery',
                'o2d',
                $oQB->expr()->and(
                    $oQB->expr()->eq('o2d.oxtype', $oQB->createNamedParameter('oxcountry')),
                    $oQB->expr()->eq($tableAlias.'.oxid', 'o2d.oxobjectid')
                )
            )
            ->leftJoin(
                $tableAlias,
                'oxobject2payment',
                'o2p',
                $oQB->expr()->and(
                    $oQB->expr()->eq('o2p.oxtype', $oQB->createNamedParameter('oxcountry')),
                    $oQB->expr()->eq($tableAlias.'.oxid', 'o2p.oxobjectid')
                )
            )
            ->where(
                $oQB->expr()->and(
                    $oQB->expr()->neq($tableAlias.".oxactive", $oQB->createNamedParameter(1)),
                    $oQB->expr()->or(
                        $oQB->expr()->isNotNull('o2d.oxid'),
                        $oQB->expr()->isNotNull('o2p.oxid')
                    )
                )
            );

        return $oQB;
    }
}
