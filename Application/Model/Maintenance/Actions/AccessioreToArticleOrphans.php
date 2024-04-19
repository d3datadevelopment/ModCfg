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

class AccessioreToArticleOrphans extends AbstractAction
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
        $queryBuilder = $this->getBaseQuery('a2a');
        $queryBuilder->select('count(*)')
                     ->setMaxResults(1);

        return (int) $queryBuilder->execute()->fetchOne();
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
            $this->getBaseQuery('a2a'),
            'a2a.oxid',
            'oxaccessoire2article',
            'D3_CFG_CLRTMP_ASSIGNACC2ART_SUCC'
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
        $queryBuilder = $this->getQueryBuilder();
        $queryBuilder
            ->from('oxaccessoire2article', $tableAlias)
            ->leftJoin(
                $tableAlias,
                'oxarticles',
                'art',
                $queryBuilder->expr()->eq($tableAlias.'.oxarticlenid', 'art.oxid')
            )
            ->leftJoin(
                $tableAlias,
                'oxarticles',
                'acc',
                $queryBuilder->expr()->eq($tableAlias.'.oxobjectid', 'acc.oxid')
            )
            ->where(
                $queryBuilder->expr()->or(
                    $queryBuilder->expr()->isNull('art.oxid'),
                    $queryBuilder->expr()->isNull('acc.oxid')
                )
            );
        return $queryBuilder;
    }
}
