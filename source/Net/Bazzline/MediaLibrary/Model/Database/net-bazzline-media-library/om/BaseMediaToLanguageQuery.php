<?php

namespace Net\Bazzline\MediaLibrary\Model\Database\Media\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use Net\Bazzline\MediaLibrary\Model\Database\Media\Language;
use Net\Bazzline\MediaLibrary\Model\Database\Media\Media;
use Net\Bazzline\MediaLibrary\Model\Database\Media\MediaToLanguage;
use Net\Bazzline\MediaLibrary\Model\Database\Media\MediaToLanguagePeer;
use Net\Bazzline\MediaLibrary\Model\Database\Media\MediaToLanguageQuery;

/**
 * Base class that represents a query for the 'net_bazzline_media_library_media_to_language' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.9 on:
 *
 * Sun Aug 18 00:35:25 2013
 *
 * @method MediaToLanguageQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MediaToLanguageQuery orderByMediaId($order = Criteria::ASC) Order by the media_id column
 * @method MediaToLanguageQuery orderByMediaLanguageId($order = Criteria::ASC) Order by the media_language_id column
 *
 * @method MediaToLanguageQuery groupById() Group by the id column
 * @method MediaToLanguageQuery groupByMediaId() Group by the media_id column
 * @method MediaToLanguageQuery groupByMediaLanguageId() Group by the media_language_id column
 *
 * @method MediaToLanguageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MediaToLanguageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MediaToLanguageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MediaToLanguageQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method MediaToLanguageQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method MediaToLanguageQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method MediaToLanguageQuery leftJoinLanguage($relationAlias = null) Adds a LEFT JOIN clause to the query using the Language relation
 * @method MediaToLanguageQuery rightJoinLanguage($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Language relation
 * @method MediaToLanguageQuery innerJoinLanguage($relationAlias = null) Adds a INNER JOIN clause to the query using the Language relation
 *
 * @method MediaToLanguage findOne(PropelPDO $con = null) Return the first MediaToLanguage matching the query
 * @method MediaToLanguage findOneOrCreate(PropelPDO $con = null) Return the first MediaToLanguage matching the query, or a new MediaToLanguage object populated from the query conditions when no match is found
 *
 * @method MediaToLanguage findOneByMediaId(string $media_id) Return the first MediaToLanguage filtered by the media_id column
 * @method MediaToLanguage findOneByMediaLanguageId(string $media_language_id) Return the first MediaToLanguage filtered by the media_language_id column
 *
 * @method array findById(string $id) Return MediaToLanguage objects filtered by the id column
 * @method array findByMediaId(string $media_id) Return MediaToLanguage objects filtered by the media_id column
 * @method array findByMediaLanguageId(string $media_language_id) Return MediaToLanguage objects filtered by the media_language_id column
 *
 * @package    propel.generator.net-bazzline-media-library.om
 */
abstract class BaseMediaToLanguageQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMediaToLanguageQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'netBazzlineMediaLibrary', $modelName = 'Net\\Bazzline\\MediaLibrary\\Model\\Database\\Media\\MediaToLanguage', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MediaToLanguageQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MediaToLanguageQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MediaToLanguageQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MediaToLanguageQuery) {
            return $criteria;
        }
        $query = new MediaToLanguageQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return   MediaToLanguage|MediaToLanguage[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MediaToLanguagePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MediaToLanguagePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 MediaToLanguage A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneById($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 MediaToLanguage A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT id, media_id, media_language_id FROM net_bazzline_media_library_media_to_language WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new MediaToLanguage();
            $obj->hydrate($row);
            MediaToLanguagePeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return MediaToLanguage|MediaToLanguage[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|MediaToLanguage[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MediaToLanguagePeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MediaToLanguagePeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%'); // WHERE id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $id The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $id)) {
                $id = str_replace('*', '%', $id);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MediaToLanguagePeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the media_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMediaId('fooValue');   // WHERE media_id = 'fooValue'
     * $query->filterByMediaId('%fooValue%'); // WHERE media_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mediaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function filterByMediaId($mediaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mediaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mediaId)) {
                $mediaId = str_replace('*', '%', $mediaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MediaToLanguagePeer::MEDIA_ID, $mediaId, $comparison);
    }

    /**
     * Filter the query on the media_language_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMediaLanguageId('fooValue');   // WHERE media_language_id = 'fooValue'
     * $query->filterByMediaLanguageId('%fooValue%'); // WHERE media_language_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mediaLanguageId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function filterByMediaLanguageId($mediaLanguageId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mediaLanguageId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mediaLanguageId)) {
                $mediaLanguageId = str_replace('*', '%', $mediaLanguageId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MediaToLanguagePeer::MEDIA_LANGUAGE_ID, $mediaLanguageId, $comparison);
    }

    /**
     * Filter the query by a related Media object
     *
     * @param   Media|PropelObjectCollection $media The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MediaToLanguageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMedia($media, $comparison = null)
    {
        if ($media instanceof Media) {
            return $this
                ->addUsingAlias(MediaToLanguagePeer::MEDIA_ID, $media->getId(), $comparison);
        } elseif ($media instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MediaToLanguagePeer::MEDIA_ID, $media->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMedia() only accepts arguments of type Media or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Media relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function joinMedia($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Media');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Media');
        }

        return $this;
    }

    /**
     * Use the Media relation Media object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Net\Bazzline\MediaLibrary\Model\Database\Media\MediaQuery A secondary query class using the current class as primary query
     */
    public function useMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMedia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Media', '\Net\Bazzline\MediaLibrary\Model\Database\Media\MediaQuery');
    }

    /**
     * Filter the query by a related Language object
     *
     * @param   Language|PropelObjectCollection $language The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MediaToLanguageQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLanguage($language, $comparison = null)
    {
        if ($language instanceof Language) {
            return $this
                ->addUsingAlias(MediaToLanguagePeer::MEDIA_LANGUAGE_ID, $language->getId(), $comparison);
        } elseif ($language instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MediaToLanguagePeer::MEDIA_LANGUAGE_ID, $language->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLanguage() only accepts arguments of type Language or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Language relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function joinLanguage($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Language');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Language');
        }

        return $this;
    }

    /**
     * Use the Language relation Language object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Net\Bazzline\MediaLibrary\Model\Database\Media\LanguageQuery A secondary query class using the current class as primary query
     */
    public function useLanguageQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLanguage($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Language', '\Net\Bazzline\MediaLibrary\Model\Database\Media\LanguageQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MediaToLanguage $mediaToLanguage Object to remove from the list of results
     *
     * @return MediaToLanguageQuery The current query, for fluid interface
     */
    public function prune($mediaToLanguage = null)
    {
        if ($mediaToLanguage) {
            $this->addUsingAlias(MediaToLanguagePeer::ID, $mediaToLanguage->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
