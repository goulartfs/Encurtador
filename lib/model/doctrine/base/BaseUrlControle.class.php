<?php

/**
 * BaseUrlControle
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $url_id
 * @property integer $resgate_id
 * @property string $ipuser
 * @property boolean $is_rescued
 * @property boolean $is_processed
 * @property datetime $data_processado
 * @property integer $resgate_referal_id
 * @property boolean $is_referal_rescued
 * @property datetime $data_referal_processado
 * @property Url $Url
 * @property Resgate $Resgate
 * @property Resgate $ResgateReferal
 * 
 * @method integer     getUrlId()                   Returns the current record's "url_id" value
 * @method integer     getResgateId()               Returns the current record's "resgate_id" value
 * @method string      getIpuser()                  Returns the current record's "ipuser" value
 * @method boolean     getIsRescued()               Returns the current record's "is_rescued" value
 * @method boolean     getIsProcessed()             Returns the current record's "is_processed" value
 * @method datetime    getDataProcessado()          Returns the current record's "data_processado" value
 * @method integer     getResgateReferalId()        Returns the current record's "resgate_referal_id" value
 * @method boolean     getIsReferalRescued()        Returns the current record's "is_referal_rescued" value
 * @method datetime    getDataReferalProcessado()   Returns the current record's "data_referal_processado" value
 * @method Url         getUrl()                     Returns the current record's "Url" value
 * @method Resgate     getResgate()                 Returns the current record's "Resgate" value
 * @method Resgate     getResgateReferal()          Returns the current record's "ResgateReferal" value
 * @method UrlControle setUrlId()                   Sets the current record's "url_id" value
 * @method UrlControle setResgateId()               Sets the current record's "resgate_id" value
 * @method UrlControle setIpuser()                  Sets the current record's "ipuser" value
 * @method UrlControle setIsRescued()               Sets the current record's "is_rescued" value
 * @method UrlControle setIsProcessed()             Sets the current record's "is_processed" value
 * @method UrlControle setDataProcessado()          Sets the current record's "data_processado" value
 * @method UrlControle setResgateReferalId()        Sets the current record's "resgate_referal_id" value
 * @method UrlControle setIsReferalRescued()        Sets the current record's "is_referal_rescued" value
 * @method UrlControle setDataReferalProcessado()   Sets the current record's "data_referal_processado" value
 * @method UrlControle setUrl()                     Sets the current record's "Url" value
 * @method UrlControle setResgate()                 Sets the current record's "Resgate" value
 * @method UrlControle setResgateReferal()          Sets the current record's "ResgateReferal" value
 * 
 * @package    Encurtador
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUrlControle extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('url_controle');
        $this->hasColumn('url_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('resgate_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('ipuser', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_rescued', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('is_processed', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('data_processado', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('resgate_referal_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('is_referal_rescued', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('data_referal_processado', 'datetime', null, array(
             'type' => 'datetime',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Url', array(
             'local' => 'url_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'RESTRICT'));

        $this->hasOne('Resgate', array(
             'local' => 'resgate_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'RESTRICT'));

        $this->hasOne('Resgate as ResgateReferal', array(
             'local' => 'resgate_referal_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'RESTRICT'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}