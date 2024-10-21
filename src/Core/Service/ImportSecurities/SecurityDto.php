<?php

namespace App\Core\Service\ImportSecurities;

/**
 *
 * Data Transfer Object (DTO) for representing security information.
 */
class SecurityDto
{
    /**
     * SecuritiesDto constructor.
     *
     * @param string $symbol The symbol of the security.
     * @param string $name The name of the security.
     * @param string $exchange The exchange where the security is listed.
     * @param string $type The type of the security.
     * @param string $ipoDate The initial public offering (IPO) date of the security.
     * @param string|null $delistingDate The delisting date of the security. Null if securities is still active
     * @param string $status The status of the security (e.g., active, delisted).
     * @param string $isin The International Securities Identification Number (ISIN) of the security.
     */
    public function __construct(
        public string $symbol,
        public string $name,
        public string $exchange,
        public string $type,
        public string $ipoDate,
        public ?string $delistingDate,
        public string $status,
        public string $isin
    ) {}
}
