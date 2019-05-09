<?php
/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Maintenance;

use D3\ModCfg\Application\Model\d3database;
use D3\ModCfg\Application\Model\d3utils;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Registry;
use OxidEsales\Eshop\Core\Database\Adapter\DatabaseInterface;
use OxidEsales\Eshop\Core\Exception\DatabaseErrorException;
use OxidEsales\Eshop\Core\Exception\DatabaseConnectionException;
use Doctrine\DBAL\DBALException;
use OxidEsales\Eshop\Core\UtilsView;

class d3maintenanceactions
{
    public $aCheckResults = array();

    public $aActions = array(
        'ClearAcc2Art',
        'ClearAct2Art',
        'ClearArtextends',
        'ClearCat2Attrib',
        'ClearDel2Delset',
        'ClearNewssubscribed',
        'ClearObj2Action',
        'ClearObj2Art',
        'ClearObj2Attrib',
        'ClearObj2Cat',
        'ClearObject2Delivery',
        'ClearObj2Disc',
        'ClearObj2Group',
        'ClearObj2List',
        'ClearObj2Payment',
        'ClearObj2Sellist',
        'ClearPrice2Art',
        'UnassignInactiveCountries',
        'DeactivateEmptyCategories',
        'OxArtextendsItems',
        'VariantParentAsVar',
        'ClearVariantsWithoutParent',
        'VariantActive',
    );

    /**
     * @return array
     */
    public function getCheckResults()
    {
        $aResults = Registry::getSession()->getVariable('aD3ShopMaintenanceResults');

        if (false == $aResults || (is_array($aResults) && false == count($aResults))) {
            $aResults = array();
            foreach ($this->aActions as $sAction) {
                $aResults[$sAction] = 0;
            }
        }

        return $aResults;
    }

    /**
     * @return array
     */
    public function checkAllActions()
    {
        $aCheckResults = array();

        foreach ($this->aActions as $iIndex => $sAction) {
            $aCheckResults[$sAction] = (int) call_user_func_array(array($this, 'check'.$sAction), array());
        }

        Registry::getSession()->setVariable('aD3ShopMaintenanceResults', $aCheckResults);

        return $aCheckResults;
    }

