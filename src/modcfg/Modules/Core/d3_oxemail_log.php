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
 * @copyright (C) D3 Data Development, Thomas Dartsch
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

class d3_oxemail_log extends d3_oxemail_log_parent
{
    /**
     * @param $sTo
     * @param $sSubject
     * @param $sBody
     *
     * @return mixed
     */
    public function d3SendLogInfoMail($sTo, $sSubject, $sBody)
    {
        //set mail params (from, fromName, smtp)
        $this->_setMailParams();

        if (is_array($sTo)) {
            foreach ($sTo as $sAddress) {
                $this->setRecipient($sAddress, "");
                $this->setReplyTo($sAddress, "");
            }
        } else {
            $this->setRecipient($sTo, "");
            $this->setReplyTo($sTo, "");
        }

        //may be changed later
        $this->isHtml(true);

        $this->setSubject($sSubject);
        $this->setBody($sBody);

        return $this->send();
    }
}
