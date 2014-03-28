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
use Database\Media\Audio;
use Database\Media\AudioPeer;
use Database\Media\AudioQuery;
use Database\Media\Media;
use Database\Media\Audio\Track;

/**
 * Base class that represents a query for the 'net_bazzline_media_library_media_audio' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Fri Mar 28 23:55:59 2014
 *
 * @method AudioQuery orderById($order = Criteria::ASC) Order by the id column
 * @method AudioQuery orderByMediaId($order = Criteria::ASC) Order by the media_id column
 * @method AudioQuery orderByNumberOfDiscs($order = Criteria::ASC) Order by the number_of_discs column
 *
 * @method AudioQuery groupById() Group by the id column
 * @method AudioQuery groupByMediaId() Group by the media_id column
 * @method AudioQuery groupByNumberOfDiscs() Group by the number_of_discs column
 *
 * @method AudioQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AudioQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AudioQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AudioQuery leftJoinMedia($relationAlias = null) Adds a LEFT JOIN clause to the query using the Media relation
 * @method AudioQuery rightJoinMedia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Media relation
 * @method AudioQuery innerJoinMedia($relationAlias = null) Adds a INNER JOIN clause to the query using the Media relation
 *
 * @method AudioQuery leftJoinTrack($relationAlias = null) Adds a LEFT JOIN clause to the query using the Track relation
 * @method AudioQuery rightJoinTrack($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Track relation
 * @method AudioQuery innerJoinTrack($relationAlias = null) Adds a INNER JOIN clause to the query using the Track relation
 *
 * @method Audio findOne(PropelPDO $con = null) Return the first Audio matching the query
 * @method Audio findOneOrCreate(PropelPDO $con = null) Return the first Audio matching the query, or a new Audio object populated from the query conditions when no match is found
 *
 * @method Audio findOneByMediaId(string $media_id) Return the first Audio filtered by the media_id column
 * @method Audio findOneByNumberOfDiscs(int $number_of_discs) Return the first Audio filtered by the number_of_discs column
 *
 * @method array findById(string $id) Return Audio objects filtered by the id column
 * @method array findByMediaId(string $media_id) Return Audio objects filtered by the media_id column
 * @method array findByNumberOfDiscs(int $number_of_discs) Return Audio objects filtered by the number_of_discs column
 *
 * @package    propel.generator.Media.om
 */
abstract class BaseAudioQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAudioQuery object.
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
            $modelName = 'Database\\Media\\Audio';
        }
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AudioQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AudioQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AudioQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AudioQuery) {
            return $criteria;
        }
        $query = new AudioQuery(null, null, $modelAlias);

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
     * @return   Audio|Audio[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AudioPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AudioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Audio A model object, or null if the key is not found
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
     * @return                 Audio A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT id, media_id, number_of_discs FROM net_bazzline_media_library_media_audio WHERE id = :p0';
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
            $obj = new Audio();
            $obj->hydrate($row);
            AudioPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Audio|Audio[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Audio[]|mixed the list of results, formatted by the current formatter
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
     * @return AudioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AudioPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AudioQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AudioPeer::ID, $keys, Criteria::IN);
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
     * @return AudioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AudioPeer::ID, $id, $comparison);
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
     * @return AudioQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AudioPeer::MEDIA_ID, $mediaId, $comparison);
    }

    /**
     * Filter the query on the number_of_discs column
     *
     * Example usage:
     * <code>
     * $query->filterByNumberOfDiscs(1234); // WHERE number_of_discs = 1234
     * $query->filterByNumberOfDiscs(array(12, 34)); // WHERE number_of_discs IN (12, 34)
     * $query->filterByNumberOfDiscs(array('min' => 12)); // WHERE number_of_discs >= 12
     * $query->filterByNumberOfDiscs(array('max' => 12)); // WHERE number_of_discs <= 12
     * </code>
     *
     * @param     mixed $numberOfDiscs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AudioQuery The current query, for fluid interface
     */
    public function filterByNumberOfDiscs($numberOfDiscs = null, $comparison = null)
    {
        if (is_array($numberOfDiscs)) {
            $useMinMax = false;
            if (isset($numberOfDiscs['min'])) {
                $this->addUsingAlias(AudioPeer::NUMBER_OF_DISCS, $numberOfDiscs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($numberOfDiscs['max'])) {
                $this->addUsingAlias(AudioPeer::NUMBER_OF_DISCS, $numberOfDiscs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AudioPeer::NUMBER_OF_DISCS, $numberOfDiscs, $comparison);
    }

    /**
     * Filter the query by a related Media object
     *
     * @param   Media|PropelObjectCollection $media The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AudioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMedia($media, $comparison = null)
    {
        if ($media instanceof Media) {
            return $this
                ->addUsingAlias(AudioPeer::MEDIA_ID, $media->getId(), $comparison);
        } elseif ($media instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AudioPeer::MEDIA_ID, $media->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return AudioQuery The current query, for fluid interface
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
     * Filter the query by a related Track object
     *
     * @param   Track|PropelObjectCollection $track  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AudioQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTrack($track, $comparison = null)
    {
        if ($track instanceof Track) {
            return $this
                ->addUsingAlias(AudioPeer::ID, $track->getAudioId(), $comparison);
        } elseif ($track instanceof PropelObjectCollection) {
            return $this
                ->useTrackQuery()
                ->filterByPrimaryKeys($track->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTrack() only accepts arguments of type Track or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Track relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AudioQuery The current query, for fluid interface
     */
    public function joinTrack($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Track');

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
            $this->addJoinObject($join, 'Track');
        }

        return $this;
    }

    /**
     * Use the Track relation Track object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Database\Media\Audio\TrackQuery A secondary query class using the current class as primary query
     */
    public function useTrackQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTrack($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Track', '\Database\Media\Audio\TrackQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Audio $audio Object to remove from the list of results
     *
     * @return AudioQuery The current query, for fluid interface
     */
    public function prune($audio = null)
    {
        if ($audio) {
            $this->addUsingAlias(AudioPeer::ID, $audio->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
