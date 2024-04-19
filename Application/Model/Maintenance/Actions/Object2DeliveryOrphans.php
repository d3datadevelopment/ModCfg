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

class Object2DeliveryOrphans extends AbstractAction
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
        $oQB = $this->getBaseQuery('o2d');
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
            $this->getBaseQuery('o2d'),
            'o2d.oxid',
            'oxobject2delivery',
            'D3_CFG_CLRTMP_ASSIGNOBJ2DEL_SUCC'
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
        $oQB->from('oxobject2delivery', $tableAlias)
            ->leftJoin($tableAlias, 'oxarticles', 'art', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'art.oxid'))
            ->leftJoin($tableAlias, 'oxdelivery', 'del', $oQB->expr()->eq($tableAlias.'.oxdeliveryid', 'del.oxid'))
            ->leftJoin($tableAlias, 'oxcountry', 'cou', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'cou.oxid'))
            ->leftJoin($tableAlias, 'oxdeliveryset', 'des', $oQB->expr()->eq($tableAlias.'.oxdeliveryid', 'des.oxid'))
            ->where(
                $oQB->expr()->or(
                    $oQB->expr()->and(
                        $oQB->expr()->eq($tableAlias.'.oxtype', $oQB->createNamedParameter('oxarticles')),
                        $oQB->expr()->or(
                            $oQB->expr()->isNull('art.oxid'),
                            $oQB->expr()->isNull('del.oxid')
                        )
                    ),
                    $oQB->expr()->or(
                        $oQB->expr()->isNull('cou.oxid'),
                        $oQB->expr()->or(
                            $oQB->expr()->and(
                                $oQB->expr()->eq($tableAlias.'.oxtype', $oQB->createNamedParameter('oxcountry')),
                                $oQB->expr()->isNull('del.oxid')
                            ),
                            $oQB->expr()->and(
                                $oQB->expr()->eq($tableAlias.'.oxtype', $oQB->createNamedParameter('oxdelset')),
                                $oQB->expr()->isNull('des.oxid')
                            )
                        )
                    )
                )
            );

        return $oQB;
    }
}
