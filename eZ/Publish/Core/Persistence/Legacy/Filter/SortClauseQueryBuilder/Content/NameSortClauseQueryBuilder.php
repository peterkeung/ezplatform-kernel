<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
declare(strict_types=1);

namespace eZ\Publish\Core\Persistence\Legacy\Filter\SortClauseQueryBuilder\Content;

use eZ\Publish\API\Repository\Values\Content\Query\SortClause\ContentName;
use eZ\Publish\SPI\Persistence\Filter\Doctrine\FilteringQueryBuilder;
use eZ\Publish\SPI\Repository\Values\Filter\FilteringSortClause;
use eZ\Publish\SPI\Repository\Values\Filter\SortClauseQueryBuilder;

class NameSortClauseQueryBuilder implements SortClauseQueryBuilder
{
    public function accepts(FilteringSortClause $sortClause): bool
    {
        return $sortClause instanceof ContentName;
    }

    public function buildQuery(
        FilteringQueryBuilder $queryBuilder,
        FilteringSortClause $sortClause
    ): void {
        /** @var \eZ\Publish\API\Repository\Values\Content\Query\SortClause $sortClause */
        $queryBuilder->addOrderBy('content.name', $sortClause->direction);
    }
}
