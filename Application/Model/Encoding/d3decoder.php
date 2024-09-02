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

    /**
     * @param string $_sDecodingType
     */
    public function __construct(protected string $_sDecodingType = self::DEC_DEFAULT)
    {
    }

    /**
     * @return string
     */
    public function getDecodingType(): string
    {
        return $this->_sDecodingType;
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     * @throws JsonException
     */
    public function decode(?string $encodedValue): mixed
    {
        return match (strtolower($this->getDecodingType())) {
            self::DEC_JSON      => $this->decodeJson($encodedValue),
            self::DEC_UTF8      => $this->decodeUtf8($encodedValue),
            self::DEC_GZIP      => $this->decodeGZip($encodedValue),
            self::DEC_SERIALIZE => $this->decodeSerialize($encodedValue),
            self::DEC_RAWURL    => $this->decodeRawUrl($encodedValue),
            self::DEC_URL       => $this->decodeUrl($encodedValue),
            self::DEC_BASE64    => $this->decodeBase64($encodedValue),
            self::DEC_UUENC     => $this->decodeUUEncode($encodedValue),
            self::DEC_QUOTED    => $this->decodeQuotedPrintable($encodedValue),
            default             => $this->decodeDefault($encodedValue)
        };
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeDefault(?string $encodedValue): mixed
    {
        return unserialize(
            rawurldecode(
                base64_decode($encodedValue ?? '')
            )
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     * @throws JsonException
     */
    public function decodeJson(?string $encodedValue): mixed
    {
        return json_decode(
            html_entity_decode($encodedValue ?? '', ENT_QUOTES),
            null,
            512,
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeUtf8(?string $encodedValue): mixed
    {
        return unserialize(
            utf8_decode(
                html_entity_decode($encodedValue ?? '', ENT_QUOTES)
            )
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeSerialize(?string $encodedValue): mixed
    {
        return unserialize(
            html_entity_decode($encodedValue ?? '', ENT_QUOTES)
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeUrl(?string $encodedValue): mixed
    {
        return unserialize(
            urldecode($encodedValue ?? '')
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeRawUrl(?string $encodedValue): mixed
    {
        return unserialize(
            rawurldecode($encodedValue ?? '')
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return string
     */
    public function decodeBase64(?string $encodedValue): mixed
    {
        return unserialize(
            base64_decode($encodedValue ?? '')
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeGZip(?string $encodedValue): mixed
    {
        return unserialize(
            gzdecode(
                html_entity_decode($encodedValue ?? '', ENT_QUOTES)
            )
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeUUEncode(?string $encodedValue): mixed
    {
        return unserialize(
            convert_uudecode(
                html_entity_decode($encodedValue ?? '', ENT_QUOTES)
            )
        );
    }

    /**
     * @param string|null $encodedValue
     *
     * @return mixed
     */
    public function decodeQuotedPrintable(?string $encodedValue): mixed
    {
        return unserialize(
            quoted_printable_decode(
                html_entity_decode($encodedValue ?? '', ENT_QUOTES)
            )
        );
    }
}
