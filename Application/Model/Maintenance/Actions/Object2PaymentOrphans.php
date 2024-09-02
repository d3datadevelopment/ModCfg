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

class Object2PaymentOrphans extends AbstractAction
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
        $oQB = $this->getBaseQuery('o2p');
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
            $this->getBaseQuery('o2p'),
            'o2p.oxid',
            'oxobject2payment',
            'D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT_SUCC'
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
        $oQB->from('oxobject2payment', $tableAlias)
            ->leftJoin($tableAlias, 'oxpayments', 'pay', $oQB->expr()->eq($tableAlias.'.oxpaymentid', 'pay.oxid'))
            ->leftJoin($tableAlias, 'oxcountry', 'cou', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'cou.oxid'))
            ->leftJoin($tableAlias, 'oxdeliveryset', 'des', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'des.oxid'))
            ->where(
                $oQB->expr()->or(
                    $oQB->expr()->isNull('pay.oxid'),
                    $oQB->expr()->and(
                        $oQB->expr()->eq($tableAlias.'.oxtype', $oQB->createNamedParameter('oxcountry')),
                        $oQB->expr()->isNull('cou.oxid')
                    ),
                    $oQB->expr()->and(
                        $oQB->expr()->eq($tableAlias.'.oxtype', $oQB->createNamedParameter('oxdelset')),
                        $oQB->expr()->isNull('des.oxid')
                    )
                )
            );

        return $oQB;
    }
}
