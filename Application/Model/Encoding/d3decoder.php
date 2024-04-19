<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * https://www.d3data.de
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

namespace D3\ModCfg\Application\Model\Encoding;

class d3decoder
{
    public const DEC_DEFAULT   = 'default';
    public const DEC_JSON      = 'json';
    public const DEC_UTF8      = 'utf-8';
    public const DEC_GZIP      = 'gzip';
    public const DEC_SERIALIZE = 'serialize';
    public const DEC_RAWURL    = 'rawurl';
    public const DEC_URL       = 'url';
    public const DEC_BASE64    = 'base64';
    public const DEC_UUENC     = 'uuencode';
    public const DEC_QUOTED    = 'quoted';

    protected $_aDecodingMethods = [
        'default'   => 'decodeDefault',
        'json'      => 'decodeJson',
        'utf-8'     => 'decodeUtf8',
        'gzip'      => 'decodeGZip',
        'serialize' => 'decodeSerialize',
        'rawurl'    => 'decodeRawUrl',
        'url'       => 'decodeUrl',
        'base64'    => 'decodeBase64',
        'uuencode'  => 'decodeUUEncode',
        'quoted'    => 'decodeQuotedPrintable',
    ];

    /**
     * @param string $_sDecodingType
     */
    public function __construct(protected $_sDecodingType)
    {
    }

    /**
     * @return string
     */
    public function getDecodingType()
    {
        return $this->_sDecodingType;
    }

    /**
     * @return string
     */
    public function getDecodingMethodName()
    {
        $sType = strtolower($this->getDecodingType());

        if (is_array($this->_aDecodingMethods)
            && count($this->_aDecodingMethods)
            && isset($this->_aDecodingMethods[$sType])
        ) {
            return $this->_aDecodingMethods[strtolower($this->getDecodingType())];
        }

        return $this->_aDecodingMethods['default'];
    }

    /**
     * @param $mValue
     *
     * @return string
     */
    public function decode($mValue)
    {
        $mRet = call_user_func([$this, $this->getDecodingMethodName()], $mValue);

        return $mRet;
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeDefault($mValue)
    {
        return unserialize(rawurldecode(base64_decode($mValue)));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeJson($mValue)
    {
        $mValue = html_entity_decode($mValue, ENT_QUOTES);
        return json_decode($mValue, null, 512, JSON_THROW_ON_ERROR);
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeUtf8($mValue)
    {
        $mValue = html_entity_decode($mValue, ENT_QUOTES);
        return unserialize(utf8_decode($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeSerialize($mValue)
    {
        $mValue = html_entity_decode($mValue, ENT_QUOTES);
        return unserialize($mValue);
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeUrl($mValue)
    {
        return unserialize(urldecode($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeRawUrl($mValue)
    {
        return unserialize(rawurldecode($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeBase64($mValue)
    {
        return unserialize(base64_decode($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string|null
     */
    public function decodeGZip($mValue)
    {
        if (false == $mValue || $mValue == '') {
            return null;
        }
        $mValue = html_entity_decode($mValue, ENT_QUOTES);
        return unserialize(gzdecode($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeUUEncode($mValue)
    {
        $mValue = html_entity_decode($mValue, ENT_QUOTES);
        return unserialize(convert_uudecode($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function decodeQuotedPrintable($mValue)
    {
        $mValue = html_entity_decode($mValue, ENT_QUOTES);
        return unserialize(quoted_printable_decode($mValue));
    }
}
