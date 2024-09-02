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
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Query\QueryBuilder;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class DisableVariantsWithInactiveParent extends AbstractAction
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
        $queryBuilder->update('oxarticles', 'updateTable')
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
            'D3_CFG_CLRTMP_VARIANTACTIVE_SUCC'
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
                    $oQB->expr()->eq("oap.oxactive", $oQB->createNamedParameter(0, ParameterType::INTEGER)),
                    $oQB->expr()->eq($tableAlias.".oxactive", $oQB->createNamedParameter(1, ParameterType::INTEGER))
                )
            );

        return $oQB;
    }
}
