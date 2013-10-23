<?php

/**
 * BaseUrl
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property varchar $original_url
 * @property varchar $short_url
 * @property string $ipuser
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $UrlControle
 * 
 * @method integer             getUserId()       Returns the current record's "user_id" value
 * @method varchar             getOriginalUrl()  Returns the current record's "original_url" value
 * @method varchar             getShortUrl()     Returns the current record's "short_url" value
 * @method string              getIpuser()       Returns the current record's "ipuser" value
 * @method sfGuardUser         getSfGuardUser()  Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getUrlControle()  Returns the current record's "UrlControle" collection
 * @method Url                 setUserId()       Sets the current record's "user_id" value
 * @method Url                 setOriginalUrl()  Sets the current record's "original_url" value
 * @method Url                 setShortUrl()     Sets the current record's "short_url" value
 * @method Url                 setIpuser()       Sets the current record's "ipuser" value
 * @method Url                 setSfGuardUser()  Sets the current record's "sfGuardUser" value
 * @method Url                 setUrlControle()  Sets the current record's "UrlControle" collection
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUrl extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('url');
        $this->hasColumn('user_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('original_url', 'varchar', null, array(
             'type' => 'varchar',
             'notnull' => true,
             'length' => '',
             ));
        $this->hasColumn('short_url', 'varchar', 255, array(
             'type' => 'varchar',
             'notnull' => true,
             'unique' => true,
             'length' => 255,
             ));
        $this->hasColumn('ipuser', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'RESTRICT'));

        $this->hasMany('UrlControle', array(
             'local' => 'id',
             'foreign' => 'url_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}