    /**
     * @param $aPrepareQueries
     * @param $aClearQueries
     * @param $aCleanUpQueries
     * @param $sMessageIdent
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    protected function _performAction($aPrepareQueries, $aClearQueries, $aCleanUpQueries, $sMessageIdent)
    {
        $iRow = 0;
        $oDb = $this->getDb();
        foreach ($aPrepareQueries as $sPrepareQuery) {
            $oDb->execute($sPrepareQuery);
        }

        foreach ($aClearQueries as $sClearQuery) {
            $iRow += $oDb->execute($sClearQuery);
        }

        foreach ($aCleanUpQueries as $sCleanUpQuery) {
            $oDb->execute($sCleanUpQuery);
        }

        Registry::get(UtilsView::class)->addErrorToDisplay(
            sprintf(
                Registry::getLang()->translateString($sMessageIdent),
                $iRow
            )
        );
    }

    /**
     * @return int
     * @throws DatabaseConnectionException
     * @throws DBALException
     */
    public function checkOxArtextendsItems()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxarticles', 'oa')
            ->leftJoin('oa', 'oxartextends', 'oae', 'oa.oxid = oae.oxid')
            ->where('oae.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     * @throws DBALException
     */
    public function fixOxArtextendsItems()
    {
        $aDefaultValueFields = array(
            'oxtimestamp'   => "''",
        );

        $aNonArtExtendsFields = array(
            'oxid'  => 'oxarticles.oxid',
        );

        /** @var d3utils $oD3Utils */
        $oD3Utils = Registry::get(d3utils::class);
        $aArtExtendsFields = array_fill_keys($oD3Utils->getArtExtendsFields(), "''");
        $aMergedFields = array_merge($aNonArtExtendsFields, $aArtExtendsFields);
        $aQueryFields = array_diff_key($aMergedFields, $aDefaultValueFields);

        $sArtExtendsFields = implode(', ', array_keys($aQueryFields));

        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select($aQueryFields)
            ->from('oxarticles')
            ->leftJoin('oxarticles', 'oxartextends', 'arx', 'oxarticles.oxid = arx.oxid')
            ->where('arx.oxid IS NULL');

        $aQueries = array(
            "INSERT INTO oxartextends ($sArtExtendsFields) ".
                $oQB->getSQL(),
        );

        $this->_performAction(
            array(),
            $aQueries,
            array(),
            'D3_CFG_CLRTMP_OXARTICLECONSIST_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearAcc2Art()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxaccessoire2article', 'd2ds')
            ->leftJoin('d2ds', 'oxarticles', 'art', 'd2ds.oxarticlenid = art.oxid')
            ->leftJoin('d2ds', 'oxarticles', 'acc', 'd2ds.oxobjectid = acc.oxid')
            ->where('art.oxid IS NULL')
            ->orWhere('acc.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearAcc2Art()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxaccessoire2article_copy AS (
                SELECT * FROM oxaccessoire2article
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxaccessoire2article WHERE oxid IN (
                SELECT d2ds.oxid
                FROM d3oxaccessoire2article_copy d2ds
                LEFT JOIN oxarticles art ON d2ds.oxarticlenid = art.oxid
                LEFT JOIN oxarticles acc ON d2ds.oxobjectid = acc.oxid
                WHERE (art.oxid IS NULL) OR (acc.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxaccessoire2article_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNACC2ART_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearAct2Art()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxactions2article', 'd2ds')
            ->leftJoin('d2ds', 'oxactions', 'oa', 'd2ds.oxactionid = oa.oxid')
            ->leftJoin('d2ds', 'oxarticles', 'oar', 'd2ds.oxartid = oar.oxid')
            ->where('oa.oxid IS NULL')
            ->orWhere('oar.oxid IS NULL')
            ->setMaxResults(1);

        $sSelect = $oQB->getSQL();

        return $this->getDb()->getOne($sSelect);
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearAct2Art()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxactions2article_copy AS (
                SELECT * FROM oxactions2article
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxactions2article WHERE oxid IN (
                SELECT d2ds.oxid
                FROM d3oxactions2article_copy d2ds
                LEFT JOIN oxactions ON d2ds.oxactionid = oxactions.oxid
                LEFT JOIN oxarticles ON d2ds.oxartid = oxarticles.oxid
                WHERE (oxactions.oxid IS NULL) OR (oxarticles.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxactions2article_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNACT2ART_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearArtextends()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxartextends', 'd2ds')
            ->leftJoin('d2ds', 'oxarticles', 'oar', 'd2ds.oxid = oar.oxid')
            ->where('oar.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearArtextends()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxartextends_copy AS (
                SELECT * FROM oxartextends
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxartextends WHERE oxid IN (
                SELECT d2ds.oxid
                FROM d3oxartextends_copy d2ds
                LEFT JOIN oxarticles ON d2ds.oxid = oxarticles.oxid
                WHERE (oxarticles.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxartextends_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNARTEXTENDS_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearCat2Attrib()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxcategory2attribute', 'd2ds')
            ->leftJoin('d2ds', 'oxcategories', 'oc', 'd2ds.oxobjectid = oc.oxid')
            ->leftJoin('d2ds', 'oxattribute', 'oa', 'd2ds.oxattrid = oa.oxid')
            ->where('oc.oxid IS NULL')
            ->orWhere('oa.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearCat2Attrib()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxcategory2attribute_copy AS (
                SELECT * FROM oxcategory2attribute
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxcategory2attribute WHERE oxid IN (
                SELECT d2ds.oxid
                FROM d3oxcategory2attribute_copy d2ds
                LEFT JOIN oxcategories ON d2ds.oxobjectid = oxcategories.oxid
                LEFT JOIN oxattribute ON d2ds.oxattrid = oxattribute.oxid
                WHERE (oxcategories.oxid IS NULL) OR (oxattribute.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxcategory2attribute_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNCAT2ATTRIB_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearDel2Delset()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxdel2delset', 'd2ds')
            ->leftJoin('d2ds', 'oxdelivery', 'od', 'd2ds.oxdelid = od.oxid')
            ->leftJoin('d2ds', 'oxdeliveryset', 'ods', 'd2ds.oxdelsetid = ods.oxid')
            ->where('od.oxid IS NULL')
            ->orWhere('ods.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearDel2Delset()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxdel2delset_copy AS (
                SELECT * FROM oxdel2delset
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxdel2delset WHERE oxid IN (
                SELECT d2ds.oxid
                FROM d3oxdel2delset_copy d2ds
                LEFT JOIN oxdelivery ON d2ds.oxdelid = oxdelivery.oxid
                LEFT JOIN oxdeliveryset ON d2ds.oxdelsetid = oxdeliveryset.oxid
                WHERE (oxdelivery.oxid IS NULL) OR (oxdeliveryset.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxdel2delset_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNDEL2DELSET_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearNewssubscribed()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxnewssubscribed', 'd2ds')
            ->leftJoin('d2ds', 'oxuser', 'ou', 'd2ds.oxuserid = ou.oxid')
            ->where('ou.oxid IS NULL')
            ->setMaxResults(1);

        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearNewssubscribed()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxnewssubscribed_copy AS (
                SELECT * FROM oxnewssubscribed
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxnewssubscribed WHERE oxid IN (
                SELECT d2ds.oxid
                FROM d3oxnewssubscribed_copy d2ds
                LEFT JOIN oxuser ON d2ds.oxuserid = oxuser.oxid
                WHERE (oxuser.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxnewssubscribed_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNNEWSSUBSCRIBED_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Action()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2action', 'o2p')
            ->leftJoin('o2p', 'oxactions', 'oac', 'o2p.oxactionid = oac.oxid')
            ->leftJoin('o2p', 'oxarticles', 'oar', 'o2p.oxobjectid = oar.oxid')
            ->leftJoin('o2p', 'oxgroups', 'og', 'o2p.oxobjectid = og.oxid')
            ->where('o2p.oxclass = '.$oQB->createNamedParameter('oxarticle').' AND oar.oxid IS NULL')
            ->orWhere('o2p.oxclass = '.$oQB->createNamedParameter('oxgroups').' AND og.oxid IS NULL')
            ->orWhere('oac.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL(), $oQB->getParameters());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Action()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2action_copy AS (
                SELECT * FROM oxobject2action
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2action WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2action_copy o2p
                LEFT JOIN oxactions ON o2p.oxactionid = oxactions.oxid
                LEFT JOIN oxarticles ON o2p.oxobjectid = oxarticles.oxid
                LEFT JOIN oxgroups ON o2p.oxobjectid = oxgroups.oxid
                WHERE (o2p.oxclass = 'oxarticle' AND oxarticles.oxid IS NULL)
                    OR (o2p.oxclass = 'oxgroups' && oxgroups.oxid IS NULL)
                    OR (oxactions.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2action_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2ACTION_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Art()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2article', 'o2p')
            ->leftJoin('o2p', 'oxarticles', 'art', 'o2p.oxarticlenid = art.oxid')
            ->leftJoin('o2p', 'oxarticles', 'obj', 'o2p.oxobjectid = obj.oxid')
            ->where('art.oxid IS NULL')
            ->orWhere('obj.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Art()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2article_copy AS (
                SELECT * FROM oxobject2article
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2article WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2article_copy o2p
                LEFT JOIN oxarticles art ON o2p.oxarticlenid = art.oxid
                LEFT JOIN oxarticles obj ON o2p.oxobjectid = obj.oxid
                WHERE (art.oxid IS NULL)
                    OR (obj.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2article_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2ART_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Attrib()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2attribute', 'o2p')
            ->leftJoin('o2p', 'oxarticles', 'art', 'o2p.oxobjectid = art.oxid')
            ->leftJoin('o2p', 'oxattribute', 'obj', 'o2p.oxattrid = obj.oxid')
            ->where('art.oxid IS NULL')
            ->orWhere('obj.oxid IS NULL')
            ->setMaxResults(1);

        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Attrib()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2attribute_copy AS (
                SELECT * FROM oxobject2attribute
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2attribute WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2attribute_copy o2p
                LEFT JOIN oxarticles ON o2p.oxobjectid = oxarticles.oxid
                LEFT JOIN oxattribute ON o2p.oxattrid = oxattribute.oxid
                WHERE (oxarticles.oxid IS NULL)
                    OR (oxattribute.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2attribute_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2ATTRIB_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Cat()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2category', 'o2p')
            ->leftJoin('o2p', 'oxarticles', 'art', 'o2p.oxobjectid = art.oxid')
            ->leftJoin('o2p', 'oxcategories', 'cat', 'o2p.oxcatnid = cat.oxid')
            ->where('art.oxid IS NULL')
            ->orWhere('cat.oxid IS NULL')
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Cat()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2category_copy AS (
                SELECT * FROM oxobject2category
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2category WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2category_copy o2p
                LEFT JOIN oxarticles ON o2p.oxobjectid = oxarticles.oxid
                LEFT JOIN oxcategories ON o2p.oxcatnid = oxcategories.oxid
                WHERE (oxarticles.oxid IS NULL)
                    OR (oxcategories.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2category_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2CAT_SUCC'
        );
    }

    /**
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObject2Delivery()
    {
        $oQB1 = d3database::getInstance()->getQueryBuilder();
        $oQB1->select('count(*)')
            ->from('oxobject2delivery', 'o2d')
            ->leftJoin('o2d', 'oxarticles', 'art', 'o2d.oxobjectid = art.oxid')
            ->leftJoin('o2d', 'oxdelivery', 'del', 'o2d.oxdeliveryid = del.oxid')
            ->where("o2d.oxtype = 'oxarticles'")
            ->andWhere('art.oxid IS NULL OR del.oxid IS NULL')
            ->setMaxResults(1);

        $oQB2 = d3database::getInstance()->getQueryBuilder();
        $oQB2->select('count(*)')
            ->from('oxobject2delivery', 'o2d')
            ->leftJoin('o2d', 'oxcountry', 'cou', 'o2d.oxobjectid = cou.oxid')
            ->leftJoin('o2d', 'oxdelivery', 'del', 'o2d.oxdeliveryid = del.oxid')
            ->leftJoin('o2d', 'oxdeliveryset', 'des', 'o2d.oxdeliveryid = des.oxid')
            ->where("(o2d.oxtype = 'oxcountry' AND del.oxid IS NULL) OR (o2d.oxtype = 'oxdelset' AND des.oxid IS NULL)")
            ->orWhere('cou.oxid IS NULL')
            ->setMaxResults(1);

        return (int) DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($oQB1->getSQL())
            + (int) DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($oQB2->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObject2Delivery()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2delivery_copy AS (
                SELECT * FROM oxobject2delivery
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2delivery WHERE oxid IN (
                SELECT o2d.oxid
                FROM d3oxobject2delivery_copy o2d
                LEFT JOIN oxarticles ON o2d.oxobjectid = oxarticles.oxid
                LEFT JOIN oxdelivery ON o2d.oxdeliveryid = oxdelivery.oxid
                WHERE o2d.oxtype = 'oxarticles'
                    AND (oxarticles.oxid IS NULL OR oxdelivery.oxid IS NULL)
            )",
            "DELETE FROM oxobject2delivery WHERE oxid IN (
                SELECT o2d.oxid
                FROM d3oxobject2delivery_copy o2d
                LEFT JOIN oxcountry ON o2d.oxobjectid = oxcountry.oxid
                LEFT JOIN oxdelivery ON o2d.oxdeliveryid = oxdelivery.oxid
                LEFT JOIN oxdeliveryset ON o2d.oxdeliveryid = oxdeliveryset.oxid
                WHERE ((o2d.oxtype = 'oxcountry' AND oxdelivery.oxid IS NULL)
                    OR (o2d.oxtype = 'oxdelset' AND oxdeliveryset.oxid IS NULL))
                    OR oxcountry.oxid IS NULL
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2delivery_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2DEL_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Disc()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2discount', 'o2p')
            ->leftJoin('o2p', 'oxdiscount', 'dis', 'o2p.oxdiscountid = dis.oxid')
            ->leftJoin('o2p', 'oxarticles', 'art', 'o2p.oxobjectid = art.oxid')
            ->leftJoin('o2p', 'oxcountry', 'cou', 'o2p.oxobjectid = cou.oxid')
            ->leftJoin('o2p', 'oxcategories', 'cat', 'o2p.oxobjectid = cat.oxid')
            ->where("o2p.oxtype = ".$oQB->createNamedParameter('oxarticles')." AND art.oxid IS NULL")
            ->orWhere("o2p.oxtype = ".$oQB->createNamedParameter('oxcountry')." AND cou.oxid IS NULL")
            ->orWhere("o2p.oxtype = ".$oQB->createNamedParameter('oxcategories')." AND cat.oxid IS NULL")
            ->orWhere("dis.oxid IS NULL")
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL(), $oQB->getParameters());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Disc()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2discount_copy AS (
                SELECT * FROM oxobject2discount
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2discount WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2discount_copy o2p
                LEFT JOIN oxdiscount ON o2p.oxdiscountid = oxdiscount.oxid
                LEFT JOIN oxarticles ON o2p.oxobjectid = oxarticles.oxid
                LEFT JOIN oxcountry ON o2p.oxobjectid = oxcountry.oxid
                LEFT JOIN oxcategories ON o2p.oxobjectid = oxcategories.oxid
                WHERE (o2p.oxtype = 'oxarticles' AND oxarticles.oxid IS NULL)
                    OR (o2p.oxtype = 'oxcountry' AND oxcountry.oxid IS NULL)
                    OR (o2p.oxtype = 'oxcategories' AND oxcategories.oxid IS NULL)
                    OR (oxdiscount.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2discount_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2DISC_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Group()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2group', 'o2p')
            ->leftJoin('o2p', 'oxgroups', 'oxgroups', 'o2p.oxgroupsid = oxgroups.oxid')
            ->leftJoin('o2p', 'oxuser', 'oxuser', 'o2p.oxobjectid = oxuser.oxid')
            ->leftJoin('o2p', 'oxpayments', 'oxpayments', 'o2p.oxobjectid = oxpayments.oxid')
            ->where("oxgroups.oxid IS NULL")
            ->orWhere("oxuser.oxid IS NULL AND oxpayments.oxid IS NULL")
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Group()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2group_copy AS (
                SELECT * FROM oxobject2group
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2group WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2group_copy o2p
                LEFT JOIN oxgroups ON o2p.oxgroupsid = oxgroups.oxid
                LEFT JOIN oxuser ON o2p.oxobjectid = oxuser.oxid
                LEFT JOIN oxpayments ON o2p.oxobjectid = oxpayments.oxid
                WHERE (oxgroups.oxid IS NULL)
                    OR (oxuser.oxid IS NULL AND oxpayments.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2group_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2GROUP_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2List()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2list', 'o2p')
            ->leftJoin('o2p', 'oxrecommlists', 'rcl', 'o2p.oxlistid = rcl.oxid')
            ->leftJoin('o2p', 'oxarticles', 'art', 'o2p.oxobjectid = art.oxid')
            ->where("rcl.oxid IS NULL")
            ->orWhere("art.oxid IS NULL")
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2List()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2list_copy AS (
                SELECT * FROM oxobject2list
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2list WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2list_copy o2p
                LEFT JOIN oxrecommlists ON o2p.oxlistid = oxrecommlists.oxid
                LEFT JOIN oxarticles ON o2p.oxobjectid = oxarticles.oxid
                WHERE (oxrecommlists.oxid IS NULL)
                    OR (oxarticles.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2list_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2LIST_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Payment()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2payment', 'o2p')
            ->leftJoin('o2p', 'oxpayments', 'pay', 'o2p.oxpaymentid = pay.oxid')
            ->leftJoin('o2p', 'oxcountry', 'cou', 'o2p.oxobjectid = cou.oxid')
            ->leftJoin('o2p', 'oxdeliveryset', 'des', 'o2p.oxobjectid = des.oxid')
            ->where("o2p.oxtype = ".$oQB->createNamedParameter('oxcountry')." AND cou.oxid IS NULL")
            ->orWhere("o2p.oxtype = ".$oQB->createNamedParameter('oxdelset')." && des.oxid IS NULL")
            ->orWhere("pay.oxid IS NULL")
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL(), $oQB->getParameters());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Payment()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2payment_copy AS (
                SELECT * FROM oxobject2payment
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2payment WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2payment_copy o2p
                LEFT JOIN oxpayments ON o2p.oxpaymentid = oxpayments.oxid
                LEFT JOIN oxcountry ON o2p.oxobjectid = oxcountry.oxid
                LEFT JOIN oxdeliveryset ON o2p.oxobjectid = oxdeliveryset.oxid
                WHERE (o2p.oxtype = 'oxcountry' AND oxcountry.oxid IS NULL)
                    OR (o2p.oxtype = 'oxdelset' && oxdeliveryset.oxid IS NULL)
                    OR (oxpayments.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2payment_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2PAYMENT_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearObj2Sellist()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxobject2selectlist', 'o2p')
            ->leftJoin('o2p', 'oxarticles', 'art', 'o2p.oxobjectid = art.oxid')
            ->leftJoin('o2p', 'oxselectlist', 'sel', 'o2p.oxselnid = sel.oxid')
            ->where("art.oxid IS NULL")
            ->orWhere("sel.oxid IS NULL")
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearObj2Sellist()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2selectlist_copy AS (
                SELECT * FROM oxobject2selectlist
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2selectlist WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxobject2selectlist_copy o2p
                LEFT JOIN oxarticles ON o2p.oxobjectid = oxarticles.oxid
                LEFT JOIN oxselectlist ON o2p.oxselnid = oxselectlist.oxid
                WHERE (oxarticles.oxid IS NULL)
                    OR (oxselectlist.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2selectlist_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNOBJ2SELLIST_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearPrice2Art()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxprice2article', 'o2p')
            ->leftJoin('o2p', 'oxarticles', 'art', 'o2p.oxartid = art.oxid')
            ->where("art.oxid IS NULL")
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearPrice2Art()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxprice2article_copy AS (
                SELECT * FROM oxprice2article
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxprice2article WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxprice2article_copy o2p
                LEFT JOIN oxarticles ON o2p.oxartid = oxarticles.oxid
                WHERE (oxarticles.oxid IS NULL)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxprice2article_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNPRICE2ART_SUCC'
        );
    }

    /**
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkUnassignInactiveCountries()
    {
        $oQB1 = d3database::getInstance()->getQueryBuilder();
        $oQB1->select('count(*)')
            ->from('oxcountry', 'oc')
            ->leftJoin('oc', 'oxobject2delivery', 'o2d', 'oc.oxid = o2d.oxobjectid')
            ->where("oc.oxactive != 1")
            ->andWhere("o2d.oxid IS NOT NULL")
            ->setMaxResults(1);

        $oQB2 = d3database::getInstance()->getQueryBuilder();
        $oQB2->select('count(*)')
            ->from('oxcountry', 'oc')
            ->leftJoin('oc', 'oxobject2payment', 'o2p', 'oc.oxid = o2p.oxobjectid')
            ->where("oc.oxactive != 1")
            ->andWhere("o2p.oxid IS NOT NULL")
            ->setMaxResults(1);

        return (int) $this->getDb()->getOne($oQB1->getSQL())
            + (int) $this->getDb()->getOne($oQB2->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixUnassignInactiveCountries()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxobject2delivery_copy AS (
                SELECT * FROM oxobject2delivery
            )",
            "CREATE TEMPORARY TABLE d3oxobject2payment_copy AS (
                SELECT * FROM oxobject2payment
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxobject2delivery WHERE oxid IN (
                SELECT o2d.oxid
                FROM oxcountry oc
                LEFT JOIN d3oxobject2delivery_copy o2d ON oc.oxid = o2d.oxobjectid
                WHERE oc.oxactive != 1 AND o2d.oxid IS NOT NULL
            )",
            "DELETE FROM oxobject2payment WHERE oxid IN (
                SELECT o2p.oxid
                FROM oxcountry oc
                LEFT JOIN d3oxobject2payment_copy o2p ON oc.oxid = o2p.oxobjectid
                WHERE oc.oxactive != 1 AND  o2p.oxid IS NOT NULL
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxobject2delivery_copy;',
            'DROP TABLE d3oxobject2payment_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_UNASSIGNINACTIVECOUNTRIES_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkDeactivateEmptyCategories()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select(array(
                    'oc.oxid',
                    'SUM(if (art.oxactive = 1, 1, if (
                                NOW() BETWEEN art.oxactivefrom AND art.oxactiveto,
                                1,
                                0
                            ))) AS ArtActive'
                ))
            ->from('oxcategories', 'oc')
            ->leftJoin('oc', 'oxcategories', 'childcategories', 'oc.oxid = childcategories.oxparentid')
            ->leftJoin('oc', 'oxobject2category', 'o2c', 'oc.oxid = o2c.oxcatnid OR o2c.oxcatnid IS NULL')
            ->leftJoin('o2c', 'oxarticles', 'art', 'o2c.oxobjectid = art.oxid')
            ->where("oc.oxactive != 0")
            ->andWhere('childcategories.oxid IS NULL')
            ->groupBy('oc.oxid')
            ->having('ArtActive = 0');
        $sSubQuery = $oQB->getSQL();

        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from("($sSubQuery) tmp")
            ->setMaxResults(1);

        $sSelect = $oQB->getSQL();

        return $this->getDb()->getOne($sSelect);
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixDeactivateEmptyCategories()
    {
        $aClearQueries = array(
            "UPDATE oxcategories
                LEFT JOIN (
                    SELECT
                        oxcategories.oxid,
                        SUM(if (oxarticles.oxactive = 1, 1, if (
                            NOW() BETWEEN oxarticles.oxactivefrom AND oxarticles.oxactiveto,
                            1,
                            0
                        ))) AS ArtActive
                    FROM oxcategories
                    LEFT JOIN oxcategories AS childcategories
                        ON oxcategories.oxid = childcategories.oxparentid
                    LEFT JOIN oxobject2category
                        ON oxcategories.oxid = oxobject2category.oxcatnid OR oxobject2category.oxcatnid IS NULL
                    LEFT JOIN oxarticles
                        ON oxobject2category.oxobjectid = oxarticles.oxid
                    WHERE oxcategories.oxactive != 0 AND childcategories.oxid IS NULL
                    GROUP BY oxcategories.oxid
                    HAVING ArtActive = 0
                ) as ArtCountTmp
                ON oxcategories.oxid = ArtCountTmp.oxid
                SET oxcategories.oxactive = 0
                WHERE ArtCountTmp.ArtActive = 0;",
        );

        $this->_performAction(
            array(),
            $aClearQueries,
            array(),
            'D3_CFG_CLRTMP_DEACTIVATEEMPTYCATEGORIES_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkVariantParentAsVar()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('o2p.oxid')
            ->from('oxarticles', 'o2p')
            ->where("o2p.oxid = o2p.oxparentid")
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixVariantParentAsVar()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxarticles_copy AS (
                SELECT * FROM oxarticles
            )",
        );

        $aClearQueries = array(
            "UPDATE oxarticles SET oxparentid = '', oxtitle =
              IF (oxarticles.oxtitle = '', 'unassigned article', oxarticles.oxtitle)  WHERE oxid IN (
                SELECT o2p.oxid
                FROM d3oxarticles_copy o2p
                WHERE (o2p.oxid = o2p.oxparentid)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxarticles_copy;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_VARIANTPARENTISVAR_SUCC'
        );
    }

    /**
     * @return int
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkClearVariantsWithoutParent()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxarticles', 'oav')
            ->leftJoin('oav', 'oxarticles', 'oap', 'oav.oxparentid = oap.oxid')
            ->where("oav.oxparentid != ''")
            ->andWhere('oap.oxid IS NULL')
            ->setMaxResults(1);

        return (int) $this->getDb()->getOne($oQB->getSQL());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixClearVariantsWithoutParent()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxarticles_copy AS (
                SELECT * FROM oxarticles
            )",
            "CREATE TEMPORARY TABLE d3oxarticles_copy2 AS (
                SELECT * FROM oxarticles
            )",
        );

        $aClearQueries = array(
            "DELETE FROM oxarticles WHERE oxid IN (
                SELECT oav.oxid
                FROM d3oxarticles_copy oav
                LEFT JOIN d3oxarticles_copy2 oap ON oav.oxparentid = oap.oxid
                WHERE oav.oxparentid != '' AND oap.oxid IS NULL
            )",
            "DELETE FROM oxartextends WHERE oxid IN (
                SELECT oav.oxid
                FROM d3oxarticles_copy oav
                LEFT JOIN d3oxarticles_copy2 oap ON oav.oxparentid = oap.oxid
                WHERE oav.oxparentid != '' AND oap.oxid IS NULL
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxarticles_copy;',
            'DROP TABLE d3oxarticles_copy2;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_ASSIGNVARIANTWOPARENT_SUCC'
        );
    }

    /**
     * @return string
     * @throws DBALException
     * @throws DatabaseConnectionException
     */
    public function checkVariantActive()
    {
        $oQB = d3database::getInstance()->getQueryBuilder();
        $oQB->select('count(*)')
            ->from('oxarticles', 'oav')
            ->leftJoin('oav', 'oxarticles', 'oap', 'oav.oxparentid = oap.oxid')
            ->where("oap.oxactive = ".$oQB->createNamedParameter(0, \PDO::PARAM_INT))
            ->setMaxResults(1);

        return $this->getDb()->getOne($oQB->getSQL(),  $oQB->getParameters());
    }

    /**
     * @throws DatabaseConnectionException
     * @throws DatabaseErrorException
     */
    public function fixVariantActive()
    {
        $aPrepareQueries = array(
            "CREATE TEMPORARY TABLE d3oxarticles_copy AS (
                SELECT * FROM oxarticles
            );",
            "CREATE TEMPORARY TABLE d3oxarticles_copy2 AS (
                SELECT * FROM oxarticles
            );",
        );

        $aClearQueries = array(
            "UPDATE oxarticles SET oxactive = 0  WHERE oxid IN (
                SELECT oav.oxid
                FROM d3oxarticles_copy oav
                LEFT JOIN d3oxarticles_copy2 oap ON oav.oxparentid = oap.oxid
                WHERE (oap.oxactive = 0)
            )",
        );

        $aCleanUpQueries = array(
            'DROP TABLE d3oxarticles_copy;',
            'DROP TABLE d3oxarticles_copy2;',
        );

        $this->_performAction(
            $aPrepareQueries,
            $aClearQueries,
            $aCleanUpQueries,
            'D3_CFG_CLRTMP_VARIANTACTIVE_SUCC'
        );
    }

    /**
     * @return DatabaseInterface
     * @throws DatabaseConnectionException
     */
    protected function getDb()
    {
        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
    }
}
