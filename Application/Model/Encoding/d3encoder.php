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

namespace D3\ModCfg\Application\Model\Encoding;

use JsonException;

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

    /**
     * @param string $_sEncodingType
     */
    public function __construct(protected string $_sEncodingType = self::ENC_DEFAULT)
    {
    }

    /**
     * @return string
     */
    public function getEncodingType(): string
    {
        return $this->_sEncodingType;
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     * @throws JsonException
     */
    public function encode(mixed $decodedValue): string
    {
        return match (strtolower($this->getEncodingType())) {
            self::ENC_JSON      => $this->encodeJson($decodedValue),
            self::ENC_UTF8      => $this->encodeUtf8($decodedValue),
            self::ENC_GZIP      => $this->encodeGZip($decodedValue),
            self::ENC_SERIALIZE => $this->encodeSerialize($decodedValue),
            self::ENC_RAWURL    => $this->encodeRawUrl($decodedValue),
            self::ENC_URL       => $this->encodeUrl($decodedValue),
            self::ENC_BASE64    => $this->encodeBase64($decodedValue),
            self::ENC_UUENC     => $this->encodeUUEncode($decodedValue),
            self::ENC_QUOTED    => $this->encodeQuotedPrintable($decodedValue),
            default             => $this->encodeDefault($decodedValue)
        };
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeDefault(mixed $decodedValue): string
    {
        return base64_encode(
            rawurlencode(
                serialize(
                    $decodedValue
                )
            )
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     * @throws JsonException
     */
    public function encodeJson(mixed $decodedValue): string
    {
        return json_encode($decodedValue, JSON_THROW_ON_ERROR);
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeUtf8(mixed $decodedValue): string
    {
        return utf8_encode(
            serialize(
                $decodedValue
            )
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeSerialize(mixed $decodedValue): string
    {
        return serialize(
            $decodedValue
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeUrl(mixed $decodedValue): string
    {
        return urlencode(
            serialize(
                $decodedValue
            )
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeRawUrl(mixed $decodedValue): string
    {
        return rawurlencode(
            serialize(
                $decodedValue
            )
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeBase64(mixed $decodedValue): string
    {
        return base64_encode(
            serialize(
                $decodedValue
            )
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeGZip(mixed $decodedValue): string
    {
        return gzencode(
            serialize(
                $decodedValue
            )
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeUUEncode(mixed $decodedValue): string
    {
        return convert_uuencode(
            serialize(
                $decodedValue
            )
        );
    }

    /**
     * @param mixed $decodedValue
     *
     * @return string
     */
    public function encodeQuotedPrintable(mixed $decodedValue): string
    {
        return quoted_printable_encode(
            serialize(
                $decodedValue
            )
        );
    }
}
