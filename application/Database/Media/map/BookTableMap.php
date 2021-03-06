<?php

namespace Database\Media\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'net_bazzline_media_library_media_book' table.
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Wed Oct  1 21:22:56 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.Media.map
 */
class BookTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Media.map.BookTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('net_bazzline_media_library_media_book');
        $this->setPhpName('Book');
        $this->setClassname('Database\\Media\\Book');
        $this->setPackage('Media');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'CHAR', true, 36, null);
        $this->addForeignKey('media_id', 'MediaId', 'CHAR', 'net_bazzline_media_library_media_common', 'id', true, 36, null);
        $this->addColumn('number_of_pages', 'NumberOfPages', 'SMALLINT', true, 4, null);
        $this->addColumn('isbn_10', 'Isbn10', 'CHAR', false, 10, '');
        $this->addColumn('isbn_13', 'Isbn13', 'CHAR', false, 13, '');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Media', 'Database\\Media\\Media', RelationMap::MANY_TO_ONE, array('media_id' => 'id', ), null, null);
    } // buildRelations()

} // BookTableMap
