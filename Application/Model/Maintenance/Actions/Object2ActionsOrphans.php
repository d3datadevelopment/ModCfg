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

class Object2ActionsOrphans extends AbstractAction
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
        $oQB = $this->getBaseQuery('o2a');
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
            $this->getBaseQuery('o2a'),
            'o2a.oxid',
            'oxobject2action',
            'D3_CFG_CLRTMP_ASSIGNOBJ2ACTION_SUCC'
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
        $oQB->from('oxobject2action', $tableAlias)
            ->leftJoin($tableAlias, 'oxactions', 'oac', $oQB->expr()->eq($tableAlias.'.oxactionid', 'oac.oxid'))
            ->leftJoin($tableAlias, 'oxarticles', 'oar', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'oar.oxid'))
            ->leftJoin($tableAlias, 'oxgroups', 'og', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'og.oxid'))
            ->where(
                $oQB->expr()->or(
                    $oQB->expr()->isNull('oac.oxid'),
                    $oQB->expr()->and(
                        $oQB->expr()->eq($tableAlias.'.oxclass', $oQB->createNamedParameter('oxarticle')),
                        $oQB->expr()->isNull('oar.oxid')
                    ),
                    $oQB->expr()->and(
                        $oQB->expr()->eq($tableAlias.'.oxclass', $oQB->createNamedParameter('oxgroups')),
                        $oQB->expr()->isNull('og.oxid')
                    )
                )
            );
        return $oQB;
    }
}
