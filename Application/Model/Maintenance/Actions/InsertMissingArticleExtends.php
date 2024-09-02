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

use D3\ModCfg\Application\Model\d3utils;
use Doctrine\DBAL\Driver\Exception as DoctrineDriverException;
use Doctrine\DBAL\Exception as DoctrineException;
use Doctrine\DBAL\Query\QueryBuilder;
use OxidEsales\Eshop\Core\Registry;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class InsertMissingArticleExtends extends AbstractAction
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
        $aDefaultValueFields = [
            'oxtimestamp'   => "''",
        ];

        $aNonArtExtendsFields = [
            'oa.oxid'  => 'oxarticles.oxid',
        ];

        /** @var d3utils $oD3Utils */
        $oD3Utils = Registry::get(d3utils::class);
        $aArtExtendsFields = array_fill_keys($oD3Utils->getArtExtendsFields(), "''");
        $aMergedFields = array_merge($aNonArtExtendsFields, $aArtExtendsFields);
        $aQueryFields = array_diff_key($aMergedFields, $aDefaultValueFields);
        $artextendsFields = array_keys($aQueryFields);

        $baseQuery = $this->getBaseQuery('oa');
        $baseQuery->select($artextendsFields);

        $allIds = $baseQuery->execute()->fetchAllAssociative();
        $affected = 0;

        foreach ($allIds as $articleFields) {
            $queryBuilder = $this->getQueryBuilder();

            array_walk($articleFields, function (&$item) use ($queryBuilder) {
                $item = $queryBuilder->createNamedParameter($item ?? '');
            });
            $queryBuilder->insert('oxartextends')
                ->values($articleFields);
            $affected += (int) $queryBuilder->execute();
        }

        $this->getUtilsView()->addErrorToDisplay(
            sprintf(
                Registry::getLang()->translateString('D3_CFG_CLRTMP_OXARTICLECONSIST_SUCC'),
                $affected
            )
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
            ->leftJoin($tableAlias, 'oxartextends', 'oae', $oQB->expr()->eq($tableAlias.'.oxid', 'oae.oxid'))
            ->where(
                $oQB->expr()->isNull('oae.oxid')
            );

        return $oQB;
    }
}
