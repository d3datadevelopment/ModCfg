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
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Query\QueryBuilder;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class DeactivateEmptyCategories extends AbstractAction
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
        $oQB = $this->getBaseQuery('tmp');
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
        $baseQuery = $this->getBaseQuery('tmp');
        $baseQuery->select('tmp.oxid');
        $allIds = $baseQuery->execute()->fetchAllNumeric();

        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update('oxcategories', 'updateTable')
            ->set('updateTable.oxactive', $queryBuilder->createNamedParameter(0, ParameterType::INTEGER))
            ->where(
                $queryBuilder->expr()->in(
                    'updateTable.oxid',
                    implode(
                        ', ',
                        array_map(
                            fn ($id) => $queryBuilder->createNamedParameter($id),
                            $allIds
                        )
                    )
                )
            );

        $this->_performAction(
            [count($allIds) ? $queryBuilder : null],
            'D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES_SUCC'
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
        $oQB->select([
                         'oc.oxid',
                         'SUM(if (art.oxactive = 1, 1, if (
                                NOW() BETWEEN art.oxactivefrom AND art.oxactiveto,
                                1,
                                0
                            ))) AS ArtActive',
                     ])
            ->from('oxcategories', 'oc')
            ->leftJoin('oc', 'oxcategories', 'childcategories', $oQB->expr()->eq('oc.oxid', 'childcategories.oxparentid'))
            ->leftJoin(
                'oc',
                'oxobject2category',
                'o2c',
                $oQB->expr()->or(
                    $oQB->expr()->eq('oc.oxid', 'o2c.oxcatnid'),
                    $oQB->expr()->isNull('o2c.oxcatnid')
                )
            )
            ->leftJoin('o2c', 'oxarticles', 'art', $oQB->expr()->eq('o2c.oxobjectid', 'art.oxid'))
            ->where(
                $oQB->expr()->and(
                    $oQB->expr()->neq('oc.oxactive', '0'),
                    $oQB->expr()->isNull('childcategories.oxid')
                )
            )
            ->groupBy('oc.oxid')
            ->having(
                $oQB->expr()->eq('ArtActive', '0')
            );
        $sSubQuery = $oQB->getSQL();

        $oQB = $this->getQueryBuilder();
        $oQB->from("($sSubQuery) ".$tableAlias);
        return $oQB;
    }
}
