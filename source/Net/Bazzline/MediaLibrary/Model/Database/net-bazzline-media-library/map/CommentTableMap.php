<?php

namespace Net\Bazzline\MediaLibrary\Model\Database\Media\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'net_bazzline_media_library_media_comment' table.
 *
 *
 * This class was autogenerated by Propel 1.6.9 on:
 *
 * Sun Aug 18 00:35:25 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.net-bazzline-media-library.map
 */
class CommentTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'net-bazzline-media-library.map.CommentTableMap';

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
        $this->setName('net_bazzline_media_library_media_comment');
        $this->setPhpName('Comment');
        $this->setClassname('Net\\Bazzline\\MediaLibrary\\Model\\Database\\Media\\Comment');
        $this->setPackage('net-bazzline-media-library');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'CHAR', true, 36, null);
        $this->addForeignKey('media_id', 'MediaId', 'CHAR', 'net_bazzline_media_library_media_common', 'id', true, 36, null);
        $this->addColumn('parent_comment_id', 'ParentCommentId', 'CHAR', true, 36, null);
        $this->addForeignKey('user_id', 'UserId', 'CHAR', 'net_bazzline_media_library_user_users', 'id', true, 36, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('comment', 'Comment', 'LONGVARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Media', 'Net\\Bazzline\\MediaLibrary\\Model\\Database\\Media\\Media', RelationMap::MANY_TO_ONE, array('media_id' => 'id', ), null, null);
        $this->addRelation('User', 'Net\\Bazzline\\MediaLibrary\\Model\\Database\\User\\User', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), null, null);
    } // buildRelations()

} // CommentTableMap