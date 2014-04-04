<?php

namespace Database\User\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'net_bazzline_media_library_user_users' table.
 *
 *
 * This class was autogenerated by Propel 1.7.1 on:
 *
 * Fri Apr  4 23:01:55 2014
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.User.map
 */
class UserTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'User.map.UserTableMap';

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
        $this->setName('net_bazzline_media_library_user_users');
        $this->setPhpName('User');
        $this->setClassname('Database\\User\\User');
        $this->setPackage('User');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'CHAR', true, 36, null);
        $this->addColumn('firstName', 'Firstname', 'VARCHAR', true, 40, null);
        $this->addColumn('lastName', 'Lastname', 'VARCHAR', true, 40, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 80, null);
        $this->addColumn('is_active', 'IsActive', 'BOOLEAN', true, 1, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Identity', 'Database\\User\\Identity', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'Identitys');
        $this->addRelation('Media', 'Database\\Media\\Media', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'Medias');
        $this->addRelation('Comment', 'Database\\Media\\Comment', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), null, null, 'Comments');
    } // buildRelations()

} // UserTableMap
