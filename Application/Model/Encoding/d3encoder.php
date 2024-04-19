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

class d3encoder
{
    public const ENC_DEFAULT   = 'default';
    public const ENC_JSON      = 'json';
    public const ENC_UTF8      = 'utf-8';
    public const ENC_GZIP      = 'gzip';
    public const ENC_SERIALIZE = 'serialize';
    public const ENC_RAWURL    = 'rawurl';
    public const ENC_URL       = 'url';
    public const ENC_BASE64    = 'base64';
    public const ENC_UUENC     = 'uuencode';
    public const ENC_QUOTED    = 'quoted';

    protected $_aEncodingMethods = [
        'default'   => 'encodeDefault',
        'json'      => 'encodeJson',
        'utf-8'     => 'encodeUtf8',
        'gzip'      => 'encodeGZip',
        'serialize' => 'encodeSerialize',
        'rawurl'    => 'encodeRawUrl',
        'url'       => 'encodeUrl',
        'base64'    => 'encodeBase64',
        'uuencode'  => 'encodeUUEncode',
        'quoted'    => 'encodeQuotedPrintable',
    ];

    /**
     * @param string $_sEncodingType
     */
    public function __construct(protected $_sEncodingType)
    {
    }

    /**
     * @return string
     */
    public function getEncodingType()
    {
        return $this->_sEncodingType;
    }

    /**
     * @return string
     */
    public function getEncodingMethodName()
    {
        $sType = strtolower($this->getEncodingType());

        if (is_array($this->_aEncodingMethods)
            && count($this->_aEncodingMethods)
            && isset($this->_aEncodingMethods[$sType])
        ) {
            return $this->_aEncodingMethods[strtolower($this->getEncodingType())];
        }

        return $this->_aEncodingMethods['default'];
    }

    /**
     * @param $mValue
     *
     * @return string
     */
    public function encode($mValue)
    {
        $mRet = call_user_func([$this, $this->getEncodingMethodName()], $mValue);

        return $mRet;
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeDefault($mValue)
    {
        return base64_encode(rawurlencode(serialize($mValue)));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeJson($mValue)
    {
        return json_encode($mValue, JSON_THROW_ON_ERROR);
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeUtf8($mValue)
    {
        return utf8_encode(serialize($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeSerialize($mValue)
    {
        return serialize($mValue);
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeUrl($mValue)
    {
        return urlencode(serialize($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeRawUrl($mValue)
    {
        return rawurlencode(serialize($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeBase64($mValue)
    {
        return base64_encode(serialize($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeGZip($mValue)
    {
        return gzencode(serialize($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeUUEncode($mValue)
    {
        return convert_uuencode(serialize($mValue));
    }

    /**
     * @param mixed $mValue
     *
     * @return string
     */
    public function encodeQuotedPrintable($mValue)
    {
        return quoted_printable_encode(serialize($mValue));
    }
}
