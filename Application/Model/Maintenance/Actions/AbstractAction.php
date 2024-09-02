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

use Assert\Assert;
use Assert\InvalidArgumentException;
use Doctrine\DBAL\Driver\Exception as DoctrineDriverException;
use Doctrine\DBAL\Exception as DoctrineException;
use Doctrine\DBAL\Query\QueryBuilder;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\UtilsView;
use OxidEsales\EshopCommunity\Internal\Container\ContainerFactory;
use OxidEsales\EshopCommunity\Internal\Framework\Database\QueryBuilderFactoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

abstract class AbstractAction implements ActionInterface
{
    /**
     * @return QueryBuilder
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    protected function getQueryBuilder(): QueryBuilder
    {
        return ContainerFactory::getInstance()->getContainer()->get(QueryBuilderFactoryInterface::class)->create();
    }

    /**
     * @param QueryBuilder $baseQuery
     * @param string       $oxidField
     * @param string       $deleteTable
     * @param string       $messageIdent
     *
     * @throws ContainerExceptionInterface
     * @throws DoctrineDriverException
     * @throws DoctrineException
     * @throws NotFoundExceptionInterface
     */
    protected function fixAction(QueryBuilder $baseQuery, string $oxidField, string $deleteTable, string $messageIdent): void
    {
        try {
            $baseQuery->select($oxidField);

            $allIds = $baseQuery->execute()->fetchAllAssociative();
            Assert::that($allIds)->isArray()->minCount(1);

            $queryBuilder = $this->getQueryBuilder();
            $queryBuilder->delete($deleteTable)
                ->where(
                    $queryBuilder->expr()->in('oxid', implode(
                        ', ',
                        array_map(
                            fn ($fieldList) => $queryBuilder->createNamedParameter($fieldList['oxid']),
                            $allIds
                        )
                    ))
                );

            $this->_performAction(
                [ count($allIds) ? $queryBuilder : null ],
                $messageIdent
            );
        } catch (InvalidArgumentException) {
        }
    }

    /**
     * @param QueryBuilder[]|null[] $aClearQueries
     * @param                $sMessageIdent
     */
    protected function _performAction(array $aClearQueries, $sMessageIdent): void
    {
        $iRow = 0;

        /** @var ?QueryBuilder $clearQuery */
        foreach ($aClearQueries as $clearQuery) {
            try {
                $iRow += $clearQuery ? $clearQuery->execute() : 0;
            } catch (DoctrineException $e) {
                Registry::getUtilsView()->addErrorToDisplay($e);
            }
        }

        Registry::get(UtilsView::class)->addErrorToDisplay(
            sprintf(
                Registry::getLang()->translateString($sMessageIdent),
                $iRow
            )
        );
    }

    /**
     * @return UtilsView
     */
    protected function getUtilsView(): UtilsView
    {
        return Registry::getUtilsView();
    }
}
