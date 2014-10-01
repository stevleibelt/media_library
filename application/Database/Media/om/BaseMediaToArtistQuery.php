<?php

namespace Database\Media\om;

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
use Database\Media\Artist;
use Database\Media\Media;
use Database\Media\MediaToArtist;
use Database\Media\MediaToArtistPeer;
use Database\Media\MediaToArtistQuery;

/**
 * Base class that represents a query for the 'net_bazzline_media_library_media_to_artist' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Wed Oct  1 21:22:56 2014
 *
 * @method MediaToArtistQuery orderById($order = Criteria::ASC) Order by the id column
 * @method MediaToArtistQuery orderByMediaId($order = Criteria::ASC) Order by the media_id column
 * @method MediaToArtistQuery orderByArtistId($order = Criteria::ASC) Order by the artist_id column
 *
 * @method MediaToArtistQuery groupById() Group by the id column
 * @method MediaToArtistQuery groupByMediaId() Group by the media_id column
 * @method MediaToArtistQuery groupByArtistId() Group by the artist_id column
 *
 * @method MediaToArtistQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MediaToArtistQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MediaToArtistQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MediaToArtistQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method MediaToArtistQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method MediaToArtistQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method MediaToArtistQuery leftJoinArtist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Artist relation
 * @method MediaToArtistQuery rightJoinArtist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Artist relation
 * @method MediaToArtistQuery innerJoinArtist($relationAlias = null) Adds a INNER JOIN clause to the query using the Artist relation
 *
 * @method MediaToArtist findOne(PropelPDO $con = null) Return the first MediaToArtist matching the query
 * @method MediaToArtist findOneOrCreate(PropelPDO $con = null) Return the first MediaToArtist matching the query, or a new MediaToArtist object populated from the query conditions when no match is found
 *
 * @method MediaToArtist findOneByMediaId(string $media_id) Return the first MediaToArtist filtered by the media_id column
 * @method MediaToArtist findOneByArtistId(string $artist_id) Return the first MediaToArtist filtered by the artist_id column
 *
 * @method array findById(string $id) Return MediaToArtist objects filtered by the id column
 * @method array findByMediaId(string $media_id) Return MediaToArtist objects filtered by the media_id column
 * @method array findByArtistId(string $artist_id) Return MediaToArtist objects filtered by the artist_id column
 *
 * @package    propel.generator.Media.om
 */
abstract class BaseMediaToArtistQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMediaToArtistQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = null, $modelName = null, $modelAlias = null)
    {
        if (null === $dbName) {
            $dbName = 'netBazzlineMediaLibrary';
        }
        if (null === $modelName) {
            $modelName = 'Database\\Media\\MediaToArtist';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MediaToArtistQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MediaToArtistQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MediaToArtistQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MediaToArtistQuery) {
            return $criteria;
        }
        $query = new MediaToArtistQuery(null, null, $modelAlias);

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
     * @return   MediaToArtist|MediaToArtist[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MediaToArtistPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MediaToArtistPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MediaToArtist A model object, or null if the key is not found
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
     * @return                 MediaToArtist A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT id, media_id, artist_id FROM net_bazzline_media_library_media_to_artist WHERE id = :p0';
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
            $obj = new MediaToArtist();
            $obj->hydrate($row);
            MediaToArtistPeer::addInstanceToPool($obj, (string) $key);
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
     * @return MediaToArtist|MediaToArtist[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MediaToArtist[]|mixed the list of results, formatted by the current formatter
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
     * @return MediaToArtistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MediaToArtistPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MediaToArtistQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MediaToArtistPeer::ID, $keys, Criteria::IN);
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
     * @return MediaToArtistQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MediaToArtistPeer::ID, $id, $comparison);
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
     * @return MediaToArtistQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MediaToArtistPeer::MEDIA_ID, $mediaId, $comparison);
    }

    /**
     * Filter the query on the artist_id column
     *
     * Example usage:
     * <code>
     * $query->filterByArtistId('fooValue');   // WHERE artist_id = 'fooValue'
     * $query->filterByArtistId('%fooValue%'); // WHERE artist_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $artistId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MediaToArtistQuery The current query, for fluid interface
     */
    public function filterByArtistId($artistId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($artistId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $artistId)) {
                $artistId = str_replace('*', '%', $artistId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MediaToArtistPeer::ARTIST_ID, $artistId, $comparison);
    }

    /**
     * Filter the query by a related Media object
     *
     * @param   Media|PropelObjectCollection $media The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MediaToArtistQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMedia($media, $comparison = null)
    {
        if ($media instanceof Media) {
            return $this
                ->addUsingAlias(MediaToArtistPeer::MEDIA_ID, $media->getId(), $comparison);
        } elseif ($media instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MediaToArtistPeer::MEDIA_ID, $media->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return MediaToArtistQuery The current query, for fluid interface
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
     * @return   \Database\Media\MediaQuery A secondary query class using the current class as primary query
     */
    public function useMediaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMedia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Media', '\Database\Media\MediaQuery');
    }

    /**
     * Filter the query by a related Artist object
     *
     * @param   Artist|PropelObjectCollection $artist The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MediaToArtistQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByArtist($artist, $comparison = null)
    {
        if ($artist instanceof Artist) {
            return $this
                ->addUsingAlias(MediaToArtistPeer::ARTIST_ID, $artist->getId(), $comparison);
        } elseif ($artist instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MediaToArtistPeer::ARTIST_ID, $artist->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByArtist() only accepts arguments of type Artist or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Artist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MediaToArtistQuery The current query, for fluid interface
     */
    public function joinArtist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Artist');

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
            $this->addJoinObject($join, 'Artist');
        }

        return $this;
    }

    /**
     * Use the Artist relation Artist object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Database\Media\ArtistQuery A secondary query class using the current class as primary query
     */
    public function useArtistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinArtist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Artist', '\Database\Media\ArtistQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MediaToArtist $mediaToArtist Object to remove from the list of results
     *
     * @return MediaToArtistQuery The current query, for fluid interface
     */
    public function prune($mediaToArtist = null)
    {
        if ($mediaToArtist) {
            $this->addUsingAlias(MediaToArtistPeer::ID, $mediaToArtist->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
