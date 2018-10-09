<?php
/**
 * Copyright 2016 Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\AdsApi\Examples\AdManager\v201802\PremiumRateService;

require __DIR__ . '/../../../../vendor/autoload.php';

use Google\AdsApi\AdManager\AdManagerServices;
use Google\AdsApi\AdManager\AdManagerSession;
use Google\AdsApi\AdManager\AdManagerSessionBuilder;
use Google\AdsApi\AdManager\Util\v201802\StatementBuilder;
use Google\AdsApi\AdManager\v201802\PremiumRateService;
use Google\AdsApi\Common\OAuth2TokenBuilder;

/**
 * This example gets all premium rates.
 *
 * <p>It is meant to be run from a command line (not as a webpage) and requires
 * that you've setup an `adsapi_php.ini` file in your home directory with your
 * API credentials and settings. See README.md for more info.
 */
class GetAllPremiumRates
{

    public static function runExample(
        AdManagerServices $adManagerServices,
        AdManagerSession $session
    ) {
        $premiumRateService = $adManagerServices->get(
            $session,
            PremiumRateService::class
        );

        // Create a statement to select premium rates.
        $pageSize = StatementBuilder::SUGGESTED_PAGE_LIMIT;
        $statementBuilder = (new StatementBuilder())->orderBy('id ASC')
            ->limit($pageSize);

        // Retrieve a small amount of premium rates at a time, paging
        // through until all premium rates have been retrieved.
        $totalResultSetSize = 0;
        do {
            $page = $premiumRateService->getPremiumRatesByStatement(
                $statementBuilder->toStatement()
            );

            // Print out some information for each premium rate.
            if ($page->getResults() !== null) {
                $totalResultSetSize = $page->getTotalResultSetSize();
                $i = $page->getStartIndex();
                foreach ($page->getResults() as $premiumRate) {
                    printf(
                        "%d) Premium rate with ID %d, premium feature '%s', and"
                        . " rate card id %d was found.\n",
                        $i++,
                        $premiumRate->getId(),
                        (new \ReflectionObject($premiumRate))->getShortName(),
                        $premiumRate->getRateCardId()
                    );
                }
            }

            $statementBuilder->increaseOffsetBy($pageSize);
        } while ($statementBuilder->getOffset() < $totalResultSetSize);

        printf("Number of results found: %d\n", $totalResultSetSize);
    }

    public static function main()
    {
        // Generate a refreshable OAuth2 credential for authentication.
        $oAuth2Credential = (new OAuth2TokenBuilder())->fromFile()
            ->build();

        // Construct an API session configured from a properties file and the
        // OAuth2 credentials above.
        $session = (new AdManagerSessionBuilder())->fromFile()
            ->withOAuth2Credential($oAuth2Credential)
            ->build();

        self::runExample(new AdManagerServices(), $session);
    }
}

GetAllPremiumRates::main();
