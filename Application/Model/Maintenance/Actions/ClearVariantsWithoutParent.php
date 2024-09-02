<?php

/**
 * Copyright (c) D3 Data Development (Inh. Thomas Dartsch)
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <info@shopmodule.com>
 * @link      https://www.oxidmodule.com
 */

declare(strict_types=1);

namespace D3\ModCfg\Application\Model\Maintenance\Actions;

use Doctrine\DBAL\Driver\Exception as DoctrineDriverException;
use Doctrine\DBAL\Exception as DoctrineException;
use Doctrine\DBAL\Query\QueryBuilder;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ClearVariantsWithoutParent extends AbstractAction
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
        $oQB = $this->getBaseQuery('oav');
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
        $baseQuery = $this->getBaseQuery('oav');
        $baseQuery->select('oav.oxid');
        $allIds = $baseQuery->execute()->fetchAllNumeric();

        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete('oxarticles', 'deleteTable')
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

        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder->delete('oxartextends', 'deleteTable')
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
            'D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT_SUCC'
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
            ->leftJoin($tableAlias, 'oxarticles', 'oap', $oQB->expr()->eq($tableAlias.'.oxparentid', 'oap.oxid'))
            ->where(
                $oQB->expr()->and(
                    $oQB->expr()->neq($tableAlias.".oxparentid", "''"),
                    $oQB->expr()->isNull('oap.oxid')
                )
            );

        return $oQB;
    }
}
