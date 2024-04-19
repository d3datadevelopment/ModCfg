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

class Object2GroupOrphans extends AbstractAction
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
        $oQB = $this->getBaseQuery('o2g');
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
            $this->getBaseQuery('o2g'),
            'o2g.oxid',
            'oxobject2group',
            'D3_CFG_CLRTMP_ASSIGNOBJ2GROUP_SUCC'
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
        $oQB->from('oxobject2group', $tableAlias)
            ->leftJoin($tableAlias, 'oxgroups', 'oxgroups', $oQB->expr()->eq($tableAlias.'.oxgroupsid', 'oxgroups.oxid'))
            ->leftJoin($tableAlias, 'oxuser', 'oxuser', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'oxuser.oxid'))
            ->leftJoin($tableAlias, 'oxpayments', 'oxpayments', $oQB->expr()->eq($tableAlias.'.oxobjectid', 'oxpayments.oxid'))
            ->where(
                $oQB->expr()->or(
                    $oQB->expr()->isNull("oxgroups.oxid"),
                    $oQB->expr()->and(
                        $oQB->expr()->isNull('oxuser.oxid'),
                        $oQB->expr()->isNull('oxpayments.oxid')
                    )
                )
            );

        return $oQB;
    }
}
