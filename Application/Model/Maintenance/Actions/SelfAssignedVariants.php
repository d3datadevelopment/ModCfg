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

class SelfAssignedVariants extends AbstractAction
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
        $oQB = $this->getBaseQuery('oa');
        $oQB->select('count(oa.oxid)')
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
        $baseQuery = $this->getBaseQuery('oa');
        $baseQuery->select('oa.oxid');
        $allIds = $baseQuery->execute()->fetchAllNumeric();

        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->update('oxarticles', 'updateTable')
            ->set('updateTable.oxparentid', '')
            ->set('updateTable.oxtitle', 'unassigned article')
            ->where(
                $queryBuilder->expr()->in(
                    'delTable.oxid',
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
            'D3_CFG_CLRTMP_VARIANTPARENTISVAR_SUCC'
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
        $oQB->from('oxarticles', $tableAlias)
            ->where(
                $oQB->expr()->eq($tableAlias.".oxid", $tableAlias.".oxparentid")
            );

        return $oQB;
    }
}
